@php
    $journalMeta = config('fincun.home.journal') ?? [
        'eyebrow' => 'Wealth Journal',
        'title' => 'Blog Section',
        'all_link' => ['View all issues →', '/wealth-journal'],
        'show' => 4,
    ];
    $allIssues = config('fincun.journal.issues') ?? [];
    $issues = array_slice($allIssues, 0, $journalMeta['show'] ?? 4, true);
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Header with Title on Left and Carousel Controls on Right -->
        <div class="flex items-center justify-between pb-2 border-b border-sand/40">
            <div>
                <span class="text-xs uppercase font-bold tracking-widest text-emerald">FINCUN Insights</span>
                <h2 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold text-ink">
                    Blog Section
                </h2>
            </div>

            <!-- Controls on Right from Wireframe -->
            <div class="flex items-center gap-2">
                <a 
                    href="/wealth-journal"
                    class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-sand hover:border-emerald text-xs font-semibold text-slate hover:text-ink transition-colors mr-2"
                >
                    <span>See All</span>
                    <span>&rarr;</span>
                </a>

                <div class="hidden sm:flex items-center gap-1.5">
                    <button 
                        type="button" 
                        class="w-9 h-9 rounded-full border border-sand hover:border-emerald flex items-center justify-center text-ink hover:text-emerald transition-colors"
                        aria-label="Previous"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button 
                        type="button" 
                        class="w-9 h-9 rounded-full border border-sand hover:border-emerald flex items-center justify-center text-ink hover:text-emerald transition-colors"
                        aria-label="Next"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- 4 Cards Grid from Wireframe -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-stagger>
            @foreach($issues as $slug => $issue)
                <a 
                    href="{{ route('journal.show', $slug) }}" 
                    class="group rounded-3xl p-4 sm:p-5 bg-white border border-sand/60 hover:border-emerald/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-4"
                    data-tilt
                >
                    <!-- Visual Thumbnail Container -->
                    <div class="aspect-[4/3] rounded-2xl bg-forest/10 border border-sand/40 p-4 flex flex-col justify-between relative overflow-hidden group-hover:bg-forest/15 transition-colors">
                        <div class="flex items-center justify-between text-[10px] font-mono">
                            <span class="px-2 py-0.5 rounded-full bg-ink text-mint font-bold">
                                Issue {{ $issue['no'] }}
                            </span>
                            <span class="text-slate font-sans">
                                {{ $issue['date'] }}
                            </span>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-forest/80 text-mint flex items-center justify-center text-xs font-bold font-display self-end">
                            PDF
                        </div>
                    </div>

                    <!-- Title & Excerpt -->
                    <div class="space-y-1.5 flex-1">
                        <h3 class="font-display font-bold text-sm sm:text-base text-ink line-clamp-2 group-hover:text-emerald transition-colors leading-snug">
                            {{ $issue['title'] ?? 'Strategic Financial Insights' }}
                        </h3>
                        <p class="text-xs text-slate line-clamp-2 leading-relaxed">
                            {{ $issue['theme'] ?? 'Essential principles for wealth accumulation and risk stewardship.' }}
                        </p>
                    </div>

                    <!-- Bottom Link from Wireframe -->
                    <div class="pt-2 border-t border-sand/40 flex items-center justify-between text-xs font-semibold text-emerald group-hover:text-ink transition-colors">
                        <span>Read Issue {{ $issue['no'] }}</span>
                        <span class="text-saffron group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Mobile See All Button -->
        <div class="sm:hidden pt-2 text-center">
            <a 
                href="/wealth-journal"
                class="inline-flex items-center justify-center gap-2 w-full py-3 px-6 rounded-full bg-ink text-cream text-xs font-semibold"
            >
                <span>View All Journal Issues</span>
                <span>&rarr;</span>
            </a>
        </div>

    </div>
</section>
