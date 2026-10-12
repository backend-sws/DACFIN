@php
    $catalog = config('fincun.home.catalog');
    $tabs = $catalog['tabs'] ?? ['All Services', 'Financial Planning', 'Investment Advise', 'Wealth Management', 'Loans & NPS'];
    $items = $catalog['items'] ?? [];
@endphp

<section id="offerings-catalog" class="relative py-20 sm:py-28 bg-gradient-to-b from-white via-cream to-white overflow-hidden" x-data="{ 
    activeTab: 'All Services'
}">
    <!-- Ambient Gradient Highlights -->
    <div class="absolute top-1/3 -right-32 w-96 h-96 rounded-full bg-ice-cyan/40 blur-[130px] pointer-events-none"></div>
    <div class="absolute bottom-10 -left-32 w-96 h-96 rounded-full bg-powder-blue/25 blur-[120px] pointer-events-none"></div>

    <div class="container-x relative z-10 space-y-10 sm:space-y-12">
        
        <!-- Header Row with Eyebrow, Title, Subtitle, and SVG Finance Character in front of text -->
        <div class="space-y-8 pb-8 border-b border-powder-blue/40" data-reveal="up">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left: Eyebrow, Title, Subtitle & Value Chips (7 cols) -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-ice-cyan border border-turquoise/50 text-[11px] font-bold uppercase tracking-wider text-emerald">
                        <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                        <span>{{ $catalog['eyebrow'] ?? 'Offerings Catalog' }}</span>
                    </div>

                    <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink leading-[1.14]">
                        {{ $catalog['title'] ?? 'Explore Tailored Financial Solutions' }}
                    </h2>

                    @if(!empty($catalog['subtitle']))
                        <p class="text-sm sm:text-base text-slate/85 leading-relaxed pt-1 max-w-xl">
                            {{ $catalog['subtitle'] }}
                        </p>
                    @endif

                    <!-- Trust Pillars / Fiduciary Chips -->
                    <div class="pt-2 flex flex-wrap items-center gap-2.5">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald/10 border border-emerald/25 text-xs font-semibold text-emerald">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald"></span>
                            AMFI Registered Fiduciary
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-saffron/10 border border-saffron/30 text-xs font-semibold text-saffron">
                            <span class="w-1.5 h-1.5 rounded-full bg-saffron"></span>
                            Zero Bias Wealth Architecture
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-turquoise/10 border border-turquoise/30 text-xs font-semibold text-turquoise">
                            <span class="w-1.5 h-1.5 rounded-full bg-turquoise"></span>
                            Institutional Systematic SIPs
                        </span>
                    </div>
                </div>

                <!-- Right (In Front of Text): User Financial Growth Illustration (5 cols) -->
                <div class="lg:col-span-5 flex justify-center lg:justify-end">
                    <div class="relative group w-full max-w-[480px] transition-all duration-300 hover:scale-[1.02]" data-tilt>
                        <!-- Ambient Multi-color Soft Glow -->
                        <div class="absolute -inset-2 bg-gradient-to-r from-ice-cyan/60 via-powder-blue/40 to-saffron/30 rounded-[2.5rem] blur-2xl opacity-75 group-hover:opacity-100 transition-opacity pointer-events-none"></div>

                        <!-- Card Shell with Soft Light Glass Backdrop matching Catalog Theme -->
                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl border border-powder-blue/60 bg-gradient-to-br from-white/95 via-ice-cyan/30 to-white/90 p-5 sm:p-7 backdrop-blur-xl">
                            
                            <!-- Floating Metric Chip (Top Right) -->
                            <div class="absolute top-4 right-4 z-10 flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/95 border border-emerald/30 shadow-sm backdrop-blur-md">
                                <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald">+28.4% CAGR</span>
                            </div>

                            <!-- Floating SIP Badge (Bottom Left) -->
                            <div class="absolute bottom-4 left-4 z-10 hidden sm:flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/95 border border-powder-blue/80 shadow-sm backdrop-blur-md">
                                <span class="text-saffron text-xs font-bold">₹</span>
                                <span class="text-[10px] font-bold text-ink">Systematic Wealth</span>
                            </div>

                            <img 
                                src="{{ asset('images/financial-growth-chart.png') }}" 
                                alt="Financial Wealth Growth & Systematic Investing" 
                                width="512" 
                                height="320" 
                                class="w-full h-auto object-contain block group-hover:scale-105 transition-transform duration-500 drop-shadow-sm"
                            >
                        </div>
                    </div>
                </div>

            </div>

            <!-- Filter Tabs Pills with Item Counts -->
            <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate/70">Filter By Track:</span>
                </div>

                <div class="flex flex-wrap items-center gap-2">
                    @foreach($tabs as $tab)
                        @php
                            $cnt = ($tab === 'All Services') ? count($items) : count(array_filter($items, fn($i) => ($i['category'] ?? '') === $tab));
                        @endphp
                        <button
                            type="button"
                            @click="activeTab = '{{ $tab }}'"
                            class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold tracking-wide transition-all duration-200 focus:outline-none flex items-center gap-1.5"
                            :class="activeTab === '{{ $tab }}' 
                                ? 'bg-emerald text-white shadow-md ring-2 ring-turquoise/40 scale-[1.02]' 
                                : 'bg-white/90 hover:bg-ice-cyan/60 border border-powder-blue/50 text-slate hover:text-ink'"
                        >
                            <span>{{ $tab }}</span>
                            <span 
                                class="text-[10px] px-1.5 py-0.5 rounded-full font-mono font-bold transition-colors"
                                :class="activeTab === '{{ $tab }}' ? 'bg-saffron text-white' : 'bg-powder-blue/40 text-slate/80'"
                            >
                                {{ $cnt }}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>        <!-- 6 Bento Offering Cards Grid (Compact & Perfectly Proportioned) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @foreach($items as $item)
                <div 
                    class="group rounded-2xl sm:rounded-3xl bg-white border border-powder-blue/60 hover:border-emerald p-5 sm:p-5.5 flex flex-col justify-between shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden"
                    x-show="activeTab === 'All Services' || activeTab === '{{ $item['category'] }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    data-tilt
                >
                    <!-- Top Visual Image Container with Theme Gradient & Badges -->
                    <div>
                        <div class="w-full h-32 sm:h-36 rounded-xl sm:rounded-2xl bg-gradient-to-br from-[#0D1C44] via-[#132658] to-[#1B3676]/40 border border-powder-blue/40 overflow-hidden relative flex items-center justify-center p-3 shadow-inner group-hover:border-turquoise/60 transition-colors">
                            <img 
                                src="{{ asset($item['image']) }}" 
                                alt="{{ $item['title'] }}"
                                width="360" 
                                height="180" 
                                class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500 opacity-95"
                                loading="lazy"
                            >
                            
                            <!-- Category Badge -->
                            <span class="absolute top-2.5 left-2.5 px-2.5 py-0.5 rounded-full bg-[#0D1C44]/90 backdrop-blur-md text-turquoise border border-turquoise/40 text-[9px] uppercase font-bold tracking-wider">
                                {{ $item['category'] }}
                            </span>
                            
                            <!-- Value Tag -->
                            <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-full bg-saffron text-white text-[9px] font-bold tracking-wide shadow-xs">
                                {{ $item['tag'] }}
                            </span>
                        </div>

                        <!-- Card Header & Description -->
                        <div class="pt-3.5 space-y-1.5">
                            <h3 class="font-display font-bold text-base sm:text-lg text-ink group-hover:text-emerald transition-colors leading-snug">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-xs sm:text-[13px] text-slate/80 leading-relaxed line-clamp-2">
                                {{ $item['desc'] }}
                            </p>
                        </div>

                        <!-- 2 Compact Feature Highlights Chips -->
                        @if(!empty($item['highlights']))
                            <div class="pt-3 flex flex-wrap gap-1.5">
                                @foreach(array_slice($item['highlights'], 0, 2) as $hl)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-ice-cyan/60 border border-turquoise/25 text-[11px] font-medium text-slate/90">
                                        <span class="text-emerald text-[10px] font-bold">✓</span>
                                        <span class="truncate max-w-[210px]">{{ $hl }}</span>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Bottom Row: Metric + Action Button -->
                    <div class="pt-3.5 border-t border-powder-blue/40 mt-3.5 flex items-center justify-between">
                        <div>
                            <span class="block text-sm sm:text-base font-extrabold font-display text-ink group-hover:text-emerald transition-colors">{{ $item['metric'] }}</span>
                            <span class="text-[9px] text-slate/70 uppercase tracking-wider font-medium">{{ $item['metric_label'] }}</span>
                        </div>

                        <a 
                            href="{{ url($item['url']) }}" 
                            class="px-3.5 py-1.5 rounded-full bg-emerald hover:bg-saffron text-white text-xs font-bold tracking-wide transition-all shadow-xs group-hover:shadow-md flex items-center gap-1.5 hover:gap-2"
                        >
                            <span>Explore</span>
                            <svg class="w-3.5 h-3.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Premium Bottom Assistance Banner -->
        <div class="rounded-3xl bg-gradient-to-r from-ice-cyan/60 via-white to-powder-blue/40 border border-turquoise/40 p-6 sm:p-7 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald text-white flex items-center justify-center shrink-0 shadow-md">
                    <x-ui.icon name="shield" class="w-6 h-6 text-turquoise" />
                </div>
                <div class="space-y-0.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-emerald">AMFI Registered Advisory Team Active</span>
                    </div>
                    <p class="text-xs sm:text-sm text-ink font-semibold">
                        Need a custom multi-asset portfolio? Speak directly with an AMFI registered fiduciary specialist.
                    </p>
                </div>
            </div>

            <a 
                href="{{ route('contact') }}" 
                class="shrink-0 px-6 py-3 rounded-full bg-saffron hover:bg-emerald text-white text-xs sm:text-sm font-bold tracking-wide transition-all shadow-md shadow-saffron/20 hover:shadow-lg hover:shadow-emerald/25 hover:-translate-y-0.5 flex items-center gap-2"
            >
                <span>Book Advisory Session</span>
                <span>&rarr;</span>
            </a>
        </div>

    </div>
</section>

