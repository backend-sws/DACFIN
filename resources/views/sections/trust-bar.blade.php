@php
    $trustItems = [
        [
            'icon' => 'shield',
            'badge' => 'AMFI REGULATORY',
            'title' => 'AMFI Registered MFD',
            'desc' => 'ARN-149176 & ARN-82228 Distributor operating with strict fiduciary ethics.',
            'highlight' => 'ARN-149176',
        ],
        [
            'icon' => 'target',
            'badge' => 'ZERO QUOTAS',
            'title' => '100% Client Aligned',
            'desc' => 'No proprietary sales targets. Recommendations strictly customized to your life milestones.',
            'highlight' => 'Zero Sales Bias',
        ],
        [
            'icon' => 'building',
            'badge' => 'PHYSICAL CENTER',
            'title' => 'Patna Advisory Hub',
            'desc' => 'In-person advisory at Shop No 14, Vijay Aman Apt, Main Road, Kankarbagh, Patna.',
            'highlight' => 'Kankarbagh, Patna',
        ],
        [
            'icon' => 'chart',
            'badge' => 'AUM ADVISED',
            'title' => '₹500Cr+ Portfolio Scope',
            'desc' => 'Disciplined asset allocation across bull and bear market cycles since 2016.',
            'highlight' => '10+ Yrs Proven',
        ],
    ];
@endphp

<section class="py-8 sm:py-12 bg-white/70 border-y border-sand/40 relative overflow-hidden backdrop-blur-md" data-trust-section>
    <!-- Ambient subtle background glow -->
    <div class="absolute inset-0 bg-gradient-to-r from-mint/10 via-transparent to-sand/20 pointer-events-none"></div>

    <div class="container-x relative">
        <!-- 4-Pillar High-Trust Credential Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-6 lg:gap-8">
            @foreach($trustItems as $index => $item)
                <div 
                    class="p-4 sm:p-5 rounded-2xl bg-cream/60 hover:bg-white border border-sand/50 hover:border-emerald/40 transition-all duration-300 shadow-sm hover:shadow-md flex flex-col justify-between group will-change-transform"
                    @if($index < 2)
                        data-trust-side="left"
                    @else
                        data-trust-side="right"
                    @endif
                >
                    <div class="flex items-center justify-between pb-3 border-b border-sand/30">
                        <span class="text-[10px] font-mono font-bold tracking-wider text-emerald uppercase">
                            {{ $item['badge'] }}
                        </span>
                        <span class="px-2 py-0.5 rounded-full bg-sand/30 text-[10px] font-semibold text-ink">
                            {{ $item['highlight'] }}
                        </span>
                    </div>

                    <div class="py-3 flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-forest text-mint flex items-center justify-center shrink-0 border border-emerald/30 group-hover:scale-110 group-hover:bg-saffron group-hover:text-ink transition-all duration-300 shadow-sm">
                            <x-ui.icon :name="$item['icon']" class="w-5 h-5" />
                        </div>
                        <div class="space-y-1 min-w-0">
                            <h3 class="font-display font-bold text-sm text-ink group-hover:text-emerald transition-colors">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-xs text-slate leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
