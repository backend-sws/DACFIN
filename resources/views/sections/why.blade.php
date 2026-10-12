@php
    $why = config('fincun.home.why');
@endphp

<section id="why" class="py-12 sm:py-16 lg:py-20 bg-forest text-cream relative overflow-hidden border-t border-emerald/30" data-why-section>
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Header -->
        <div class="max-w-3xl space-y-2.5" data-why-header>
            <x-ui.section-title 
                :eyebrow="$why['eyebrow']" 
                :title="$why['title']" 
                :light="true" 
            />
            <p class="text-sand/80 text-xs sm:text-sm md:text-base leading-relaxed pt-1">
                {{ $why['text'] }}
            </p>
        </div>

        <!-- 5 Principles Bento Grid + CTA Tile (Fully responsive: 1 col on mobile, 2 col on tablet, 3 col on desktop) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6" data-why-grid>
            @foreach($why['items'] as $idx => $item)
                <div class="rounded-2xl sm:rounded-3xl p-5 sm:p-6 bg-ink/65 border border-emerald/25 hover:border-saffron/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between will-change-transform group backdrop-blur-sm" data-why-card data-tilt>
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-xs font-bold text-saffron px-2.5 py-0.5 rounded-full bg-forest border border-emerald/30 group-hover:scale-105 transition-transform">
                            0{{ $idx + 1 }}
                        </span>
                        <span class="text-[10px] font-mono tracking-widest text-mint/60 uppercase">
                            DACFIN Principle
                        </span>
                    </div>

                    <div class="space-y-2 my-auto">
                        <h4 class="font-display font-bold text-base sm:text-lg text-cream group-hover:text-saffron transition-colors leading-snug">
                            {{ $item[0] }}
                        </h4>
                        <p class="text-xs sm:text-[13px] text-sand/75 leading-relaxed">
                            {{ $item[1] }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-emerald/15 flex items-center justify-between text-[11px] text-sand/60">
                        <span class="flex items-center gap-1.5 text-mint font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald"></span>
                            Transparent standard
                        </span>
                        <span class="font-mono text-sand/40">
                            #0{{ $idx + 1 }}
                        </span>
                    </div>
                </div>
            @endforeach

            <!-- 6th Tile: Quick Callout (High-contrast Sunrise Gold, perfectly legible on all screens) -->
            <div class="rounded-2xl sm:rounded-3xl p-5 sm:p-6 bg-gradient-to-br from-amber-400 via-amber-500 to-amber-600 text-ink space-y-3.5 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 will-change-transform shadow-lg shadow-amber-500/20 group" data-why-card>
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-ink/80 px-2.5 py-0.5 rounded-full bg-ink/10 border border-ink/20">
                        Client First
                    </span>
                    <span class="font-mono text-xs font-bold text-ink/70">
                        06 / 06
                    </span>
                </div>

                <div class="space-y-2 my-auto">
                    <h4 class="font-display font-bold text-lg sm:text-xl text-ink leading-snug">
                        Ready to experience clear, jargon-free advisory?
                    </h4>
                    <p class="text-xs text-ink/85 leading-relaxed font-medium">
                        Schedule a one-on-one session with our Patna advisory team. Zero sales quotas, 100% fiduciary clarity.
                    </p>
                </div>

                <div class="pt-3 border-t border-ink/15">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-xs font-bold text-ink underline uppercase tracking-wider group-hover:translate-x-1 transition-transform">
                        <span>Book a Conversation</span>
                        <span class="text-sm font-normal">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- 3 Approach Steps Bottom Bar (Mobile responsive flex / grid) -->
        <div class="pt-8 sm:pt-10 border-t border-emerald/20">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5 sm:mb-6">
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-mint block">Our Advisory Blueprint</span>
                    <h3 class="font-display text-lg sm:text-xl lg:text-2xl font-bold text-cream">The Three-Pillar Approach</h3>
                </div>
                <x-ui.button :href="route('approach.show', 'alignment')" variant="ghost" class="text-mint border-emerald/30 hover:bg-forest text-xs py-2 px-4 self-start sm:self-auto">
                    Explore Our Approach
                </x-ui.button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3.5 sm:gap-4" data-why-approach-grid>
                @foreach($why['approach'] as $app)
                    <a 
                        href="{{ $app[2] }}" 
                        class="group p-4 sm:p-4.5 rounded-xl sm:rounded-2xl bg-ink/50 border border-emerald/20 hover:border-saffron hover:bg-ink/80 hover:-translate-y-1 transition-all flex items-center justify-between will-change-transform"
                        data-why-approach-card
                    >
                        <div class="flex items-center gap-3">
                            <span class="font-mono text-xs sm:text-sm font-bold text-saffron group-hover:scale-110 transition-transform">
                                {{ $app[0] }}
                            </span>
                            <span class="font-display font-semibold text-xs sm:text-sm text-cream group-hover:text-saffron transition-colors">
                                {{ $app[1] }}
                            </span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-mint group-hover:text-saffron group-hover:translate-x-1 transition-all shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
