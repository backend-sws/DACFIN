@php
    $why = config('fincun.home.why');
@endphp

<section id="why" class="bg-forest text-cream relative border-t border-emerald/30 overflow-hidden" data-why-section>
    
    <!-- Pinned Horizontal Scroll Stage -->
    <div class="why-pinned-stage relative min-h-screen flex flex-col justify-between overflow-hidden pt-20 sm:pt-24 lg:pt-28 pb-8 sm:pb-12" data-why-pinned>
        
        <!-- Header & Progress Strip -->
        <div class="container-x mb-6 sm:mb-8 lg:mb-10" data-why-header>
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div class="max-w-2xl space-y-2.5">
                    <x-ui.section-title 
                        :eyebrow="$why['eyebrow']" 
                        :title="$why['title']" 
                        :light="true" 
                    />
                    <p class="text-sand/80 text-sm sm:text-base leading-relaxed pt-1">
                        {{ $why['text'] }}
                    </p>
                </div>

                <!-- Interactive Scroll Guide & Dynamic Progress Indicator -->
                <div class="flex items-center gap-3 sm:gap-4 bg-ink/60 border border-emerald/25 rounded-full px-4 py-2 self-start lg:self-auto backdrop-blur-md shadow-lg">
                    <span class="flex items-center gap-2 text-xs font-mono text-sand/80">
                        <span class="w-2 h-2 rounded-full bg-saffron animate-pulse"></span>
                        <span class="hidden sm:inline">Scroll to advance</span>
                        <span class="sm:hidden">Scroll</span>
                    </span>
                    <div class="w-20 sm:w-28 h-1.5 bg-forest rounded-full overflow-hidden border border-emerald/30">
                        <div class="h-full bg-gradient-to-r from-saffron to-mint rounded-full transition-all duration-150" data-why-progress style="width: 16%;"></div>
                    </div>
                    <span class="text-xs font-mono font-bold text-saffron tracking-wider" data-why-counter>01 / 06</span>
                </div>
            </div>
        </div>

        <!-- Single Horizontal Row / Track -->
        <div class="why-track-viewport w-full overflow-hidden relative" data-why-viewport>
            <div class="why-track flex flex-nowrap items-stretch gap-5 sm:gap-6 lg:gap-8 pl-4 sm:pl-6 lg:pl-8 xl:pl-[calc(max(2rem,(100vw-1280px)/2+2rem))] pr-8 sm:pr-16 lg:pr-32 will-change-transform" data-why-track>
                
                @foreach($why['items'] as $idx => $item)
                    <div class="why-card w-[82vw] sm:w-[380px] md:w-[420px] lg:w-[450px] shrink-0 rounded-2xl sm:rounded-3xl p-6 sm:p-7 bg-ink/70 border border-emerald/25 hover:border-saffron/60 hover:shadow-2xl hover:shadow-saffron/10 transition-all duration-300 flex flex-col justify-between group relative overflow-hidden backdrop-blur-md will-change-transform" data-why-card data-tilt>
                        
                        <!-- Ambient card highlight -->
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-emerald/10 rounded-full blur-2xl group-hover:bg-saffron/15 transition-all duration-500 pointer-events-none"></div>

                        <!-- Top row: Badge and subtle pillar label -->
                        <div class="flex items-center justify-between relative z-10">
                            <span class="font-mono text-xs font-bold text-saffron px-3 py-1 rounded-full bg-forest/90 border border-emerald/30 group-hover:scale-105 group-hover:border-saffron/50 transition-all">
                                0{{ $idx + 1 }}
                            </span>
                            <span class="text-[11px] font-mono tracking-widest text-mint/70 uppercase">
                                DACFIN Principle
                            </span>
                        </div>

                        <!-- Content: Title and description -->
                        <div class="space-y-3 my-6 sm:my-8 relative z-10">
                            <h4 class="font-display font-bold text-xl sm:text-2xl text-cream group-hover:text-saffron transition-colors leading-tight">
                                {{ $item[0] }}
                            </h4>
                            <p class="text-sm sm:text-[15px] text-sand/80 leading-relaxed">
                                {{ $item[1] }}
                            </p>
                        </div>

                        <!-- Bottom row: Trust metric / micro-tag -->
                        <div class="pt-4 border-t border-emerald/15 flex items-center justify-between text-xs text-sand/60 relative z-10">
                            <span class="flex items-center gap-1.5 text-mint group-hover:text-saffron transition-colors font-medium">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald"></span>
                                Transparent standard
                            </span>
                            <span class="font-mono text-[11px] text-sand/40 group-hover:text-sand/80 transition-colors">
                                Fiduciary #0{{ $idx + 1 }}
                            </span>
                        </div>
                    </div>
                @endforeach

                <!-- 6th Tile: Client First Callout -->
                <div class="why-card w-[82vw] sm:w-[380px] md:w-[420px] lg:w-[450px] shrink-0 rounded-2xl sm:rounded-3xl p-6 sm:p-7 bg-gradient-to-br from-saffron via-amber-400 to-amber-500 text-ink shadow-2xl shadow-saffron/20 flex flex-col justify-between group relative overflow-hidden will-change-transform" data-why-card>
                    
                    <!-- Decorative subtle watermark -->
                    <div class="absolute -bottom-8 -right-8 opacity-10 text-ink font-display font-black text-9xl select-none pointer-events-none">
                        DAC
                    </div>

                    <div class="flex items-center justify-between relative z-10">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-ink/80 px-3 py-1 rounded-full bg-ink/10 border border-ink/20">
                            Client First
                        </span>
                        <span class="font-mono text-xs font-bold text-ink/70">
                            06 / 06
                        </span>
                    </div>

                    <div class="space-y-3 my-6 sm:my-8 relative z-10">
                        <h4 class="font-display font-bold text-2xl sm:text-3xl text-ink leading-tight">
                            Ready to experience clear, jargon-free advisory?
                        </h4>
                        <p class="text-xs sm:text-sm text-ink/85 leading-relaxed font-medium">
                            Book an introductory conversation with our Patna advisory team. Zero sales quotas, 100% fiduciary clarity.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-ink/15 relative z-10">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-ink hover:text-forest group-hover:translate-x-1.5 transition-all">
                            <span>Book a Conversation</span>
                            <span class="text-base">&rarr;</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scroll guidance indicator -->
        <div class="container-x mt-4 flex items-center justify-between text-xs text-sand/50 font-mono">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-saffron/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
                <span>Vertical scroll navigates boxes horizontally</span>
            </span>
            <span class="hidden sm:inline text-sand/40">Scroll completion unlocks lower page</span>
        </div>

    </div>

    <!-- 3 Approach Steps Bottom Bar (Reveals naturally when pinned horizontal scroll finishes!) -->
    <div class="container-x py-12 sm:py-16 lg:py-20 border-t border-emerald/20 relative" data-why-blueprint>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 sm:mb-8">
            <div>
                <span class="text-[11px] uppercase font-bold tracking-widest text-mint block">Our Advisory Blueprint</span>
                <h3 class="font-display text-xl sm:text-2xl font-bold text-cream">The Three-Pillar Approach</h3>
            </div>
            <x-ui.button :href="route('approach.show', 'alignment')" variant="ghost" class="text-mint border-emerald/30 text-xs py-1.5 px-4 self-start md:self-auto">
                Explore Our Approach
            </x-ui.button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 sm:gap-4" data-why-approach-grid>
            @foreach($why['approach'] as $app)
                <a 
                    href="{{ $app[2] }}" 
                    class="group p-4 sm:p-5 rounded-2xl bg-ink/50 border border-emerald/20 hover:border-saffron hover:bg-ink/80 hover:-translate-y-1 transition-all flex items-center justify-between will-change-transform"
                    data-why-approach-card
                >
                    <div class="flex items-center gap-3.5">
                        <span class="font-mono text-xs sm:text-sm font-bold text-saffron group-hover:scale-110 transition-transform">
                            {{ $app[0] }}
                        </span>
                        <span class="font-display font-semibold text-sm sm:text-base text-cream group-hover:text-saffron transition-colors">
                            {{ $app[1] }}
                        </span>
                    </div>
                    <svg class="w-4 h-4 text-mint group-hover:text-saffron group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @endforeach
        </div>
    </div>

</section>
