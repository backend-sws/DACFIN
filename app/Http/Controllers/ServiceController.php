<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function show(string $slug): View
    {
        $item = config("fincun.services.items.{$slug}") ?? abort(404);

        return view('pages.services.show', [
            'item' => $item,
            'slug' => $slug,
        ]);
    }
}
