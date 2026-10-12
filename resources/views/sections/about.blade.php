@php
    $about = config('fincun.home.about');
@endphp

<section id="about" class="relative py-20 sm:py-28 bg-gradient-to-b from-white via-ice-cyan/15 to-white overflow-hidden">
    <!-- Ambient Radial Glows -->
    <div class="absolute top-1/4 -left-32 w-96 h-96 rounded-full bg-powder-blue/25 blur-[120px] pointer-events-none animate-pulse-subtle"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 rounded-full bg-ice-cyan/40 blur-[130px] pointer-events-none animate-pulse-subtle" style="animation-delay: 2s;"></div>

    <div class="container-x relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Column: Interactive 3D Growth Dashboard Showcase (5 cols) -->
            <div class="lg:col-span-5 relative" data-reveal="right">
                <div class="relative mx-auto max-w-md" data-tilt>
                    
                    <!-- Main Card Container with Depth Gradient & Sheen -->
                    <div class="relative rounded-[2.5rem] bg-gradient-to-br from-ink via-forest to-emerald/35 p-2 sm:p-2.5 border-2 border-powder-blue/30 shadow-[0_30px_90px_-20px_rgba(15,23,42,0.35)] group transition-all duration-500 hover:shadow-[0_40px_100px_-15px_rgba(27,54,118,0.3)]">
                        
                        <!-- Inner Canvas Wrapper -->
                        <div class="relative rounded-[2.2rem] overflow-hidden aspect-[4/5] flex flex-col justify-between p-6 sm:p-7 bg-[#0D1C44]/95 backdrop-blur-md">
                            
                            <!-- Background Vector Illustration -->
                            <img 
                                src="{{ asset($about['image']) }}" 
                                alt="{{ $about['image_alt'] }}" 
                                width="600" 
                                height="500" 
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-90"
                                loading="lazy"
                            >
                            
                            <!-- Gradient Fog Wash for Readability -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0D1C44] via-transparent to-[#0D1C44]/40 pointer-events-none"></div>

                            <!-- Top Floating Badge: Alpha Benchmark (Animated Float) -->
                            <div class="relative z-10 self-start animate-float">
                                <div class="px-4 py-3 rounded-2xl bg-[#0D1C44]/90 backdrop-blur-xl border border-powder-blue/40 shadow-xl flex items-center gap-3 transition-transform duration-300 group-hover:translate-x-1">
                                    <div class="w-9 h-9 rounded-xl bg-ice-cyan/20 border border-turquoise/50 flex items-center justify-center text-mint shrink-0 shadow-inner">
                                        <svg class="w-5 h-5 text-turquoise" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold tracking-wider uppercase text-turquoise block">{{ $about['visual']['card_top_tag'] }}</span>
                                        <span class="font-display font-bold text-sm text-white block">{{ $about['visual']['card_top_val'] }}</span>
                                        <span class="text-[10px] text-sand/70 block">{{ $about['visual']['card_top_sub'] }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Middle/Bottom Floating Badge: 100% Unbiased (Delayed Animated Float) -->
                            <div class="relative z-10 self-end animate-float-delayed mt-auto mb-3">
                                <div class="px-4 py-3 rounded-2xl bg-[#132658]/95 backdrop-blur-xl border border-turquoise/40 shadow-xl flex items-center gap-3 transition-transform duration-300 group-hover:-translate-x-1">
                                    <div class="relative flex items-center justify-center w-3 h-3">
                                        <span class="absolute inline-flex h-full w-full rounded-full bg-saffron opacity-75 animate-ping"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-saffron"></span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold tracking-wider uppercase text-saffron block">{{ $about['visual']['card_bot_tag'] }}</span>
                                        <span class="font-display font-semibold text-xs sm:text-sm text-white block">{{ $about['visual']['card_bot_title'] }}</span>
                                        <span class="text-[10px] text-mint/80 block">{{ $about['visual']['card_bot_sub'] }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Quote Banner with Luminous Highlight -->
                            <div class="relative z-10 pt-2">
                                <div class="p-3.5 sm:p-4 rounded-2xl bg-[#0D1C44]/95 backdrop-blur-xl border border-turquoise/30 text-center shadow-lg group-hover:border-turquoise/60 transition-colors">
                                    <p class="font-display italic text-xs sm:text-sm text-ice-cyan font-medium leading-relaxed">
                                        &ldquo;{{ $about['quote'] }}&rdquo;
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Interactive Rotating Fiduciary Stamp Badge -->
                    <div class="absolute -top-6 -right-6 sm:-top-8 sm:-right-8 w-28 h-28 sm:w-32 sm:h-32 rounded-full bg-emerald text-white p-1.5 shadow-[0_15px_35px_rgba(27,54,118,0.4)] flex items-center justify-center border-4 border-white transition-all duration-500 hover:scale-110 cursor-pointer group/stamp z-20">
                        <svg class="w-full h-full animate-spin-slow group-hover/stamp:[animation-duration:12s]" viewBox="0 0 100 100">
                            <defs>
                                <path id="aboutTextCircle" d="M 50, 50 m -35, 0 a 35,35 0 1,1 70,0 a 35,35 0 1,1 -70,0" />
                            </defs>
                            <text font-size="8.5" font-family="'Manrope', sans-serif" font-weight="800" letter-spacing="2.2" fill="#FFFFFF">
                                <textPath href="#aboutTextCircle">
                                    {{ $about['visual']['stamp_text'] }}
                                </textPath>
                            </text>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <img src="{{ asset('images/dacfin-badge.svg') }}" class="w-9 h-9 rounded-full object-contain shadow-md ring-2 ring-white/50" alt="DACFIN Official Seal">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column: Narrative + Mission/Vision Bento Grid + Credentials (7 cols) -->
            <div class="lg:col-span-7 space-y-7">
                
                <!-- Eyebrow Pill with Pulsing Indicator -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-ice-cyan border border-turquoise/50 text-xs font-bold uppercase tracking-wider text-emerald shadow-xs" data-reveal="up">
                    <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                    <span>{{ $about['eyebrow'] }}</span>
                </div>

                <!-- Main Display Heading with Interactive Scroll-Bold Effect -->
                <h2 class="h-display text-3xl sm:text-4xl md:text-5xl lg:text-[3.15rem] font-extrabold leading-[1.15] text-ink will-change-transform" data-about-heading>
                    Architecting Purpose-Driven <br class="hidden sm:inline">
                    Wealth &amp; Long<span class="inline-flex items-center justify-center mx-1.5 align-middle"><span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-saffron shadow-xs inline-block"></span></span>Term Clarity
                </h2>

                <!-- Narrative Paragraphs with Accent Indicator -->
                <div class="space-y-4 text-slate text-base sm:text-lg leading-relaxed pt-1" data-reveal="up">
                    @foreach($about['paragraphs'] as $para)
                        <p class="relative pl-4 border-l-2 border-turquoise/50 hover:border-emerald transition-colors">
                            {{ $para }}
                        </p>
                    @endforeach
                </div>

                <!-- Mission & Vision Bento Cards with Tilt and Micro-Hover -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2" data-stagger>
                    
                    <!-- Mission Card -->
                    <div class="group p-6 rounded-3xl bg-white/95 border border-powder-blue/60 hover:border-emerald shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden" data-tilt>
                        <!-- Ambient Glow on Hover -->
                        <div class="absolute -top-12 -right-12 w-28 h-28 bg-ice-cyan/60 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>

                        <div class="space-y-3 relative z-10">
                            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-ice-cyan to-turquoise/30 border border-turquoise/50 text-emerald flex items-center justify-center font-bold text-sm shadow-xs group-hover:scale-110 group-hover:bg-emerald group-hover:text-white transition-all duration-300">
                                01
                            </div>
                            <h4 class="font-display font-bold text-lg text-ink group-hover:text-emerald transition-colors">
                                {{ $about['mission'][0] }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate/85 leading-relaxed">
                                {{ $about['mission'][1] }}
                            </p>
                        </div>
                        <div class="absolute bottom-0 inset-x-6 h-[2px] bg-gradient-to-r from-transparent via-emerald/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <!-- Vision Card -->
                    <div class="group p-6 rounded-3xl bg-white/95 border border-powder-blue/60 hover:border-saffron shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden" data-tilt>
                        <!-- Ambient Glow on Hover -->
                        <div class="absolute -top-12 -right-12 w-28 h-28 bg-powder-blue/40 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>

                        <div class="space-y-3 relative z-10">
                            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-ice-cyan to-saffron/20 border border-saffron/40 text-saffron flex items-center justify-center font-bold text-sm shadow-xs group-hover:scale-110 group-hover:bg-saffron group-hover:text-white transition-all duration-300">
                                02
                            </div>
                            <h4 class="font-display font-bold text-lg text-ink group-hover:text-saffron transition-colors">
                                {{ $about['vision'][0] }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate/85 leading-relaxed">
                                {{ $about['vision'][1] }}
                            </p>
                        </div>
                        <div class="absolute bottom-0 inset-x-6 h-[2px] bg-gradient-to-r from-transparent via-saffron/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                </div>

                <!-- Trust Chips Ribbon -->
                @if(!empty($about['trust_chips']))
                    <div class="flex flex-wrap items-center gap-2.5 pt-1">
                        @foreach($about['trust_chips'] as $chip)
                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/80 border border-powder-blue/50 text-xs font-semibold text-ink/80 shadow-xs hover:border-emerald hover:bg-ice-cyan/30 transition-all">
                                <x-ui.icon :name="$chip['icon']" class="w-3.5 h-3.5 text-emerald shrink-0" />
                                <span>{{ $chip['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Call to Action Buttons -->
                <div class="pt-3 flex flex-wrap items-center gap-4">
                    <x-ui.button :href="url($about['cta_primary'][1])" variant="primary" class="text-xs px-6 py-3 shadow-md shadow-saffron/20">
                        {{ $about['cta_primary'][0] }}
                    </x-ui.button>
                    <x-ui.button :href="url($about['cta_secondary'][1])" variant="ghost" class="text-xs px-5 py-3">
                        {{ $about['cta_secondary'][0] }}
                    </x-ui.button>
                </div>

            </div>

        </div>
    </div>
</section>

