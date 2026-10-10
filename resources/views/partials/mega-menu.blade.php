<div 
    x-show="openDropdown === 'Services'"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-2 scale-95"
    @click.away="openDropdown = null"
    class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-[720px] max-w-[90vw] bg-ink/95 backdrop-blur-xl border border-emerald/30 rounded-3xl p-6 shadow-2xl text-cream z-50"
    style="display: none;"
>
    <div class="flex items-center justify-between pb-4 mb-4 border-b border-emerald/20">
        <div>
            <span class="text-xs uppercase font-bold tracking-widest text-mint">Advisory Expertise</span>
            <p class="text-sm text-sand/70 font-display">End-to-end financial planning and capital growth</p>
        </div>
        <a href="{{ route('contact') }}" class="text-xs text-saffron font-semibold hover:underline flex items-center gap-1">
            Free Consultation &rarr;
        </a>
    </div>

    <div class="grid grid-cols-2 gap-3">
        @foreach($item['children'] as $child)
            <a 
                href="{{ $child['url'] }}" 
                class="group p-3.5 rounded-2xl hover:bg-forest/60 transition-all duration-200 border border-transparent hover:border-emerald/30 flex items-start gap-3.5"
            >
                <div class="w-9 h-9 rounded-xl bg-forest flex items-center justify-center shrink-0 text-saffron group-hover:bg-saffron group-hover:text-ink transition-colors">
                    <span class="font-display font-bold text-sm">0{{ $loop->iteration }}</span>
                </div>
                <div>
                    <div class="font-display font-semibold text-sm text-cream group-hover:text-saffron transition-colors flex items-center gap-1.5">
                        {{ $child['label'] }}
                        <svg class="w-3.5 h-3.5 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    @if(!empty($child['desc']))
                        <p class="text-xs text-sand/70 line-clamp-2 mt-0.5 leading-snug">{{ $child['desc'] }}</p>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</div>
