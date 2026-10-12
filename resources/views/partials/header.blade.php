<header 
    class="fixed top-0 inset-x-0 z-40 transition-all duration-300"
    :class="{ 'translate-y-0': showHeader, '-translate-y-full': !showHeader }"
>
    <!-- Top Bar: Elegant Light Frosted Glass strip with contact & hours -->
    <div 
        class="bg-white/70 text-slate text-xs py-2 px-4 border-b border-powder-blue/30 backdrop-blur-md transition-all duration-300 hidden sm:block"
        :class="{ 'opacity-0 -translate-y-full h-0 py-0 overflow-hidden border-b-0': isScrolled, 'opacity-100': !isScrolled }"
    >
        <div class="container-x flex items-center justify-between">
            <div class="flex items-center gap-4 text-xs font-medium">
                <span class="text-ink/90 font-semibold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald animate-pulse"></span>
                    {{ config('fincun.navigation.topbar') }}
                </span>
                <span class="text-slate/30">|</span>
                <a href="mailto:{{ config('fincun.site.email') }}" class="text-slate hover:text-emerald transition-colors flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-emerald" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ config('fincun.site.email') }}
                </a>
                <span class="text-slate/30">|</span>
                <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="text-slate hover:text-emerald transition-colors flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-emerald" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    {{ config('fincun.site.phones.0') }}
                </a>
            </div>
            <div class="flex items-center gap-4 text-slate/80 text-xs">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-emerald" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ config('fincun.site.hours') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Sleek Full-Width Edge-to-Edge Navigation Bar -->
    <nav 
        class="w-full border-b transition-all duration-300 backdrop-blur-xl backdrop-saturate-150"
        :class="isScrolled 
            ? 'bg-white/95 border-slate/15 shadow-[0_10px_30px_-10px_rgba(7,25,34,0.08)] py-3' 
            : 'bg-white/85 border-powder-blue/40 shadow-[0_4px_20px_-4px_rgba(7,25,34,0.04)] py-4'"
        aria-label="Main Navigation"
    >
        <!-- Luminous Top Accent Line -->
        <div class="absolute top-0 inset-x-0 h-[1.5px] bg-gradient-to-r from-transparent via-turquoise/50 to-transparent pointer-events-none"></div>

        <div class="container-x flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-3 group" aria-label="{{ config('fincun.site.brand') }} Home">
                <img 
                    src="{{ asset('images/dacfin-logo.svg') }}" 
                    alt="{{ config('fincun.site.name') }}" 
                    width="178" 
                    height="40" 
                    class="h-9 sm:h-10 w-auto transition-transform duration-300 group-hover:scale-[1.02]"
                >
            </a>

            <!-- Desktop Nav Menu -->
            <div class="hidden lg:flex items-center gap-1 xl:gap-2">
                @foreach(config('fincun.navigation.header') as $item)
                    @if(!empty($item['children']))
                        <div 
                            class="relative" 
                            @mouseenter="openDropdown = '{{ $item['label'] }}'" 
                            @mouseleave="openDropdown = null"
                        >
                            <button 
                                type="button" 
                                class="px-3.5 py-2 text-xs xl:text-sm font-semibold tracking-wide text-ink/80 hover:text-emerald hover:bg-ice-cyan/60 transition-all duration-200 rounded-xl flex items-center gap-1.5 focus:outline-none"
                                :class="{ 'text-emerald bg-ice-cyan/90 ring-1 ring-turquoise/60 shadow-xs': openDropdown === '{{ $item['label'] }}' }"
                                @click="openDropdown = openDropdown === '{{ $item['label'] }}' ? null : '{{ $item['label'] }}'"
                                aria-haspopup="true"
                                :aria-expanded="openDropdown === '{{ $item['label'] }}'"
                            >
                                <span>{{ $item['label'] }}</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-300 ease-out text-slate/70" :class="{ 'rotate-180 text-emerald': openDropdown === '{{ $item['label'] }}' }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            @if($item['label'] === 'Services')
                                @include('partials.mega-menu', ['item' => $item])
                            @elseif($item['label'] === 'Company')
                                @include('partials.dropdown-company', ['item' => $item])
                            @elseif($item['label'] === 'Who We Serve')
                                @include('partials.dropdown-audiences', ['item' => $item])
                            @elseif($item['label'] === 'Our Approach')
                                @include('partials.dropdown-approach', ['item' => $item])
                            @else
                                <!-- Generic Fallback Dropdown -->
                                <div 
                                    x-show="openDropdown === '{{ $item['label'] }}'"
                                    x-transition:enter="transition-all duration-300 ease-out"
                                    x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave="transition-all duration-150 ease-in"
                                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
                                    @click.away="openDropdown = null"
                                    class="absolute top-full left-0 pt-3 w-64 z-50"
                                    style="display: none;"
                                >
                                    <div class="bg-white/95 backdrop-blur-2xl border border-powder-blue/60 rounded-2xl p-2.5 shadow-2xl text-ink space-y-1">
                                        @foreach($item['children'] as $child)
                                            <a 
                                                href="{{ $child['url'] }}" 
                                                class="block px-3.5 py-2 rounded-xl text-xs sm:text-sm text-slate hover:text-emerald hover:bg-ice-cyan/60 transition-all font-semibold"
                                            >
                                                {{ $child['label'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <a 
                            href="{{ !empty($item['route']) ? route($item['route']) : $item['url'] }}" 
                            class="px-3.5 py-2 text-xs xl:text-sm font-semibold tracking-wide text-ink/80 hover:text-emerald hover:bg-ice-cyan/60 transition-all duration-200 rounded-xl"
                        >
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- CTA Right -->
            <div class="hidden sm:flex items-center gap-3">
                <a 
                    href="{{ config('fincun.navigation.header_cta.url') }}" 
                    class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-saffron text-white text-xs font-bold tracking-wide hover:bg-emerald transition-all duration-300 shadow-[0_4px_16px_rgba(37,99,235,0.3)] hover:shadow-[0_6px_20px_rgba(29,78,216,0.35)] hover:-translate-y-0.5 active:translate-y-0"
                >
                    <span>{{ config('fincun.navigation.header_cta.label') }}</span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            <!-- Hamburger Button for Mobile -->
            <button 
                type="button" 
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden p-2 rounded-xl text-ink hover:text-emerald hover:bg-ice-cyan/60 border border-powder-blue/40 transition-colors focus:outline-none"
                aria-label="Toggle navigation"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    @include('partials.mobile-menu')
</header>
