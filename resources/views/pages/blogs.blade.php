@extends('layouts.app')

@section('page', 'blogs')
@section('title', 'Financial Blogs & Insights')

@php
    // PLACEHOLDER: replace with original blog posts from fincun.in/blogs
    $blogPosts = [
        [
            'title'    => 'How Systematic Investment Plans (SIP) Tame Market Volatility',
            'category' => 'Mutual Funds',
            'date'     => 'Oct 04, 2026',
            'readTime' => '5 min read',
            'snippet'  => 'Understanding how rupee cost averaging and consistent discipline create substantial compounding over a 10-year horizon.',
        ],
        [
            'title'    => 'The Complete Guide to National Pension Scheme (NPS) Benefits',
            'category' => 'Retirement',
            'date'     => 'Sep 22, 2026',
            'readTime' => '7 min read',
            'snippet'  => 'Maximizing retirement security while optimizing tax deductions under Section 80CCD(1B) and corporate employer contributions.',
        ],
        [
            'title'    => 'Why Borrowing Against Mutual Funds is Smarter Than Liquidating',
            'category' => 'Credit & Wealth',
            'date'     => 'Aug 18, 2026',
            'readTime' => '4 min read',
            'snippet'  => 'How instant digital credit against your portfolio helps you meet emergency cash requirements without breaking compounding cycles.',
        ],
        [
            'title'    => 'Asset Allocation: The Single Biggest Determinant of Long-Term Wealth',
            'category' => 'Portfolio Strategy',
            'date'     => 'Jul 29, 2026',
            'readTime' => '6 min read',
            'snippet'  => 'Why timing individual stocks matters far less than determining your strategic balance between equity, debt, gold, and liquid cash.',
        ],
    ];
@endphp

@section('content')
    <x-page-hero 
        eyebrow="Knowledge &amp; Perspectives" 
        title="DACFIN Advisory Blog" 
        text="Clear, jargon-free articles designed to help individuals and families master their financial lives."
        :breadcrumbs="[['label' => 'Blogs']]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x space-y-12">
            
            <div class="max-w-2xl">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald block mb-2">Recent Articles</span>
                <h2 class="h-display text-3xl sm:text-4xl font-bold text-ink">
                    Practical Financial Wisdom for Informed Investors
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-stagger>
                @foreach($blogPosts as $post)
                    <article class="p-8 rounded-[2rem] bg-white border border-sand hover:border-emerald/40 hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between" data-tilt>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-xs text-slate">
                                <span class="font-bold text-emerald uppercase tracking-wider px-3 py-1 rounded-full bg-emerald/10">
                                    {{ $post['category'] }}
                                </span>
                                <span>{{ $post['date'] }} &bull; {{ $post['readTime'] }}</span>
                            </div>

                            <h3 class="font-display font-bold text-xl sm:text-2xl text-ink hover:text-emerald transition-colors leading-snug">
                                {{ $post['title'] }}
                            </h3>

                            <p class="text-xs sm:text-sm text-slate leading-relaxed">
                                {{ $post['snippet'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-sand flex items-center justify-between text-xs font-semibold">
                            <a href="{{ route('contact') }}" class="text-emerald hover:text-ink flex items-center gap-1 transition-colors">
                                <span>Discuss with an advisor</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>
@endsection
