<?php

use App\Http\Controllers\ApproachController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

// 1. Homepage
Route::get('/', HomeController::class)->name('home');

// 2-5. Company Pages
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/our-team', [PageController::class, 'team'])->name('team');
Route::get('/why-fincun', [PageController::class, 'whyFincun'])->name('why-fincun');
Route::get('/why-financial-planning', [PageController::class, 'whyPlanning'])->name('why-planning');

// 6-11. Services (with 301 redirect for spelling alias)
Route::redirect('/services/financial-planning', '/services/financial-planing', 301);
Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->whereIn('slug', [
        'financial-planing',
        'investment-advise',
        'wealth-management',
        'loan',
        'insurance',
        'training',
    ])
    ->name('services.show');

// 12-18. Who We Serve
Route::get('/who-we-serve/{slug}', [AudienceController::class, 'show'])
    ->whereIn('slug', [
        'individual-families',
        'businesses',
        'nris',
        'professionals',
        'charity-trust',
        'urban-women',
        'special-situations',
    ])
    ->name('audiences.show');

// 19-21. Our Approach
Route::get('/our-approach/{slug}', [ApproachController::class, 'show'])
    ->whereIn('slug', [
        'alignment',
        'customised-solutions',
        'keep-you-informed',
    ])
    ->name('approach.show');

// 22-27. Wealth Journal Index & Issues
Route::get('/wealth-journal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/wealth-journal/{slug}', [JournalController::class, 'show'])
    ->whereIn('slug', [
        'newsletter-issue-5-july-2026',
        'newsletter-issue-4-may-2026',
        'newsletter-issue-3-april-2026',
        'newsletter-issue-2-february-2026',
        'newsletter-issue-1-january-2026',
    ])
    ->name('journal.show');

// 28. Blogs
Route::get('/blogs', BlogController::class)->name('blogs');

// 29-30. Mobile Apps & Loan Against MF
Route::get('/mobile-apps', [PageController::class, 'mobileApps'])->name('mobile-apps');
Route::get('/loan-against-mf', [PageController::class, 'loanAgainstMf'])->name('loan-mf');

// 31. Contact
Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

// Dynamic XML Sitemap for all 31 routes
Route::get('/sitemap.xml', function () {
    $urls = [
        url('/'),
        url('/about-us'),
        url('/our-team'),
        url('/why-fincun'),
        url('/why-financial-planning'),
        url('/services/financial-planing'),
        url('/services/investment-advise'),
        url('/services/wealth-management'),
        url('/services/loan'),
        url('/services/insurance'),
        url('/services/training'),
        url('/who-we-serve/individual-families'),
        url('/who-we-serve/businesses'),
        url('/who-we-serve/nris'),
        url('/who-we-serve/professionals'),
        url('/who-we-serve/charity-trust'),
        url('/who-we-serve/urban-women'),
        url('/who-we-serve/special-situations'),
        url('/our-approach/alignment'),
        url('/our-approach/customised-solutions'),
        url('/our-approach/keep-you-informed'),
        url('/wealth-journal'),
        url('/wealth-journal/newsletter-issue-5-july-2026'),
        url('/wealth-journal/newsletter-issue-4-may-2026'),
        url('/wealth-journal/newsletter-issue-3-april-2026'),
        url('/wealth-journal/newsletter-issue-2-february-2026'),
        url('/wealth-journal/newsletter-issue-1-january-2026'),
        url('/blogs'),
        url('/mobile-apps'),
        url('/loan-against-mf'),
        url('/contact-us'),
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars($url, ENT_XML1, 'UTF-8').'</loc>';
        $xml .= '<lastmod>'.date('Y-m-d').'</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>'.($url === url('/') ? '1.0' : '0.8').'</priority>';
        $xml .= '</url>';
    }
    $xml .= '</urlset>';

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
