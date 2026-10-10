<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AudienceController extends Controller
{
    public function show(string $slug): View
    {
        $item = config("fincun.audiences.items.{$slug}") ?? abort(404);

        return view('pages.audiences.show', [
            'item' => $item,
            'slug' => $slug,
        ]);
    }
}
