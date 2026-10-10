@php
    $slides = config('fincun.home.hero_slides');
@endphp

<section 
    class="relative min-h-[92vh] sm:min-h-screen bg-ink text-cream pt-28 sm:pt-36 pb-20 overflow-hidden flex items-center" 
    x-data="{
        activeSlide: 0,
        totalSlides: {{ count($slides) }},
        timer: null,
        progress: 0,
        startAutoplay() {
            this.timer = setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
            }, 6000);
        },
        goToSlide(index) {
            this.activeSlide = index;
            clearInterval(this.timer);
            this.startAutoplay();
        }
    }"
    x-init="startAutoplay()"
>
    <!-- Background Dynamic Ambient Glows -->
    <div class="absolute top-1/4 -left-32 w-[500px] h-[500px] rounded-full bg-forest/60 blur-[130px] pointer-events-none"></div>
    <div class="absolute top-1/3 -right-32 w-[450px] h-[450px] rounded-full bg-emerald/20 blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-[600px] h-48 rounded-full bg-saffron/10 blur-[100px] pointer-events-none"></div>

    <div class="container-x relative z-10 w-full py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Rotating Slides (7 cols) -->
            <div class="lg:col-span-7 space-y-8" data-hero>
                @foreach($slides as $index => $slide)
                    <div 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 translate-y-6"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300 absolute"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-6"
                        class="space-y-6"
                        @if($index > 0) style="display: none;" @endif
                    >
                        <x-ui.eyebrow :text="$slide['eyebrow']" :light="true" />

                        <h1 class="h-display text-4xl sm:text-5xl md:text-6xl xl:text-7xl font-bold leading-[1.08] text-cream" data-split="words">
                            @php
                                $words = explode(' ', $slide['title']);
                                $lastWord = array_pop($words);
                                $leadingWords = implode(' ', $words);
                            @endphp
                            {{ $leadingWords }} <span class="italic text-saffron font-normal">{{ $lastWord }}</span>
                        </h1>

                        <p class="text-base sm:text-lg md:text-xl text-sand/80 max-w-xl font-light leading-relaxed">
                            {{ $slide['text'] }}
                        </p>

                        <div class="pt-2 flex flex-wrap items-center gap-4">
                            <x-ui.button :href="$slide['cta'][1]" variant="primary" class="text-sm px-8 py-4">
                                {{ $slide['cta'][0] }}
                            </x-ui.button>
                            <x-ui.button href="#about" variant="glass" class="text-sm px-6 py-4" :arrow="false">
                                <span>Learn More</span>
                                <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                </svg>
                            </x-ui.button>
                        </div>
                    </div>
                @endforeach

                <!-- Slide Indicators & Controls -->
                <div class="flex items-center gap-3 pt-6">
                    @foreach($slides as $index => $slide)
                        <button 
                            type="button" 
                            @click="goToSlide({{ $index }})"
                            class="relative h-1.5 rounded-full transition-all duration-300 focus:outline-none"
                            :class="activeSlide === {{ $index }} ? 'w-12 bg-saffron' : 'w-4 bg-emerald/40 hover:bg-emerald/70'"
                            aria-label="Go to slide {{ $index + 1 }}"
                        ></button>
                    @endforeach
                    <span class="text-xs text-sand/50 font-mono ml-2">
                        0<span x-text="activeSlide + 1">1</span> / 0{{ count($slides) }}
                    </span>
                </div>
            </div>

            <!-- Right Column: Floating Interactive Glass Card with Chart (5 cols) -->
            <div class="lg:col-span-5 relative" data-parallax="0.05">
                <div class="relative mx-auto max-w-md w-full">
                    <!-- Glass Portfolio Card -->
                    <div class="rounded-[2.5rem] p-7 bg-forest/70 backdrop-blur-2xl border border-emerald/30 shadow-2xl text-cream relative overflow-hidden group hover:border-emerald/50 transition-all duration-500" data-tilt>
                        <!-- Top status -->
                        <div class="flex items-center justify-between pb-6 border-b border-emerald/20">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-2xl bg-saffron/20 border border-saffron/40 flex items-center justify-center text-saffron">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-display font-semibold text-sm text-cream">Portfolio Alpha</h4>
                                    <span class="text-[11px] text-mint">Dynamic Strategy</span>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald/30 text-mint border border-emerald/40 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald animate-ping"></span>
                                Active
                            </span>
                        </div>

                        <!-- Main Metric -->
                        <div class="py-6 space-y-1">
                            <span class="text-xs text-sand/60 font-medium uppercase tracking-wider">Estimated Wealth Growth</span>
                            <div class="flex items-baseline gap-3">
                                <span class="font-display text-4xl sm:text-5xl font-extrabold text-cream">&plus;19.4%</span>
                                <span class="text-sm font-semibold text-mint">&uarr; 4.8% vs Nifty</span>
                            </div>
                        </div>

                        <!-- Animated SVG Line Chart -->
                        <div class="relative h-40 w-full pt-2">
                            <svg class="w-full h-full overflow-visible" viewBox="0 0 320 120" fill="none">
                                <defs>
                                    <linearGradient id="chartGlow" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#F2A93B" stop-opacity="0.3"/>
                                        <stop offset="100%" stop-color="#F2A93B" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                                <!-- Grid Lines -->
                                <line x1="0" y1="30" x2="320" y2="30" stroke="#1F8A70" stroke-opacity="0.15" stroke-dasharray="3 3"/>
                                <line x1="0" y1="70" x2="320" y2="70" stroke="#1F8A70" stroke-opacity="0.15" stroke-dasharray="3 3"/>
                                <line x1="0" y1="110" x2="320" y2="110" stroke="#1F8A70" stroke-opacity="0.15" stroke-dasharray="3 3"/>

                                <!-- Gradient Fill Area -->
                                <path d="M 0 100 Q 60 90, 110 65 T 210 50 T 320 15 L 320 120 L 0 120 Z" fill="url(#chartGlow)"/>

                                <!-- Main Chart Path (drawn with CSS/GSAP) -->
                                <path 
                                    class="chart-line" 
                                    d="M 0 100 Q 60 90, 110 65 T 210 50 T 320 15" 
                                    stroke="#F2A93B" 
                                    stroke-width="3.5" 
                                    stroke-linecap="round"
                                />

                                <!-- Coordinate Dots -->
                                <circle cx="110" cy="65" r="5" fill="#0B1F1A" stroke="#F2A93B" stroke-width="2.5"/>
                                <circle cx="210" cy="50" r="5" fill="#0B1F1A" stroke="#CFF5E7" stroke-width="2.5"/>
                                <circle cx="320" cy="15" r="6" fill="#F2A93B" stroke="#F7F3EA" stroke-width="2.5"/>
                            </svg>
                        </div>

                        <!-- Card Bottom Mini Pills -->
                        <div class="grid grid-cols-2 gap-3 pt-4 border-t border-emerald/20 text-xs">
                            <div class="p-2.5 rounded-xl bg-ink/50 border border-emerald/20">
                                <span class="text-sand/60 block text-[10px]">RISK FACTOR</span>
                                <span class="font-semibold text-cream">Balanced</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-ink/50 border border-emerald/20">
                                <span class="text-sand/60 block text-[10px]">REBALANCING</span>
                                <span class="font-semibold text-mint">Automated</span>
                            </div>
                        </div>
                    </div>

                    <!-- Mini Floating Auxiliary Badge -->
                    <div class="absolute -bottom-6 -left-6 rounded-2xl p-4 bg-ink/90 backdrop-blur-md border border-emerald/40 text-cream shadow-xl hidden sm:flex items-center gap-3 animate-bounce" style="animation-duration: 4s;">
                        <div class="w-8 h-8 rounded-full bg-emerald/30 flex items-center justify-center text-mint font-bold text-xs">
                            ✓
                        </div>
                        <div>
                            <span class="text-xs font-semibold block">AMFI Registered</span>
                            <span class="text-[10px] text-sand/60">ARN-149176 &bull; SIF 82228</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
