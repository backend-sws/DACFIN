@php
    $bottomServices = config('fincun.home.bottom_services') ?? [
        'title' => 'Services',
        'cards' => [
            [
                'step' => '01',
                'title' => 'Financial Planning',
                'desc' => 'Holistic roadmaps integrating retirement, tax savings, children education funds, and estate planning.',
                'dark' => true,
                'url' => '/services/financial-planing',
            ],
            [
                'step' => '02',
                'title' => 'Investment Advise',
                'desc' => 'Goal-based SIPs, mutual fund baskets, and smart rebalancing tailored to your target returns.',
                'dark' => false,
                'url' => '/services/investment-advise',
            ],
            [
                'step' => '03',
                'title' => 'Wealth Management',
                'desc' => 'Discretionary portfolio management services (PMS), alternative investments, and private wealth stewardship.',
                'dark' => false,
                'url' => '/services/wealth-management',
            ],
        ],
    ];
    $cards = $bottomServices['cards'] ?? [];
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Section Title from Wireframe -->
        <div class="text-center max-w-xl mx-auto space-y-2" data-reveal="up">
            <span class="text-xs uppercase font-bold tracking-widest text-emerald">Our Advisory Pillars</span>
            <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink">
                {{ $bottomServices['title'] ?? 'Services' }}
            </h2>
        </div>

        <!-- 3 Cards (Card 1: Dark, Cards 2 & 3: Light) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8" data-stagger>
            @foreach($cards as $c)
                @if(!empty($c['dark']))
                    <!-- Dark Inverted Card (01) from Wireframe -->
                    <a 
                        href="{{ $c['url'] }}"
                        class="rounded-[2.5rem] bg-ink text-cream p-7 sm:p-9 lg:p-10 border border-emerald/30 shadow-2xl flex flex-col justify-between space-y-12 relative overflow-hidden group hover:scale-[1.02] transition-all duration-300"
                        data-tilt
                    >
                        <div class="absolute -right-16 -top-16 w-48 h-48 bg-emerald/20 rounded-full blur-3xl pointer-events-none"></div>

                        <!-- Top Step Badge -->
                        <div class="flex items-center justify-between">
                            <span class="w-2.5 h-2.5 rounded-full bg-saffron animate-pulse"></span>
                            <span class="font-display font-bold text-2xl text-cream/90 group-hover:text-saffron transition-colors">
                                {{ $c['step'] }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="space-y-3">
                            <h3 class="h-display font-bold text-2xl sm:text-3xl text-cream group-hover:text-saffron transition-colors leading-tight">
                                {{ $c['title'] }}
                            </h3>
                            <p class="text-sand/80 text-xs sm:text-sm leading-relaxed">
                                {{ $c['desc'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-emerald/20 flex items-center justify-between text-xs text-mint">
                            <span>Explore Framework</span>
                            <span class="text-saffron group-hover:translate-x-1.5 transition-transform">&rarr;</span>
                        </div>
                    </a>
                @else
                    <!-- Light Cards (02 & 03) from Wireframe -->
                    <a 
                        href="{{ $c['url'] }}"
                        class="rounded-[2.5rem] bg-white text-ink p-7 sm:p-9 lg:p-10 border border-sand/60 hover:border-emerald/40 shadow-sm hover:shadow-xl flex flex-col justify-between space-y-12 relative overflow-hidden group hover:scale-[1.02] transition-all duration-300"
                        data-tilt
                    >
                        <!-- Top Step Badge -->
                        <div class="flex items-center justify-between">
                            <span class="w-2 h-2 rounded-full bg-sand"></span>
                            <span class="font-display font-bold text-2xl text-slate group-hover:text-emerald transition-colors">
                                {{ $c['step'] }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="space-y-3">
                            <h3 class="h-display font-bold text-2xl sm:text-3xl text-ink group-hover:text-emerald transition-colors leading-tight">
                                {{ $c['title'] }}
                            </h3>
                            <p class="text-slate text-xs sm:text-sm leading-relaxed">
                                {{ $c['desc'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-sand/40 flex items-center justify-between text-xs text-slate group-hover:text-emerald transition-colors">
                            <span>Explore Framework</span>
                            <span class="text-emerald group-hover:translate-x-1.5 transition-transform">&rarr;</span>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

    </div>
</section>
