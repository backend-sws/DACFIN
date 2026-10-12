@php
    $stats = config('fincun.home.stats') ?? [
        ['value' => 5, 'pad' => true, 'label' => 'Dedicated advisors on your team'],
        ['value' => 6, 'pad' => true, 'label' => 'Core advisory services offered'],
        ['value' => 8, 'pad' => true, 'label' => 'Client segments we specialise in'],
        ['text' => 'Mon–Sat', 'label' => '8:00 AM – 8:00 PM, always reachable', 'live' => true],
    ];
@endphp

<section class="relative z-20 -mt-7 sm:-mt-9 mb-8 sm:mb-10">
    <div class="container-x max-w-6xl">
        <div 
            class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-white/95 backdrop-blur-xl border border-sand/70 shadow-xl shadow-emerald/5 py-3 px-4 sm:py-3.5 sm:px-6 lg:py-4 lg:px-7 text-ink grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 items-center divide-y sm:divide-y-0 sm:divide-x divide-sand/50" 
            data-stats-strip
        >
            <!-- Top Shimmer Accent Line -->
            <div class="absolute inset-x-8 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-saffron/60 to-transparent pointer-events-none" data-stats-shimmer></div>

            @foreach($stats as $stat)
                <div 
                    class="pt-3 sm:pt-0 sm:px-4 first:pt-0 first:pl-0 last:pr-0 text-center sm:text-left group/item rounded-xl p-1.5 sm:p-2 transition-all duration-200 hover:bg-sand/15" 
                    data-stat-item
                >
                    <x-ui.counter 
                        :value="$stat['value'] ?? null" 
                        :text="$stat['text'] ?? null" 
                        :pad="$stat['pad'] ?? false" 
                        :label="$stat['label']" 
                        :is-live="!empty($stat['live']) || isset($stat['text'])"
                    />
                </div>
            @endforeach
        </div>
    </div>
</section>
