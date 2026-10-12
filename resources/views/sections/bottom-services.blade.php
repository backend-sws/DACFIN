@php
    $bottomServices = [
        'title' => 'Core Advisory Practices',
        'subtitle' => 'Three institutional pillars engineered to manage, multiply, and safeguard generational wealth.',
        'cards' => [
            [
                'step' => '01',
                'title' => 'Financial Planning',
                'desc' => 'Comprehensive 360-degree roadmaps integrating retirement milestones, education funds, tax optimization, and estate protection.',
                'features' => [
                    'Inflation-indexed cashflow modeling',
                    'Children higher education milestones',
                    'Tax harvesting & capital gains optimization',
                    'Emergency liquidity & contingency buffer',
                ],
                'dark' => true,
                'url' => '/services/financial-planing',
                'tag' => 'Foundation Pillar',
            ],
            [
                'step' => '02',
                'title' => 'Investment Advise',
                'desc' => 'Goal-based SIPs, curated mutual fund baskets, and systematic rebalancing tailored to your target returns without sales pressure.',
                'features' => [
                    'Multi-cap active equity fund baskets',
                    'Systematic investment plans (SIP & STP)',
                    'Quarterly alpha audit & risk rebalancing',
                    'Direct portfolio tracking via fintech app',
                ],
                'dark' => false,
                'url' => '/services/investment-advise',
                'tag' => 'Growth Engine',
            ],
            [
                'step' => '03',
                'title' => 'Wealth Management',
                'desc' => 'Discretionary portfolio management services (PMS), alternative investments (AIF), and dedicated private wealth stewardship.',
                'features' => [
                    'Bespoke PMS for family offices & HNIs',
                    'Alternative Investment Funds (Category II/III)',
                    'Loan Against Mutual Funds for instant liquidity',
                    'Direct access to senior advisory committee',
                ],
                'dark' => false,
                'url' => '/services/wealth-management',
                'tag' => 'HNI Stewardship',
            ],
        ],
    ];
    $cards = $bottomServices['cards'] ?? [];
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Section Title from Wireframe -->
        <div class="text-center max-w-2xl mx-auto space-y-2" data-reveal="up">
            <span class="text-xs uppercase font-bold tracking-widest text-emerald">Our Advisory Pillars</span>
            <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink">
                {{ $bottomServices['title'] }}
            </h2>
            <p class="text-xs sm:text-sm text-slate">
                {{ $bottomServices['subtitle'] }}
            </p>
        </div>

        <!-- 3 Cards (Card 1: Dark, Cards 2 & 3: Light) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 items-stretch" data-stagger>
            @foreach($cards as $c)
                @if(!empty($c['dark']))
                    <!-- Dark Inverted Card (01) from Wireframe -->
                    <div 
                        class="rounded-[2.5rem] bg-ink text-cream p-7 sm:p-9 lg:p-10 border border-emerald/30 shadow-2xl flex flex-col justify-between space-y-8 relative overflow-hidden group hover:scale-[1.02] transition-all duration-300"
                        data-tilt
                    >
                        <div class="absolute -right-16 -top-16 w-48 h-48 bg-emerald/20 rounded-full blur-3xl pointer-events-none"></div>

                        <!-- Top Step Badge -->
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full bg-white/10 text-mint text-[11px] font-semibold tracking-wider">
                                {{ $c['tag'] }}
                            </span>
                            <span class="font-display font-bold text-3xl text-cream/90 group-hover:text-saffron transition-colors">
                                {{ $c['step'] }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="space-y-4">
                            <h3 class="h-display font-bold text-2xl sm:text-3xl text-cream group-hover:text-saffron transition-colors leading-tight">
                                {{ $c['title'] }}
                            </h3>
                            <p class="text-sand/80 text-xs sm:text-sm leading-relaxed">
                                {{ $c['desc'] }}
                            </p>

                            <!-- Inclusions List -->
                            <ul class="space-y-2 pt-2 border-t border-emerald/20 text-xs text-mint/90">
                                @foreach($c['features'] as $f)
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-saffron shrink-0"></span>
                                        <span>{{ $f }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pt-4 border-t border-emerald/20 flex items-center justify-between text-xs text-mint">
                            <a href="{{ url($c['url']) }}" class="font-semibold text-mint group-hover:text-saffron transition-colors">
                                Explore Framework
                            </a>
                            <a href="{{ url($c['url']) }}" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-saffron group-hover:translate-x-1.5 transition-all">
                                &rarr;
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Light Cards (02 & 03) from Wireframe -->
                    <div 
                        class="rounded-[2.5rem] bg-white text-ink p-7 sm:p-9 lg:p-10 border border-sand/60 hover:border-emerald/40 shadow-sm hover:shadow-xl flex flex-col justify-between space-y-8 relative overflow-hidden group hover:scale-[1.02] transition-all duration-300"
                        data-tilt
                    >
                        <!-- Top Step Badge -->
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full bg-sand/30 text-ink text-[11px] font-semibold tracking-wider">
                                {{ $c['tag'] }}
                            </span>
                            <span class="font-display font-bold text-3xl text-slate group-hover:text-emerald transition-colors">
                                {{ $c['step'] }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="space-y-4">
                            <h3 class="h-display font-bold text-2xl sm:text-3xl text-ink group-hover:text-emerald transition-colors leading-tight">
                                {{ $c['title'] }}
                            </h3>
                            <p class="text-slate text-xs sm:text-sm leading-relaxed">
                                {{ $c['desc'] }}
                            </p>

                            <!-- Inclusions List -->
                            <ul class="space-y-2 pt-2 border-t border-sand/40 text-xs text-slate">
                                @foreach($c['features'] as $f)
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald shrink-0"></span>
                                        <span>{{ $f }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pt-4 border-t border-sand/40 flex items-center justify-between text-xs text-slate group-hover:text-emerald transition-colors">
                            <a href="{{ url($c['url']) }}" class="font-semibold text-ink group-hover:text-emerald transition-colors">
                                Explore Framework
                            </a>
                            <a href="{{ url($c['url']) }}" class="w-8 h-8 rounded-full bg-sand/30 flex items-center justify-center text-emerald group-hover:translate-x-1.5 transition-all">
                                &rarr;
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
</section>
