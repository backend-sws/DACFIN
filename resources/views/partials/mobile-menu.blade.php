<div 
    x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    @keydown.escape.window="mobileMenuOpen = false"
    class="fixed inset-0 z-50 bg-white/95 backdrop-blur-3xl text-ink overflow-y-auto flex flex-col p-6 pt-24 lg:hidden"
    style="display: none;"
>
    <!-- Close button top right -->
    <button 
        type="button" 
        @click="mobileMenuOpen = false"
        class="absolute top-6 right-6 p-2 rounded-full bg-ice-cyan/90 text-ink hover:bg-emerald hover:text-white transition-colors border border-powder-blue/40"
        aria-label="Close menu"
    >
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <!-- Nav Items with Accordions -->
    <div class="flex-1 space-y-4 my-auto">
        @foreach(config('fincun.navigation.header') as $item)
            @if(!empty($item['children']))
                <div x-data="{ open: false }" class="border-b border-powder-blue/40 pb-3">
                    <button 
                        type="button" 
                        @click="open = !open" 
                        class="w-full flex items-center justify-between py-2 text-xl sm:text-2xl font-display font-bold text-ink hover:text-emerald transition-colors text-left"
                        :aria-expanded="open"
                    >
                        <span>{{ $item['label'] }}</span>
                        <svg class="w-5 h-5 transition-transform duration-300 text-emerald" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-2 pt-2 space-y-2">
                        @foreach($item['children'] as $child)
                            <a 
                                href="{{ $child['url'] }}" 
                                @click="mobileMenuOpen = false"
                                class="flex items-center gap-3 p-2 rounded-xl text-sm text-slate hover:text-emerald hover:bg-ice-cyan/50 transition-colors"
                            >
                                <div class="w-7 h-7 rounded-lg bg-ice-cyan border border-powder-blue/50 flex items-center justify-center shrink-0 text-emerald">
                                    <x-ui.icon :name="$child['icon'] ?? 'sparkles'" class="w-3.5 h-3.5" />
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-ink">{{ $child['label'] }}</div>
                                    @if(!empty($child['desc']))
                                        <div class="text-[11px] text-slate/70 truncate">{{ $child['desc'] }}</div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="border-b border-powder-blue/40 pb-3">
                    <a 
                        href="{{ !empty($item['route']) ? route($item['route']) : $item['url'] }}" 
                        @click="mobileMenuOpen = false"
                        class="block py-2 text-xl sm:text-2xl font-display font-bold text-ink hover:text-emerald transition-colors"
                    >
                        {{ $item['label'] }}
                    </a>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Bottom contact & CTA -->
    <div class="pt-6 border-t border-powder-blue/40 space-y-4">
        <div class="text-xs text-slate space-y-1">
            <p><span class="text-emerald font-bold">Email:</span> <a href="mailto:{{ config('fincun.site.email') }}" class="hover:text-emerald">{{ config('fincun.site.email') }}</a></p>
            <p><span class="text-emerald font-bold">Phone:</span> <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="hover:text-emerald">{{ config('fincun.site.phones.0') }}</a></p>
            <p><span class="text-emerald font-bold">Hours:</span> {{ config('fincun.site.hours') }}</p>
        </div>

        <a 
            href="{{ config('fincun.navigation.header_cta.url') }}" 
            @click="mobileMenuOpen = false"
            class="block w-full text-center py-3.5 px-6 rounded-full bg-saffron text-white font-bold text-sm hover:bg-emerald transition-colors shadow-lg shadow-saffron/20"
        >
            {{ config('fincun.navigation.header_cta.label') }} &rarr;
        </a>
    </div>
</div>
