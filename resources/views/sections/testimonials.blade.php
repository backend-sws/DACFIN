@php
    $testimonials = config('fincun.home.testimonials') ?? [
        'eyebrow' => 'Verified Experiences',
        'title' => 'Satisfied Clients Speak',
        'items' => [],
        'cta' => ['See More Stories', '/wealth-journal'],
    ];
    $items = $testimonials['items'] ?? [];
    $featured = $items[0] ?? [
        'name' => 'Bikesh Ojha',
        'role' => 'Business Owner, Patna',
        'rating' => 5,
        'text' => 'Experienced leadership with round the clock advisory. Within a few days, I found my family portfolio streamlined and aligned with our 10-year enterprise vision. Truly fiduciary care.',
        'avatar' => '/images/team/bikesh.svg',
    ];
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-10 sm:space-y-14">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3" data-reveal="up">
            <span class="text-xs uppercase font-bold tracking-widest text-emerald">
                {{ $testimonials['eyebrow'] ?? 'Verified Experiences' }}
            </span>
            <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink">
                {{ $testimonials['title'] ?? 'Satisfied Clients Speak' }}
            </h2>
        </div>

        <!-- Wireframe 2-Column Layout (Left: Layered Cards, Right: Testimonial Card) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left: Overlapping Layered Visual Cards -->
            <div class="lg:col-span-6 relative flex items-center justify-center min-h-[300px] sm:min-h-[360px]" data-reveal="right">
                <!-- Back Card (Layered Offset) -->
                <div class="absolute w-56 sm:w-72 aspect-[4/5] rounded-3xl bg-sand/50 border border-sand shadow-md -rotate-6 -translate-x-6 sm:-translate-x-10 p-5 flex flex-col justify-between overflow-hidden">
                    <span class="text-[11px] font-mono text-slate">Case Study: Enterprise SIP</span>
                    <div class="w-full h-24 rounded-2xl bg-forest/20 flex items-center justify-center text-emerald font-bold">
                        10-Year Horizon
                    </div>
                    <span class="text-xs font-bold text-ink">Verified Client</span>
                </div>

                <!-- Front Card -->
                <div class="relative w-64 sm:w-80 aspect-[4/5] rounded-3xl bg-white border border-emerald/30 shadow-2xl rotate-2 p-6 flex flex-col justify-between overflow-hidden z-10" data-tilt>
                    <div class="flex items-center justify-between pb-3 border-b border-sand/40">
                        <span class="px-2.5 py-1 rounded-full bg-mint/50 text-ink text-[10px] font-bold uppercase tracking-wider">
                            Verified Review
                        </span>
                        <div class="flex text-saffron text-xs">
                            ★★★★★
                        </div>
                    </div>

                    <div class="space-y-3 my-auto">
                        <div class="w-14 h-14 rounded-2xl bg-forest text-mint flex items-center justify-center font-display font-bold text-lg shadow-inner">
                            FIN
                        </div>
                        <h4 class="font-display font-bold text-lg text-ink">
                            Independent Fiduciary Advisory
                        </h4>
                        <p class="text-xs text-slate leading-relaxed">
                            Zero proprietary quotas. Every recommendation backed by SEBI & AMFI code of conduct.
                        </p>
                    </div>

                    <div class="pt-3 border-t border-sand/40 flex items-center justify-between text-xs text-slate">
                        <span>Patna &amp; Ranchi</span>
                        <span class="font-bold text-emerald">100% Alignment</span>
                    </div>
                </div>
            </div>

            <!-- Right: Testimonial Card with Stars, Quote, and Action Pill -->
            <div class="lg:col-span-6 space-y-6" data-reveal="left">
                <div class="rounded-3xl bg-white border border-sand/60 p-7 sm:p-10 shadow-lg space-y-6 relative">
                    <!-- Client Avatar + Name + Rating -->
                    <div class="flex items-center gap-4 pb-4 border-b border-sand/40">
                        <img 
                            src="{{ $featured['avatar'] ?? '/images/team/bikesh.svg' }}" 
                            alt="{{ $featured['name'] }}"
                            class="w-14 h-14 rounded-full object-cover border-2 border-sand shadow-sm"
                        >
                        <div class="space-y-1">
                            <h3 class="font-display font-bold text-base sm:text-lg text-ink">
                                {{ $featured['name'] }}
                            </h3>
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-slate">{{ $featured['role'] }}</span>
                                <span class="text-sand/70">•</span>
                                <div class="flex text-saffron text-xs">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Quote -->
                    <blockquote class="text-slate text-sm sm:text-base leading-relaxed italic">
                        &ldquo;{{ $featured['text'] }}&rdquo;
                    </blockquote>

                    <!-- Bottom Action Pill Button from Wireframe -->
                    <div class="pt-2">
                        <a 
                            href="{{ $testimonials['cta'][1] ?? '/wealth-journal' }}" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3 rounded-full bg-ink hover:bg-forest text-cream text-xs sm:text-sm font-semibold transition-all hover:scale-[1.02] shadow-md group"
                        >
                            <span>{{ $testimonials['cta'][0] ?? 'See More Stories' }}</span>
                            <svg class="w-4 h-4 text-saffron transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
