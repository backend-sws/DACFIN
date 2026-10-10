<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request for homepage.
     */
    public function __invoke(): View
    {
        return view('pages.home');
    }
}
