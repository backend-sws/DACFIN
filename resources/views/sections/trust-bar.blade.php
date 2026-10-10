@php
    $trustItems = config('fincun.home.trust_bar') ?? [
        [
            'icon' => 'shield',
            'title' => 'AMFI Registered MFD',
            'desc' => 'ARN-149176 & ARN-82228 Distributor with fiduciary care.',
        ],
        [
            'icon' => 'target',
            'title' => 'Zero Product Bias',
            'desc' => '100% client alignment without institutional sales quotas.',
        ],
        [
            'icon' => 'building',
            'title' => 'Dual Regional Hubs',
            'desc' => 'High-touch advisory centers in Exhibition Rd, Patna & Argora Chowk, Ranchi.',
        ],
    ];
@endphp

<section class="py-8 sm:py-12 bg-cream border-y border-sand/40">
    <div class="container-x">
        <!-- 3-Item Trust Strip (Horizontal on Desktop, Stacked on Mobile) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 divide-y md:divide-y-0 md:divide-x divide-sand/40">
            @foreach($trustItems as $item)
                <div class="flex items-center gap-4 pt-4 first:pt-0 md:pt-0 md:px-4 first:pl-0 last:pr-0 group" data-reveal="up">
                    <!-- Circle Icon Badge -->
                    <div class="w-12 h-12 rounded-full bg-forest text-mint flex items-center justify-center shrink-0 border border-emerald/30 group-hover:scale-110 group-hover:bg-saffron group-hover:text-ink transition-all duration-300 shadow-md">
                        <x-ui.icon :name="$item['icon']" class="w-5 h-5" />
                    </div>

                    <!-- Text Block -->
                    <div class="space-y-0.5 min-w-0">
                        <h3 class="font-display font-bold text-sm sm:text-base text-ink group-hover:text-emerald transition-colors">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-xs text-slate line-clamp-2 leading-relaxed">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
