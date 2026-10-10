<div 
    x-show="openDropdown === '{{ $item['label'] }}'"
    x-transition:enter="transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]"
    x-transition:enter-start="opacity-0 -translate-y-2 scale-[0.96]"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition-all duration-150 ease-in"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 -translate-y-2 scale-[0.97]"
    @click.away="openDropdown = null"
    class="absolute top-full left-1/2 -translate-x-1/2 pt-3 w-[460px] max-w-[90vw] z-50 pointer-events-auto"
    style="display: none;"
>
    <div class="relative bg-ink/95 backdrop-blur-2xl border border-emerald/30 rounded-3xl p-5 shadow-[0_30px_90px_-15px_rgba(0,0,0,0.7),0_0_0_1px_rgba(31,138,112,0.2)] text-cream overflow-hidden">
        <!-- Luminous Top Accent Line -->
        <div class="absolute top-0 inset-x-8 h-[2px] bg-gradient-to-r from-transparent via-mint/60 to-transparent"></div>
        
        <!-- Ambient Glow -->
        <div class="absolute -top-20 -right-20 w-44 h-44 bg-saffron/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header -->
        <div class="relative pb-3 mb-2 border-b border-emerald/20 flex items-center justify-between">
            <span class="px-2.5 py-0.5 rounded-full bg-emerald/20 border border-emerald/30 text-[10px] uppercase font-bold tracking-widest text-mint">
                {{ $item['eyebrow'] ?? 'Methodology' }}
            </span>
            <span class="text-[11px] text-sand/60">3-Step Process</span>
        </div>

        <!-- Sequential Step Items with Connector Line -->
        <div class="relative space-y-2">
            <!-- Left subtle connector line -->
            <div class="absolute top-5 bottom-5 left-[1.125rem] w-[1px] bg-emerald/25 hidden sm:block pointer-events-none"></div>

            @foreach($item['children'] as $child)
                <a 
                    href="{{ $child['url'] }}" 
                    class="group p-2.5 rounded-2xl hover:bg-forest/60 transition-all duration-200 border border-transparent hover:border-emerald/30 flex items-start gap-3 relative z-10"
                >
                    <!-- Step Number Badge with spring hover -->
                    <div class="w-9 h-9 rounded-xl bg-forest/90 border border-emerald/30 flex items-center justify-center shrink-0 font-display font-bold text-xs text-mint group-hover:scale-110 group-hover:bg-saffron group-hover:text-ink group-hover:border-saffron group-hover:shadow-[0_0_15px_rgba(242,169,59,0.4)] transition-all duration-300">
                        {{ $child['step'] ?? '0' . $loop->iteration }}
                    </div>

                    <div class="min-w-0 flex-1">
                        <div class="font-display font-semibold text-xs sm:text-sm text-cream group-hover:text-saffron transition-colors flex items-center justify-between">
                            <span>{{ $child['label'] }}</span>
                            <svg class="w-3.5 h-3.5 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200 text-saffron shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                        @if(!empty($child['desc']))
                            <p class="text-[11px] text-sand/65 line-clamp-2 mt-0.5 leading-snug group-hover:text-sand/90 transition-colors">
                                {{ $child['desc'] }}
                            </p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Bottom Tag -->
        @if(!empty($item['footer_tag']))
            <div class="relative mt-3 pt-3 border-t border-emerald/20 flex items-center justify-between text-[11px] text-sand/60">
                <span class="truncate">{{ $item['footer_tag'] }}</span>
                <a href="{{ $item['footer_url'] ?? '#' }}" class="text-saffron hover:underline shrink-0 ml-2 font-medium">
                    {{ $item['footer_cta'] ?? 'Explore' }} &rarr;
                </a>
            </div>
        @endif
    </div>
</div>
