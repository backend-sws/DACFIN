@php
    $journalMeta = config('fincun.home.journal') ?? [
        'eyebrow' => 'Wealth Journal',
        'title' => 'Insights, issue by issue',
        'all_link' => ['View all issues →', '/wealth-journal'],
        'show' => 4,
    ];
    $allIssues = config('fincun.journal.issues') ?? [];
    $issues = array_slice($allIssues, 0, $journalMeta['show'] ?? 4, true);
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Header with Title on Left and Carousel Controls on Right -->
        <div class="flex items-center justify-between pb-3 border-b border-sand/40">
            <div>
                <span class="text-xs uppercase font-bold tracking-widest text-emerald">
                    {{ $journalMeta['eyebrow'] ?? 'Wealth Journal' }}
                </span>
                <h2 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold text-ink mt-1">
                    {{ $journalMeta['title'] ?? 'Insights, issue by issue' }}
                </h2>
                <p class="text-xs sm:text-sm text-slate mt-1">
                    {{ config('fincun.journal.intro', 'An Investor Education Initiative by DACFIN.') }}
                </p>
            </div>

            <!-- Controls on Right -->
            <div class="flex items-center gap-2">
                <a 
                    href="{{ url($journalMeta['all_link'][1] ?? '/wealth-journal') }}"
                    class="hidden sm:inline-flex items-center gap-1.5 px-5 py-2.5 rounded-full border border-sand hover:border-emerald text-xs font-semibold text-slate hover:text-ink transition-colors mr-2"
                >
                    <span>View All Issues</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- 4 Cards Grid from Wireframe -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-stagger>
            @foreach($issues as $slug => $issue)
                <a 
                    href="{{ route('journal.show', $slug) }}" 
                    class="group rounded-3xl p-5 bg-white border border-sand/60 hover:border-emerald/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-4"
                    data-tilt
                >
                    <!-- Visual Thumbnail Container -->
                    <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 p-4 flex flex-col justify-between relative overflow-hidden text-white group-hover:border-[#93c5fd] transition-colors">
                        <!-- Metallic Specular Edge Shine -->
                        <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                        <div class="absolute -right-8 -top-8 w-20 h-20 bg-[#3b82f6]/25 rounded-full blur-xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                        <div class="flex items-center justify-between text-[11px] font-mono relative z-10">
                            <span class="px-2.5 py-1 rounded-full bg-white/10 border border-white/20 text-[#93c5fd] font-bold tracking-wider">
                                Issue {{ $issue['no'] }}
                            </span>
                            <span class="text-[#dbeafe] font-sans font-semibold">
                                {{ $issue['date'] }}
                            </span>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] text-white flex items-center justify-center text-xs font-bold font-display self-end shadow-md border border-[#60a5fa]/40 relative z-10 group-hover:from-saffron group-hover:to-amber-500 transition-all duration-300">
                            PDF
                        </div>
                    </div>

                    <!-- Title & Excerpt -->
                    <div class="space-y-2 flex-1">
                        <h3 class="font-display font-bold text-base text-ink line-clamp-2 group-hover:text-emerald transition-colors leading-snug">
                            {{ $issue['title'] }}
                        </h3>
                        <p class="text-xs text-slate line-clamp-3 leading-relaxed">
                            {{ $issue['body'] }}
                        </p>
                    </div>

                    <!-- Bottom Link -->
                    <div class="pt-3 border-t border-sand/40 flex items-center justify-between text-xs font-semibold text-emerald group-hover:text-ink transition-colors">
                        <span>Read Newsletter &rarr;</span>
                        <span class="text-saffron group-hover:translate-x-1 transition-transform font-bold">Issue {{ $issue['no'] }}</span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Mobile See All Button -->
        <div class="sm:hidden pt-2 text-center">
            <a 
                href="/wealth-journal"
                class="inline-flex items-center justify-center gap-2 w-full py-3.5 px-6 rounded-full bg-ink text-cream text-xs font-semibold shadow-md"
            >
                <span>View All Journal Issues</span>
                <span>&rarr;</span>
            </a>
        </div>

    </div>
</section>
