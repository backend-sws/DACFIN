<div 
    x-show="openDropdown === '{{ $item['label'] }}'"
    x-transition:enter="transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]"
    x-transition:enter-start="opacity-0 -translate-y-2 scale-[0.96]"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition-all duration-150 ease-in"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 -translate-y-2 scale-[0.97]"
    @click.away="openDropdown = null"
    class="absolute top-full left-1/2 -translate-x-1/2 pt-3 w-[720px] max-w-[92vw] z-50 pointer-events-auto"
    style="display: none;"
>
    <div class="relative bg-white/95 backdrop-blur-2xl border border-powder-blue/60 rounded-3xl p-5 sm:p-6 shadow-[0_25px_70px_-15px_rgba(7,25,34,0.14),0_0_0_1px_rgba(175,238,238,0.4)] text-ink overflow-hidden">
        <!-- Luminous Top Accent Line -->
        <div class="absolute top-0 inset-x-12 h-[2px] bg-gradient-to-r from-transparent via-turquoise to-transparent"></div>
        
        <!-- Ambient Glow -->
        <div class="absolute -top-24 -left-24 w-52 h-52 bg-ice-cyan/60 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-52 h-52 bg-powder-blue/40 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header -->
        <div class="relative flex items-center justify-between pb-3.5 mb-3 border-b border-powder-blue/30">
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-0.5 rounded-full bg-ice-cyan/90 border border-turquoise/50 text-[10px] uppercase font-bold tracking-widest text-emerald">
                    {{ $item['eyebrow'] ?? 'Client Profiles' }}
                </span>
                <p class="text-xs text-slate/75 hidden sm:block">
                    {{ $item['desc'] ?? 'Tailored architectures for distinct life phases' }}
                </p>
            </div>
            <a href="{{ route('contact') }}" class="group text-xs text-saffron font-bold hover:text-emerald transition-colors flex items-center gap-1 shrink-0">
                <span>Free Assessment</span>
                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- 2-Column Grid -->
        <div class="relative grid grid-cols-1 sm:grid-cols-2 gap-2">
            @foreach($item['children'] as $child)
                <a 
                    href="{{ $child['url'] }}" 
                    class="group p-2.5 rounded-2xl hover:bg-ice-cyan/40 transition-all duration-200 border border-transparent hover:border-turquoise/40 flex items-start gap-3 relative"
                >
                    <!-- Icon badge with spring hover -->
                    <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-ice-cyan/70 border border-powder-blue/50 flex items-center justify-center shrink-0 text-emerald group-hover:scale-110 group-hover:bg-saffron group-hover:text-white group-hover:border-saffron group-hover:shadow-[0_0_15px_rgba(37,99,235,0.35)] transition-all duration-300">
                        <x-ui.icon :name="$child['icon'] ?? 'sparkles'" class="w-4 h-4" />
                    </div>

                    <div class="min-w-0 flex-1">
                        <div class="font-display font-bold text-xs xl:text-sm text-ink group-hover:text-emerald transition-colors flex items-center justify-between">
                            <span class="truncate">{{ $child['label'] }}</span>
                            <svg class="w-3.5 h-3.5 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200 text-emerald shrink-0 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                        @if(!empty($child['desc']))
                            <p class="text-[11px] text-slate/75 line-clamp-1 mt-0.5 group-hover:text-slate transition-colors">
                                {{ $child['desc'] }}
                            </p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Bottom Tag -->
        @if(!empty($item['footer_tag']))
            <div class="relative mt-3 pt-3 border-t border-powder-blue/30 flex items-center justify-between text-[11px] text-slate/70">
                <span class="truncate">{{ $item['footer_tag'] }}</span>
                <a href="{{ $item['footer_url'] ?? '#' }}" class="text-saffron hover:text-emerald shrink-0 ml-2 font-bold transition-colors">
                    {{ $item['footer_cta'] ?? 'Explore' }} &rarr;
                </a>
            </div>
        @endif
    </div>
</div>
