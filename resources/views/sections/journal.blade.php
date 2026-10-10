@php
    $journalMeta = config('fincun.home.journal');
    $allIssues = config('fincun.journal.issues');
    $issues = array_slice($allIssues, 0, $journalMeta['show'] ?? 4, true);
@endphp

<section class="section-y bg-ink text-cream relative overflow-hidden">
    <!-- Glow -->
    <div class="absolute bottom-0 left-1/3 w-96 h-96 rounded-full bg-forest/50 blur-[130px] pointer-events-none"></div>

    <div class="container-x relative z-10 space-y-12 sm:space-y-16">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <x-ui.section-title 
                :eyebrow="$journalMeta['eyebrow']" 
                :title="$journalMeta['title']" 
                :light="true" 
            />

            <div>
                <x-ui.button :href="$journalMeta['all_link'][1]" variant="ghost" class="text-mint border-emerald/30 hover:bg-forest text-xs">
                    {{ $journalMeta['all_link'][0] }}
                </x-ui.button>
            </div>
        </div>

        <!-- Issue Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-stagger>
            @foreach($issues as $slug => $issue)
                <a 
                    href="{{ route('journal.show', $slug) }}" 
                    class="group rounded-[2rem] p-6 bg-forest/50 border border-emerald/25 hover:border-saffron hover:bg-forest/80 transition-all duration-300 flex flex-col justify-between space-y-8"
                    data-tilt
                >
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-xs font-bold text-saffron px-3 py-1 rounded-full bg-ink/70 border border-emerald/20">
                            Issue {{ $issue['no'] }}
                        </span>
                        <span class="text-xs text-sand/60 font-medium">
                            {{ $issue['date'] }}
                        </span>
                    </div>

                    <!-- Magazine Cover Mockup Artwork -->
                    <div class="aspect-[3/4] rounded-2xl bg-ink/60 border border-emerald/20 p-5 flex flex-col justify-between relative overflow-hidden group-hover:border-saffron/40 transition-colors">
                        <div class="space-y-1">
                            <span class="text-[9px] uppercase tracking-widest text-mint font-bold block">FINCUN JOURNAL</span>
                            <h4 class="font-display font-bold text-base text-cream line-clamp-3 leading-snug group-hover:text-saffron transition-colors">
                                {{ $issue['title'] ?? 'Strategic Financial Insights' }}
                            </h4>
                        </div>

                        <div class="pt-4 border-t border-emerald/15 flex items-center justify-between text-[11px] text-sand/60">
                            <span>Read Article</span>
                            <span class="text-saffron group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </div>
                    </div>

                    <div class="text-xs font-semibold text-mint group-hover:text-saffron flex items-center gap-1">
                        <span>Read Issue {{ $issue['no'] }}</span>
                        <span>&rarr;</span>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>
