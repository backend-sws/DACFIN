@php
    $aud = config('fincun.home.audiences');
@endphp

<section class="section-y bg-ink text-cream relative overflow-hidden" data-pin-x>
    <div class="container-x mb-10 sm:mb-14 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <x-ui.section-title 
            :eyebrow="$aud['eyebrow']" 
            :title="$aud['title']" 
            :light="true" 
        />

        <div>
            <x-ui.button :href="$aud['all_link'][1]" variant="ghost" class="text-mint border-emerald/30 hover:bg-forest text-xs">
                {{ $aud['all_link'][0] }}
            </x-ui.button>
        </div>
    </div>

    <!-- Pinned Horizontal Scroll Wrapper for Desktop, Snap Swipe for Mobile -->
    <div class="horizontal-scroll-container overflow-x-auto lg:overflow-visible pb-6 sm:pb-8 lg:pb-0 px-4 sm:px-8 scrollbar-none snap-x snap-mandatory">
        <div class="horizontal-scroll-track flex lg:inline-flex gap-4 sm:gap-6 min-w-max lg:min-w-0 lg:flex-nowrap">
            @foreach($aud['items'] as $idx => $item)
                <div class="w-[82vw] max-w-[320px] sm:w-80 shrink-0 snap-center rounded-3xl sm:rounded-[2.5rem] bg-forest/60 border border-emerald/25 p-6 sm:p-8 flex flex-col justify-between space-y-8 sm:space-y-12 hover:border-saffron/60 hover:bg-forest/90 transition-all duration-300 group" data-tilt>
                    
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-xs font-bold text-saffron px-3 py-1 rounded-full bg-ink/60 border border-emerald/20">
                            0{{ $idx + 1 }}
                        </span>
                        <div class="w-8 h-8 rounded-full bg-emerald/20 text-mint flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            &rarr;
                        </div>
                    </div>

                    <div class="space-y-3">
                        <h4 class="font-display font-bold text-2xl text-cream group-hover:text-saffron transition-colors">
                            {{ $item[0] }}
                        </h4>
                        <p class="text-sm text-sand/70 leading-relaxed">
                            {{ $item[1] }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-emerald/15">
                        <a href="{{ $item[2] }}" class="text-xs font-semibold text-mint group-hover:text-saffron flex items-center gap-1.5 transition-colors">
                            <span>Learn more</span>
                            <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
