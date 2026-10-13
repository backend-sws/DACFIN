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
                'dark' => false,
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

<section class="section-y bg-cream overflow-hidden" data-bottom-services-section>
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Section Title from Wireframe -->
        <div class="text-center max-w-2xl mx-auto space-y-2 will-change-transform" data-bottom-services-header>
            <span class="text-xs uppercase font-bold tracking-widest text-emerald">Our Advisory Pillars</span>
            <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink">
                {{ $bottomServices['title'] }}
            </h2>
            <p class="text-xs sm:text-sm text-slate">
                {{ $bottomServices['subtitle'] }}
            </p>
        </div>

        <!-- 3 Cards Engineered in Metallic Blue with Specular Shine -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-8 items-stretch" data-bottom-services-grid>
            @foreach($cards as $idx => $c)
                @php
                    $colType = $idx === 0 ? 'left' : ($idx === 1 ? 'center' : 'right');
                @endphp
                <div 
                    class="rounded-3xl sm:rounded-[2.5rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-8 lg:p-10 shadow-[0_15px_45px_rgba(21,50,102,0.22)] hover:shadow-[0_25px_55px_rgba(26,63,133,0.38)] flex flex-col justify-between space-y-6 sm:space-y-8 relative overflow-hidden group hover:scale-[1.02] transition-all duration-300 text-white will-change-transform"
                    data-tilt
                    data-bottom-services-card
                    data-bottom-services-col="{{ $colType }}"
                >
                    <!-- Top Metallic Specular Edge Shine -->
                    <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                    <!-- Ambient Metallic Flare -->
                    <div class="absolute -right-16 -top-16 w-48 h-48 bg-[#3b82f6]/20 rounded-full blur-3xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                    <!-- Top Step Badge -->
                    <div class="flex items-center justify-between relative z-10">
                        <span class="px-3 py-1 rounded-full bg-white/15 text-white border border-white/20 text-[11px] font-semibold tracking-wider">
                            {{ $c['tag'] }}
                        </span>
                        <span class="font-display font-bold text-3xl text-[#93c5fd] group-hover:text-white transition-colors">
                            {{ $c['step'] }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="space-y-4 relative z-10">
                        <h3 class="h-display font-bold text-2xl sm:text-3xl text-white group-hover:text-[#bfdbfe] transition-colors leading-tight">
                            {{ $c['title'] }}
                        </h3>
                        <p class="text-[#dbeafe] text-xs sm:text-sm leading-relaxed">
                            {{ $c['desc'] }}
                        </p>

                        <!-- Inclusions List -->
                        <ul class="space-y-2 pt-2 border-t border-white/15 text-xs text-[#dbeafe]">
                            @foreach($c['features'] as $f)
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#38bdf8] shrink-0 shadow-[0_0_8px_#38bdf8]"></span>
                                    <span>{{ $f }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-white/15 flex items-center justify-between text-xs text-[#93c5fd] relative z-10">
                        <a href="{{ url($c['url']) }}" class="font-semibold text-[#93c5fd] group-hover:text-white transition-colors">
                            Explore Framework
                        </a>
                        <a href="{{ url($c['url']) }}" class="w-8 h-8 rounded-full bg-white/15 flex items-center justify-center text-white group-hover:bg-white/25 group-hover:translate-x-1.5 transition-all">
                            &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
