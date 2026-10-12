@php
    $stats = config('fincun.home.stats') ?? [
        ['value' => 5, 'pad' => true, 'label' => 'Dedicated advisors on your team'],
        ['value' => 6, 'pad' => true, 'label' => 'Core advisory services offered'],
        ['value' => 8, 'pad' => true, 'label' => 'Client segments we specialise in'],
        ['text' => 'Mon–Sat', 'label' => '8:00 AM – 8:00 PM, always reachable', 'live' => true],
    ];
@endphp

<section class="relative z-20 -mt-6 sm:-mt-8 lg:-mt-10 mb-8 sm:mb-10">
    <div class="container-x max-w-6xl">
        <div 
            class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-white/95 backdrop-blur-xl border border-sand/70 shadow-xl shadow-emerald/5 p-3 sm:p-4 lg:py-4 lg:px-7 text-ink grid grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-4 items-center" 
            data-stats-strip
        >
            <!-- Top Shimmer Accent Line -->
            <div class="absolute inset-x-8 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-saffron/60 to-transparent pointer-events-none" data-stats-shimmer></div>

            @foreach($stats as $stat)
                <div 
                    class="p-2 sm:p-3 rounded-xl sm:rounded-2xl bg-sand/15 sm:bg-transparent text-center sm:text-left group/item transition-all duration-200 hover:bg-sand/30" 
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
