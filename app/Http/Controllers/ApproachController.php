<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ApproachController extends Controller
{
    public function show(string $slug): View
    {
        $item = config("fincun.approach.items.{$slug}") ?? abort(404);

        return view('pages.approach.show', [
            'item' => $item,
            'slug' => $slug,
        ]);
    }
}
