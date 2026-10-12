@php
    $why = config('fincun.home.why');
@endphp

<section id="why" class="py-10 sm:py-14 lg:py-16 bg-forest text-cream relative overflow-hidden border-t border-emerald/30" data-why-section>
    <div class="container-x space-y-8 sm:space-y-10">
        
        <!-- Header -->
        <div class="max-w-3xl space-y-2.5" data-why-header>
            <x-ui.section-title 
                :eyebrow="$why['eyebrow']" 
                :title="$why['title']" 
                :light="true" 
            />
            <p class="text-sand/80 text-sm sm:text-base leading-relaxed pt-1">
                {{ $why['text'] }}
            </p>
        </div>

        <!-- 5 Principles Bento/List Grid (Pop motion on scroll) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5" data-why-grid>
            @foreach($why['items'] as $idx => $item)
                <div class="rounded-2xl p-4 sm:p-5 bg-ink/50 border border-emerald/20 hover:border-saffron/50 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 space-y-2.5 flex flex-col justify-between will-change-transform group" data-why-card data-tilt>
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-[11px] font-bold text-saffron px-2.5 py-0.5 rounded-full bg-forest border border-emerald/30 group-hover:scale-105 transition-transform">
                            0{{ $idx + 1 }}
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald/60"></span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-display font-bold text-base sm:text-lg text-cream group-hover:text-saffron transition-colors">
                            {{ $item[0] }}
                        </h4>
                        <p class="text-xs sm:text-[13px] text-sand/70 leading-relaxed">
                            {{ $item[1] }}
                        </p>
                    </div>
                </div>
            @endforeach

            <!-- 6th Tile: Quick Callout -->
            <div class="rounded-2xl p-4 sm:p-5 bg-saffron text-ink space-y-2.5 flex flex-col justify-between hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 will-change-transform" data-why-card>
                <span class="text-[10px] font-bold uppercase tracking-widest text-ink/75">Client First</span>
                <div>
                    <h4 class="font-display font-bold text-lg sm:text-xl text-ink leading-snug">
                        Ready to experience clear, jargon-free advisory?
                    </h4>
                </div>
                <div>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-ink underline uppercase tracking-wider hover:translate-x-1 transition-transform">
                        Book a Conversation &rarr;
                    </a>
                </div>
            </div>
        </div>

        <!-- 3 Approach Steps Bottom Bar -->
        <div class="pt-8 border-t border-emerald/20">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-5">
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-mint block">Our Advisory Blueprint</span>
                    <h3 class="font-display text-xl sm:text-2xl font-bold text-cream">The Three-Pillar Approach</h3>
                </div>
                <x-ui.button :href="route('approach.show', 'alignment')" variant="ghost" class="text-mint border-emerald/30 text-xs py-1.5 px-4">
                    Explore Our Approach
                </x-ui.button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-4" data-why-approach-grid>
                @foreach($why['approach'] as $app)
                    <a 
                        href="{{ $app[2] }}" 
                        class="group p-3.5 sm:p-4 rounded-xl bg-ink/40 border border-emerald/20 hover:border-saffron hover:bg-ink/70 hover:-translate-y-1 transition-all flex items-center justify-between will-change-transform"
                        data-why-approach-card
                    >
                        <div class="flex items-center gap-3">
                            <span class="font-mono text-xs sm:text-sm font-bold text-saffron group-hover:scale-110 transition-transform">
                                {{ $app[0] }}
                            </span>
                            <span class="font-display font-semibold text-sm sm:text-base text-cream group-hover:text-saffron transition-colors">
                                {{ $app[1] }}
                            </span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-mint group-hover:text-saffron group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
