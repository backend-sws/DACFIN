@php
    $spotlight = config('fincun.home.spotlight') ?? [
        'stats' => [
            ['val' => '₹500Cr+', 'label' => 'Total AUM advised with disciplined fiduciary oversight.'],
            ['val' => '15+ Years', 'label' => 'Proven leadership navigating bull and bear market cycles.'],
            ['val' => '100%', 'label' => 'Unbiased advisory standard with zero product quotas.'],
        ],
        'title' => 'Patna & Bihar: The Transformation of Wealth Advisory.',
        'text' => 'For decades, families and enterprises across Bihar were underserved by transactional product pushers. Dacfin Services Private Limited was established to introduce institutional-grade, goal-based wealth planning right to your doorstep in Patna.',
        'cta' => ['Explore Regional Presence', '/about-us'],
        'image' => '/images/about-section.svg',
    ];
    $stats = $spotlight['stats'] ?? [];
@endphp

<section class="section-y bg-cream relative overflow-hidden" data-spotlight-section>
    <div class="container-x space-y-8 sm:space-y-12">
        <div class="text-center max-w-2xl mx-auto space-y-3" data-spotlight-header>
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-ice-cyan border border-turquoise/50 text-xs font-bold uppercase tracking-wider text-emerald shadow-xs will-change-transform" data-spotlight-eyebrow>
                <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                <span>Regional Transformation Story</span>
            </div>
            <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink leading-[1.18] will-change-transform" data-spotlight-title>
                Transforming Wealth <br class="hidden sm:inline">
                Advisory in Eastern India
            </h2>
        </div>

        <!-- Wireframe 3-Column Asymmetric Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch" data-spotlight-grid>
            
            <!-- Left Column: 3 Big Stacked Stats (Slides from Left) -->
            <div class="lg:col-span-4 flex flex-col justify-between space-y-4 sm:space-y-6 will-change-transform" data-spotlight-left>
                @foreach($stats as $st)
                    <div class="group relative p-5 sm:p-6 rounded-2xl sm:rounded-3xl bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] shadow-[0_10px_30px_rgba(15,40,90,0.18)] hover:shadow-[0_18px_45px_rgba(26,63,133,0.35)] hover:-translate-y-0.5 transition-all duration-300 space-y-2 overflow-hidden text-white will-change-transform" data-spotlight-stat>
                        <!-- Metallic Specular Edge Shine -->
                        <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                        <div class="absolute -right-8 -top-8 w-24 h-24 bg-[#3b82f6]/20 rounded-full blur-xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                        <div class="flex items-center justify-between relative z-10">
                            <span class="font-display font-bold text-3xl sm:text-4xl text-white group-hover:text-[#bfdbfe] transition-colors">
                                {{ $st['val'] }}
                            </span>
                            <span class="w-2.5 h-2.5 rounded-full bg-saffron shadow-xs"></span>
                        </div>
                        <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed relative z-10">
                            {{ $st['label'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Center Column: Patna Headquarters Glass Card (Pops in Center) -->
            <div class="lg:col-span-4 rounded-2xl sm:rounded-3xl bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] text-white border border-[#3b82f6]/40 p-5 sm:p-7 flex flex-col justify-between shadow-[0_15px_45px_rgba(21,50,102,0.25)] relative overflow-hidden will-change-transform" data-spotlight-center>
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <div class="absolute -right-16 -top-16 w-56 h-56 bg-[#3b82f6]/25 rounded-full blur-3xl pointer-events-none"></div>

                <div class="space-y-2 relative z-10">
                    <span class="px-3 py-1 rounded-full bg-white/10 text-[#93c5fd] text-[11px] font-semibold tracking-wide border border-white/15">
                        In-Person Headquarters
                    </span>
                    <h3 class="h-display text-xl sm:text-2xl font-bold text-white mt-2">
                        Physical Presence Where You Are
                    </h3>
                </div>

                <!-- Headquarters & Contact Card -->
                <div class="space-y-3.5 my-6 relative z-10">
                    <div class="p-4 rounded-2xl bg-white/10 border border-white/15 hover:border-[#60a5fa]/50 transition-colors">
                        <div class="flex items-center justify-between text-xs font-bold text-[#93c5fd] pb-1">
                            <span>PATNA HEADQUARTERS</span>
                            <span class="text-[10px] font-mono text-[#dbeafe]/80">KANKARBAGH</span>
                        </div>
                        <p class="text-xs text-white/95 leading-relaxed">
                            Shop No 14, Vijay Aman Apartment, Main Road, Near Gravity Mall, Kankarbagh, Patna, Bihar - 800020
                        </p>
                        <div class="flex items-center justify-between pt-1.5 text-[11px] font-mono">
                            <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="text-white hover:underline font-bold">{{ config('fincun.site.phones.0') }}</a>
                            <a href="{{ config('fincun.site.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="text-[#93c5fd] hover:text-white hover:underline font-bold">WhatsApp</a>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white/10 border border-white/15 hover:border-[#60a5fa]/50 transition-colors">
                        <div class="flex items-center justify-between text-xs font-bold text-[#93c5fd] pb-1">
                            <span>DIRECTOR</span>
                            <span class="text-[10px] font-mono text-[#dbeafe]/80">EXECUTIVE DESK</span>
                        </div>
                        <p class="text-xs text-white/95 leading-relaxed font-semibold">
                            Dharmendra Kumar
                        </p>
                        <span class="text-[11px] text-[#dbeafe]/80 font-mono mt-1 block">Founder &amp; Principal Advisor</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-white/15 flex items-center justify-between text-xs text-[#dbeafe]/80 relative z-10">
                    <span>{{ config('fincun.site.brand') }} Advisory</span>
                    <span class="text-[#93c5fd] font-semibold">{{ config('fincun.site.hours') }}</span>
                </div>
            </div>

            <!-- Right Column: Editorial Transformation Story (Slides from Right) -->
            <div class="lg:col-span-4 rounded-2xl sm:rounded-3xl bg-white border border-sand/60 p-5 sm:p-8 flex flex-col justify-between shadow-sm space-y-5 sm:space-y-6 will-change-transform" data-spotlight-right>
                <div class="space-y-4">
                    <span class="text-xs uppercase font-bold tracking-widest text-emerald">Regional Leadership</span>
                    <h3 class="h-display font-bold text-xl sm:text-2xl text-ink leading-snug">
                        {{ $spotlight['title'] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-slate leading-relaxed">
                        {{ $spotlight['text'] }}
                    </p>

                    <div class="space-y-2 pt-2 border-t border-sand/30 text-xs text-slate">
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald"></span>
                            <span>Dedicated relationship managers for HNIs &amp; business owners</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald"></span>
                            <span>Zero hidden commissions or undisclosed expense ratios</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald"></span>
                            <span>Institutional portfolio tools tailored to family offices</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-sand/40">
                    <a 
                        href="{{ url($spotlight['cta'][1] ?? '/about-us') }}"
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
