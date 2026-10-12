@php
    $testimonials = config('fincun.home.testimonials') ?? [
        'eyebrow' => 'Verified Experiences',
        'title' => 'Satisfied Clients Speak',
        'items' => [],
        'cta' => ['See More Stories', '/wealth-journal'],
    ];
    $items = $testimonials['items'] ?? [];
@endphp

<section 
    id="testimonials"
    class="section-y bg-cream relative overflow-hidden" 
    x-data="{ 
        activeIdx: 0, 
        total: {{ count($items) }}, 
        items: {{ Js::from($items) }},
        paused: false,
        timer: null,
        init() {
            this.timer = setInterval(() => {
                if (!this.paused && this.total > 1) {
                    this.next();
                }
            }, 6500);
        },
        next() {
            this.activeIdx = (this.activeIdx + 1) % this.total;
        },
        prev() {
            this.activeIdx = (this.activeIdx - 1 + this.total) % this.total;
        },
        select(idx) {
            this.activeIdx = idx;
        }
    }"
    @mouseenter="paused = true"
    @mouseleave="paused = false"
    data-testimonials-section
>
    <div class="container-x space-y-10 sm:space-y-14">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3" data-testimonials-header>
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-ice-cyan border border-turquoise/50 text-xs font-bold uppercase tracking-wider text-emerald shadow-xs">
                <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                <span>{{ $testimonials['eyebrow'] ?? 'Verified Experiences' }}</span>
            </div>
            <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink flex items-center justify-center gap-2 flex-wrap">
                <span>Satisfied Clients</span>
                <span class="inline-flex items-center justify-center align-middle mx-1"><span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-saffron shadow-xs inline-block"></span></span>
                <span>Speak</span>
            </h2>
            <p class="text-slate text-sm sm:text-base leading-relaxed">
                Real stories of financial clarity from enterprise owners, medical consultants, and executives across Patna and Ranchi.
            </p>
        </div>

        <!-- Wireframe 2-Column Layout (Left: 3D Layered Deck, Right: Testimonial Cards Carousel / Tabs) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left: Overlapping Layered Visual Cards with 3D Deck Physics -->
            <div class="lg:col-span-5 relative flex items-center justify-center min-h-[350px] sm:min-h-[420px] group/deck" data-testimonial-deck>
                
                <!-- Ambient Radial Glow behind deck -->
                <div class="absolute w-72 h-72 rounded-full bg-ice-cyan/40 blur-3xl pointer-events-none -z-10 group-hover/deck:scale-125 transition-transform duration-700"></div>

                <!-- Back Card (Dynamic Case Study Data) -->
                <div class="absolute" data-deck-back>
                    <div class="w-52 max-w-[72vw] sm:w-72 aspect-[4/5] rounded-3xl bg-sand/40 backdrop-blur-md border border-sand shadow-lg p-4 sm:p-5 flex flex-col justify-between overflow-hidden transition-all duration-500 ease-out -rotate-6 -translate-x-3 sm:-translate-x-10 group-hover/deck:-rotate-12 group-hover/deck:-translate-x-6 sm:group-hover/deck:-translate-x-16 group-hover/deck:scale-102">
                        <div class="flex items-center justify-between pb-2 border-b border-sand/40">
                            <span class="text-[11px] font-mono text-slate font-semibold truncate max-w-[180px]" x-text="items[activeIdx]?.case_title || 'Case Study: Enterprise SIP'"></span>
                            <span class="w-2 h-2 rounded-full bg-emerald shrink-0"></span>
                        </div>
                        <div class="w-full py-4 rounded-2xl bg-forest/20 flex flex-col items-center justify-center text-emerald font-bold p-2 text-center border border-emerald/20 shadow-inner">
                            <span class="text-xl sm:text-2xl text-ink font-display font-extrabold transition-all" x-text="items[activeIdx]?.case_metric || '+18.4% Alpha'"></span>
                            <span class="text-[11px] text-slate font-medium transition-all" x-text="items[activeIdx]?.case_sub || '10-Year Compounded Wealth'"></span>
                        </div>
                        <div class="flex items-center justify-between text-xs text-ink font-semibold pt-2 border-t border-sand/40">
                            <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald"></span> <span x-text="items[activeIdx]?.case_tag || 'Patna Hub'"></span></span>
                            <span class="text-emerald font-bold">Verified AUM</span>
                        </div>
                    </div>
                </div>

                <!-- Front Card Deck Stack (Swaps in Card Style with x-transition) -->
                <div class="relative z-10 grid grid-cols-1 grid-rows-1" data-deck-front>
                    @foreach($items as $idx => $t)
                        <div 
                            x-show="activeIdx === {{ $idx }}"
                            x-transition:enter="transition ease-out duration-350"
                            x-transition:enter-start="opacity-0 scale-90 -rotate-4 -translate-x-4"
                            x-transition:enter-end="opacity-100 scale-100 rotate-2 translate-x-0"
                            x-transition:leave="transition ease-in duration-200 pointer-events-none"
                            x-transition:leave-start="opacity-100 scale-100 rotate-2 translate-x-0"
                            x-transition:leave-end="opacity-0 scale-90 rotate-4 translate-x-4"
                            class="col-start-1 row-start-1 w-60 max-w-[80vw] sm:w-80 aspect-[4/5] rounded-3xl bg-white/95 backdrop-blur-xl border border-emerald/30 shadow-2xl rotate-2 p-5 sm:p-6 flex flex-col justify-between overflow-hidden transition-all duration-500 ease-out group-hover/deck:rotate-4 group-hover/deck:translate-x-3 sm:group-hover/deck:translate-x-4 group-hover/deck:scale-103 hover:shadow-[0_25px_50px_-12px_rgba(10,127,150,0.25)]" 
                            data-tilt
                        >
                            <!-- Top Shimmer Line -->
                            <div class="absolute inset-x-6 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-saffron/60 to-transparent pointer-events-none"></div>

                            <div class="flex items-center justify-between pb-3 border-b border-sand/40">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-mint/50 border border-emerald/20 text-ink text-[10px] font-bold uppercase tracking-wider">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald"></span>
                                    </span>
                                    {{ $t['card_badge'] ?? 'Verified Review' }}
                                </span>
                                <div class="flex text-amber-400 text-xs gap-0.5">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                            </div>

                            <div class="space-y-3 my-auto">
                                <div class="w-14 h-14 rounded-2xl bg-forest text-mint flex items-center justify-center font-display font-bold text-lg shadow-inner border border-emerald/30 group-hover/deck:scale-110 group-hover/deck:bg-saffron group-hover/deck:text-ink transition-all duration-300">
                                    FIN
                                </div>
                                <h4 class="font-display font-bold text-base sm:text-lg text-ink">
                                    {{ $t['card_heading'] ?? 'Independent Fiduciary Advisory' }}
                                </h4>
                                <p class="text-xs text-slate leading-relaxed">
                                    {{ $t['card_desc'] ?? 'Zero proprietary quotas. Every recommendation backed by SEBI & AMFI code of conduct.' }}
                                </p>
                            </div>

                            <div class="pt-3 border-t border-sand/40 flex items-center justify-between text-xs text-slate">
                                <span class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-saffron"></span>
                                    {{ $t['card_location'] ?? 'Patna & Ranchi' }}
                                </span>
                                <span class="font-bold text-emerald">{{ $t['card_metric'] ?? '100% Alignment' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Interactive Testimonial Cards & Controls -->
            <div class="lg:col-span-7 space-y-6" data-testimonial-content>
                <!-- Top Bar: Pills Selector + Arrows Navigation -->
                <div class="flex items-center justify-between gap-3 flex-wrap sm:flex-nowrap">
                    <!-- Client Selector Pills (Native scrollbar 100% hidden) -->
                    <div class="flex items-center gap-2 overflow-x-auto py-1.5 scrollbar-none flex-nowrap shrink-0 max-w-[calc(100%-80px)]">
                        @foreach($items as $idx => $t)
                            <button 
                                type="button" 
                                @click="select({{ $idx }})"
                                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wide transition-all duration-300 border cursor-pointer select-none relative overflow-hidden shrink-0"
                                :class="activeIdx === {{ $idx }} 
                                    ? 'bg-ink text-cream border-ink shadow-md scale-102 ring-2 ring-saffron/30' 
                                    : 'bg-white text-slate border-sand/60 hover:border-emerald/40 hover:text-ink hover:bg-ice-cyan/20'"
                            >
                                <span class="relative z-10">{{ $t['name'] }}</span>
                            </button>
                        @endforeach
                    </div>

                    <!-- Next / Prev Controls -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <button 
                            type="button" 
                            @click="prev()" 
                            class="w-8 h-8 rounded-full border border-sand/60 bg-white hover:bg-ink hover:text-white hover:border-ink text-slate flex items-center justify-center text-xs transition-all duration-200 cursor-pointer shadow-xs active:scale-95"
                            aria-label="Previous testimonial"
                        >
                            ←
                        </button>
                        <button 
                            type="button" 
                            @click="next()" 
                            class="w-8 h-8 rounded-full border border-sand/60 bg-white hover:bg-ink hover:text-white hover:border-ink text-slate flex items-center justify-center text-xs transition-all duration-200 cursor-pointer shadow-xs active:scale-95"
                            aria-label="Next testimonial"
                        >
                            →
                        </button>
                    </div>
                </div>

                <!-- Active Testimonial Card Display (Grid Overlay Stack - Zero Height Jump) -->
                <div class="grid grid-cols-1 grid-rows-1 relative min-h-[300px]">
                    @foreach($items as $idx => $t)
                        <div 
                            x-show="activeIdx === {{ $idx }}"
                            x-transition:enter="transition ease-out duration-350"
                            x-transition:enter-start="opacity-0 translate-x-6 scale-98"
                            x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                            x-transition:leave="transition ease-in duration-200 pointer-events-none"
                            x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                            x-transition:leave-end="opacity-0 -translate-x-6 scale-98"
                            class="col-start-1 row-start-1 rounded-2xl sm:rounded-3xl bg-white/95 backdrop-blur-xl border border-sand/70 p-5 sm:p-9 shadow-xl shadow-emerald/5 space-y-4 sm:space-y-6 relative overflow-hidden group/card flex flex-col justify-between"
                        >
                            <!-- Large Decorative Watermark Quotation Mark in Background -->
                            <div class="absolute -top-6 right-6 font-serif text-8xl sm:text-9xl text-sand/20 select-none pointer-events-none font-bold leading-none">
                                “
                            </div>

                            <!-- Client Avatar + Name + Rating + Verified Badge -->
                            <div class="flex items-center gap-4 pb-4 border-b border-sand/40 relative z-10">
                                <div class="relative shrink-0">
                                    <img 
                                        src="{{ asset($t['avatar']) }}" 
                                        alt="{{ $t['name'] }}"
                                        class="w-14 h-14 rounded-full object-cover border-2 border-turquoise/50 shadow-sm group-hover/card:scale-105 transition-transform duration-300"
                                    >
                                    <!-- Verified Tick Seal Badge -->
                                    <span class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-emerald text-white text-[10px] flex items-center justify-center shadow-xs">
                                        ✓
                                    </span>
                                </div>
                                <div class="space-y-1 min-w-0">
                                    <h3 class="font-display font-bold text-base sm:text-lg text-ink truncate">
                                        {{ $t['name'] }}
                                    </h3>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="text-xs text-slate font-medium">{{ $t['role'] }}</span>
                                        <span class="text-sand/70">•</span>
                                        <div class="flex text-amber-400 text-xs gap-0.5">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                        <span class="px-2 py-0.5 rounded-full bg-emerald/10 text-emerald text-[10px] font-bold uppercase tracking-wider">
                                            Client Since 2018
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Review Quote with Quotation Accent -->
                            <blockquote class="text-slate text-sm sm:text-base leading-relaxed italic relative z-10 font-normal min-h-[4rem]">
                                &ldquo;{{ $t['text'] }}&rdquo;
                            </blockquote>

                            <!-- Bottom Meta + CTA -->
                            <div class="pt-4 border-t border-sand/30 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 relative z-10 mt-auto">
                                <div class="flex items-center gap-2 text-xs text-slate">
                                    <span class="relative flex h-2 w-2 shrink-0">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald"></span>
                                    </span>
                                    <span class="font-medium">Portfolio Focus: Wealth Compounding &amp; Fiduciary Strategy</span>
                                </div>

                                <a 
                                    href="{{ url($testimonials['cta'][1] ?? '/wealth-journal') }}" 
                                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-ink hover:bg-forest text-cream text-xs font-semibold transition-all hover:scale-[1.02] shadow-sm group/btn cursor-pointer shrink-0"
                                >
                                    <span>{{ $testimonials['cta'][0] ?? 'See More Stories' }}</span>
                                    <svg class="w-3.5 h-3.5 text-saffron transition-transform duration-200 group-hover/btn:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</section>
