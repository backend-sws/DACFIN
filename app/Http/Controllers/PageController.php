<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function team(): View
    {
        return view('pages.team');
    }

    public function whyFincun(): View
    {
        return view('pages.why-fincun');
    }

    public function whyPlanning(): View
    {
        return view('pages.why-financial-planning');
    }

    public function mobileApps(): View
    {
        return view('pages.mobile-apps');
    }

    public function loanAgainstMf(): View
    {
        return view('pages.loan-against-mf');
    }
}
