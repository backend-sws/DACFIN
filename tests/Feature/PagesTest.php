<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that all 31 application routes return HTTP 200.
     */
    public function test_all_pages_render_successfully(): void
    {
        $urls = [
            '/',
            '/about-us',
            '/our-team',
            '/why-fincun',
            '/why-financial-planning',
            '/services/financial-planing',
            '/services/investment-advise',
            '/services/wealth-management',
            '/services/loan',
            '/services/insurance',
            '/services/training',
            '/who-we-serve/individual-families',
            '/who-we-serve/businesses',
            '/who-we-serve/nris',
            '/who-we-serve/professionals',
            '/who-we-serve/charity-trust',
            '/who-we-serve/urban-women',
            '/who-we-serve/special-situations',
            '/our-approach/alignment',
            '/our-approach/customised-solutions',
            '/our-approach/keep-you-informed',
            '/wealth-journal',
            '/wealth-journal/newsletter-issue-5-july-2026',
            '/wealth-journal/newsletter-issue-4-may-2026',
            '/wealth-journal/newsletter-issue-3-april-2026',
            '/wealth-journal/newsletter-issue-2-february-2026',
            '/wealth-journal/newsletter-issue-1-january-2026',
            '/blogs',
            '/mobile-apps',
            '/loan-against-mf',
            '/contact-us',
            '/sitemap.xml',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    /**
     * Test that unknown slugs properly 404.
     */
    public function test_unknown_slug_returns_404(): void
    {
        $response = $this->get('/services/unknown-non-existent-service');
        $response->assertStatus(404);

        $response = $this->get('/who-we-serve/unknown-audience');
        $response->assertStatus(404);

        $response = $this->get('/our-approach/unknown-approach');
        $response->assertStatus(404);
    }

    /**
     * Test financial planning spelling redirect.
     */
    public function test_financial_planning_spelling_redirect(): void
    {
        $response = $this->get('/services/financial-planning');
        $response->assertStatus(301);
        $response->assertRedirect('/services/financial-planing');
    }

    /**
     * Test contact form submission (valid).
     */
    public function test_contact_form_valid_submission(): void
    {
        $payload = [
            'name' => 'Arun Sharma',
            'phone' => '+91 9835349232',
            'email' => 'arun@example.com',
            'interest' => 'Financial Planning',
            'message' => 'Interested in comprehensive retirement planning advice.',
        ];

        $response = $this->postJson('/contact-us', $payload);

        $response->assertStatus(200);
        $response->assertJson(['ok' => true]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Arun Sharma',
            'email' => 'arun@example.com',
            'interest' => 'Financial Planning',
        ]);
    }

    /**
     * Test contact form honeypot rejection.
     */
    public function test_contact_form_honeypot_triggers_validation_error(): void
    {
        $payload = [
            'name' => 'Bot User',
            'phone' => '+91 9835349232',
            'email' => 'bot@example.com',
            'website' => 'http://spamsite.com',
        ];

        $response = $this->postJson('/contact-us', $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['website']);
    }
}
