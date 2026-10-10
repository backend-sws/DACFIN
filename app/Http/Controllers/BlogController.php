<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    /**
     * Handle the incoming request for blogs.
     */
    public function __invoke(): View
    {
        return view('pages.blogs');
    }
}
