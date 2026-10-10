@php
    $spotlight = config('fincun.home.spotlight') ?? [
        'stats' => [
            ['val' => '₹500Cr+', 'label' => 'Total AUM advised with disciplined fiduciary oversight.'],
            ['val' => '15+ Years', 'label' => 'Proven leadership navigating bull and bear market cycles.'],
            ['val' => '100%', 'label' => 'Unbiased advisory standard with zero product quotas.'],
        ],
        'title' => 'Patna & Ranchi: The Transformation of Wealth Advisory.',
        'text' => 'For decades, tier-2 cities in eastern India were underserved by transactional product pushers. FINCUN was established in 2016 to introduce institutional-grade, goal-based wealth planning right to your doorstep in Patna and Ranchi.',
        'cta' => ['Explore Regional Presence', '/about-us'],
        'image' => '/images/about-section.svg',
    ];
    $stats = $spotlight['stats'] ?? [];
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x">
        <!-- Wireframe 3-Column Asymmetric Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
            
            <!-- Left Column: 3 Big Stacked Stats -->
            <div class="lg:col-span-4 flex flex-col justify-between space-y-6 sm:space-y-8" data-reveal="right">
                @foreach($stats as $st)
                    <div class="p-6 rounded-3xl bg-white border border-sand/60 shadow-sm hover:shadow-md transition-all space-y-1 group">
                        <span class="block font-display font-bold text-3xl sm:text-4xl text-ink group-hover:text-emerald transition-colors">
                            {{ $st['val'] }}
                        </span>
                        <p class="text-xs sm:text-sm text-slate leading-relaxed">
                            {{ $st['label'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Center Column: Visual Card -->
            <div class="lg:col-span-4 rounded-3xl bg-white border border-sand/60 p-4 sm:p-5 flex items-center justify-center shadow-sm relative overflow-hidden" data-reveal="up">
                <div class="w-full h-full min-h-[260px] rounded-2xl bg-forest/10 border border-sand/40 overflow-hidden relative flex items-center justify-center p-4">
                    <img 
                        src="{{ $spotlight['image'] ?? '/images/about-section.svg' }}" 
                        alt="Regional Wealth Advisory" 
                        class="w-full h-full object-contain"
                        loading="lazy"
                    >
                    <span class="absolute bottom-3 left-3 px-3 py-1 rounded-full bg-ink/80 text-mint text-[10px] font-semibold">
                        Dual Regional Hubs
                    </span>
                </div>
            </div>

            <!-- Right Column: Editorial Transformation Story -->
            <div class="lg:col-span-4 rounded-3xl bg-white border border-sand/60 p-6 sm:p-8 flex flex-col justify-between shadow-sm space-y-6" data-reveal="left">
                <div class="space-y-4">
                    <span class="text-xs uppercase font-bold tracking-widest text-emerald">Regional Leadership</span>
                    <h3 class="h-display font-bold text-xl sm:text-2xl text-ink leading-snug">
                        {{ $spotlight['title'] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-slate leading-relaxed">
                        {{ $spotlight['text'] }}
                    </p>
                </div>

                <div class="pt-4 border-t border-sand/40">
                    <a 
                        href="{{ $spotlight['cta'][1] ?? '/about-us' }}"
                        class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-emerald hover:text-ink transition-colors group"
                    >
                        <span>{{ $spotlight['cta'][0] ?? 'Explore Regional Presence' }}</span>
                        <svg class="w-4 h-4 text-saffron transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
