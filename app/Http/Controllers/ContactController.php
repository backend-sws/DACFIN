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

        if ($request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Thank you for reaching out! Our advisory team will contact you within one business day.',
            ]);
        }

        return back()->with('sent', true);
    }
}
