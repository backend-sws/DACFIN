@php
    $hero = config('fincun.home.hero_wireframe') ?? [
        'tag' => 'Welcome to FINCUN',
        'title' => 'Find Your Dream Wealth Future With Ease.',
        'text' => 'Discover tailored portfolios, explore structured roadmaps, and connect with trusted AMFI registered advisors in minutes.',
        'primary_cta' => ['Explore Services', '/services/financial-planing'],
        'secondary_cta' => ['Learn More', '/about-us'],
        'badge' => 'AMFI Registered MFD (ARN-149176)',
    ];
@endphp

<section class="relative pt-24 sm:pt-28 pb-8 sm:pb-12 bg-cream overflow-hidden">
    <!-- Ambient Background Lighting -->
    <div class="absolute top-1/4 left-1/4 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-mint/40 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-sand/30 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="container-x">
        <!-- Wireframe Split Hero Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            
            <!-- Left Hero Card (Text, Tag, Headline, Subtitle, 2 CTAs) -->
            <div 
                class="lg:col-span-7 rounded-3xl sm:rounded-[2.5rem] bg-ink text-cream p-7 sm:p-10 lg:p-14 border border-emerald/30 shadow-2xl relative overflow-hidden flex flex-col justify-between space-y-8"
                data-reveal="up"
            >
                <!-- Subtle Radial Glow Behind Content -->
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-emerald/20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-saffron/15 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Top Tag -->
                <div class="relative flex items-center justify-between">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-emerald/30 text-mint text-xs font-semibold tracking-wider">
                        <span class="w-1.5 h-1.5 rounded-full bg-saffron animate-pulse"></span>
                        {{ $hero['tag'] }}
                    </span>
                    <span class="text-[11px] text-sand/60 hidden sm:inline font-mono">ARN-149176</span>
                </div>

                <!-- Main Display Headline -->
                <div class="relative space-y-4">
                    <h1 class="h-display text-3xl sm:text-4xl md:text-5xl xl:text-6xl font-bold text-cream leading-[1.12]" data-split="words">
                        {{ $hero['title'] }}
                    </h1>
                    <p class="text-sand/80 text-sm sm:text-base leading-relaxed max-w-xl">
                        {{ $hero['text'] }}
                    </p>
                </div>

                <!-- Action Buttons (Side by Side) -->
                <div class="relative pt-2 flex flex-wrap items-center gap-3 sm:gap-4">
                    <a 
                        href="{{ $hero['primary_cta'][1] }}" 
                        class="px-6 sm:px-7 py-3 rounded-full bg-saffron text-ink font-semibold text-xs sm:text-sm tracking-wide shadow-lg hover:shadow-saffron/30 hover:scale-[1.03] active:scale-[0.98] transition-all flex items-center gap-2"
                        data-magnetic
                    >
                        <span>{{ $hero['primary_cta'][0] }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <a 
                        href="{{ $hero['secondary_cta'][1] }}" 
                        class="px-6 sm:px-7 py-3 rounded-full bg-white/10 hover:bg-white/20 text-cream border border-white/20 text-xs sm:text-sm font-semibold tracking-wide transition-all hover:scale-[1.02]"
                        data-magnetic
                    >
                        <span>{{ $hero['secondary_cta'][0] }}</span>
                    </a>
                </div>
            </div>

            <!-- Right Hero Card (Large Visual Graphic / Image Container) -->
            <div 
                class="lg:col-span-5 rounded-3xl sm:rounded-[2.5rem] bg-gradient-to-br from-forest/90 via-forest/60 to-ink border border-emerald/30 p-6 sm:p-8 flex flex-col justify-between relative overflow-hidden shadow-xl min-h-[360px] sm:min-h-[420px]"
                data-reveal="left"
            >
                <div class="absolute -right-16 -top-16 w-56 h-56 bg-saffron/15 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Top Badge on Visual Card -->
                <div class="flex items-center justify-between relative z-10">
                    <span class="px-3 py-1 rounded-full bg-forest/90 border border-emerald/30 text-[11px] font-semibold text-sand">
                        Real-Time Portfolio Intelligence
                    </span>
                    <span class="w-8 h-8 rounded-full bg-saffron/20 border border-saffron/40 flex items-center justify-center text-saffron">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </span>
                </div>

                <!-- Center Chart & Visual Illustration -->
                <div class="relative my-auto py-6 flex flex-col items-center justify-center">
                    <div class="w-full max-w-[320px] aspect-[4/3] rounded-2xl bg-ink/70 border border-emerald/25 p-4 flex flex-col justify-between shadow-2xl relative overflow-hidden group">
                        <!-- Chart SVG with animated line -->
                        <div class="flex items-center justify-between pb-2 border-b border-emerald/20 text-xs">
                            <span class="font-bold text-cream">Asset Growth Trajectory</span>
                            <span class="font-mono text-saffron text-xs font-bold">+18.4% p.a.</span>
                        </div>

                        <svg class="w-full h-24 overflow-visible my-2" viewBox="0 0 300 90">
                            <defs>
                                <linearGradient id="chartGradHero" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#00B4D8" stop-opacity="0.35"/>
                                    <stop offset="100%" stop-color="#00B4D8" stop-opacity="0.0"/>
                                </linearGradient>
                            </defs>
                            <path d="M 0 75 Q 60 65, 100 45 T 190 35 T 300 10 L 300 90 L 0 90 Z" fill="url(#chartGradHero)"/>
                            <path class="chart-line" d="M 0 75 Q 60 65, 100 45 T 190 35 T 300 10" fill="none" stroke="#00B4D8" stroke-width="3.5" stroke-linecap="round"/>
                            <circle cx="300" cy="10" r="5" fill="#E0FFFF" stroke="#071922" stroke-width="2" class="animate-ping"/>
                            <circle cx="300" cy="10" r="4" fill="#00B4D8"/>
                        </svg>

                        <div class="flex items-center justify-between text-[11px] text-sand/70 pt-1">
                            <span>Compounded SIP Horizon</span>
                            <span class="font-semibold text-mint">10-Year Target</span>
                        </div>
                    </div>
                </div>

                <!-- Bottom Metrics Strip on Card -->
                <div class="relative z-10 pt-4 border-t border-emerald/20 flex items-center justify-between text-xs">
                    <div>
                        <span class="block text-lg font-bold font-display text-cream">₹500Cr+</span>
                        <span class="text-[10px] text-sand/60 uppercase tracking-wider">AUM Advised</span>
                    </div>
                    <div class="text-right">
                        <span class="block text-lg font-bold font-display text-saffron">100%</span>
                        <span class="text-[10px] text-sand/60 uppercase tracking-wider">Client Aligned</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
