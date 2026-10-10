<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class JournalController extends Controller
{
    public function index(): View
    {
        $journal = config('fincun.journal');

        return view('pages.journal.index', [
            'journal' => $journal,
        ]);
    }

    public function show(string $slug): View
    {
        $issue = config("fincun.journal.issues.{$slug}") ?? abort(404);

        return view('pages.journal.show', [
            'issue' => $issue,
            'slug' => $slug,
        ]);
    }
}
