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
                    class="group relative p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] shadow-[0_10px_30px_rgba(15,40,90,0.18)] hover:shadow-[0_18px_45px_rgba(26,63,133,0.35)] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden text-white will-change-transform"
                    @if($index < 2)
                        data-trust-side="left"
                    @else
                        data-trust-side="right"
                    @endif
                >
                    <!-- Metallic Specular Edge Shine -->
                    <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                    <!-- Ambient Flare -->
                    <div class="absolute -right-10 -top-10 w-28 h-28 bg-[#3b82f6]/20 rounded-full blur-xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                    <div class="flex items-center justify-between pb-3 border-b border-white/15 relative z-10">
                        <span class="text-[10px] font-mono font-bold tracking-wider text-[#93c5fd] uppercase">
                            {{ $item['badge'] }}
                        </span>
                        <span class="px-2 py-0.5 rounded-full bg-white/10 border border-white/15 text-[10px] font-semibold text-white">
                            {{ $item['highlight'] }}
                        </span>
                    </div>

                    <div class="py-3 flex items-start gap-3.5 relative z-10">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] text-white flex items-center justify-center shrink-0 border border-[#60a5fa]/50 shadow-sm group-hover:scale-110 group-hover:from-saffron group-hover:to-amber-500 transition-all duration-300">
                            <x-ui.icon :name="$item['icon']" class="w-5 h-5" />
                        </div>
                        <div class="space-y-1 min-w-0">
                            <h3 class="font-display font-bold text-sm text-white group-hover:text-[#bfdbfe] transition-colors">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-xs text-[#dbeafe] leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
