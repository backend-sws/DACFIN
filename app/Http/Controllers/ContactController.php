<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactReceived;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request): JsonResponse|RedirectResponse
    {
        $message = ContactMessage::create(
            $request->safe()->except('website') + ['ip' => $request->ip()]
        );

        try {
            Mail::to(config('fincun.site.email'))->queue(new ContactReceived($message));
        } catch (\Throwable $e) {
            // In local/dev environments without queue workers running, Mail exception is logged
            report($e);
        }

        $whatsappText = "Hello DACFIN,\n\n"
            . "I would like to inquire regarding financial services:\n"
            . "*Name:* " . $request->input('name') . "\n"
            . "*Phone:* " . $request->input('phone') . "\n"
            . "*Email:* " . $request->input('email') . "\n";

        if ($request->filled('interest')) {
            $whatsappText .= "*Interested In:* " . $request->input('interest') . "\n";
        }

        if ($request->filled('message')) {
            $whatsappText .= "*Message:* " . $request->input('message') . "\n";
        }

        $rawPhone = config('fincun.site.whatsapp', '9934675399');
        $cleanPhone = preg_replace('/[^0-9]/', '', (string) $rawPhone);
        if (strlen($cleanPhone) === 10) {
            $cleanPhone = '91' . $cleanPhone;
        }

        $whatsappUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode($whatsappText);

        if ($request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Thank you for reaching out! Redirecting to WhatsApp...',
                'whatsapp_url' => $whatsappUrl,
            ]);
        }

        return redirect()->away($whatsappUrl);
    }
}
