<header 
    class="fixed top-0 inset-x-0 z-40 transition-all duration-300"
    :class="{ 'translate-y-0': showHeader, '-translate-y-full': !showHeader }"
>
    <!-- Top Bar -->
    <div 
        class="bg-ink text-sand/80 text-xs py-2 px-4 border-b border-emerald/20 transition-all duration-300 hidden sm:block"
        :class="{ 'opacity-0 -translate-y-full h-0 py-0 overflow-hidden': isScrolled, 'opacity-100': !isScrolled }"
    >
        <div class="container-x flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span>{{ config('fincun.navigation.topbar') }}</span>
                <a href="mailto:{{ config('fincun.site.email') }}" class="text-mint hover:text-saffron transition-colors">
                    {{ config('fincun.site.email') }}
                </a>
                <span class="text-sand/30">|</span>
                <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="text-mint hover:text-saffron transition-colors">
                    {{ config('fincun.site.phones.0') }}
                </a>
            </div>
            <div class="flex items-center gap-4 text-sand/60">
                <span>{{ config('fincun.site.hours') }}</span>
            </div>
        </div>
    </div>

    <!-- Floating Glass Pill Header -->
    <div class="container-x pt-3 sm:pt-4">
        <nav 
            class="mx-auto flex items-center justify-between px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition-all duration-300 border backdrop-blur-xl"
            :class="isScrolled 
                ? 'bg-ink/90 border-emerald/30 shadow-2xl shadow-ink/40 max-w-6xl' 
                : 'bg-ink/80 border-sand/20 shadow-lg max-w-7xl'"
            aria-label="Main Navigation"
        >
            <!-- Logo -->
            <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-2 group" aria-label="FINCUN Home">
                <img 
                    src="{{ asset('images/fincun-logo-light.svg') }}" 
                    alt="FINCUN" 
                    width="140" 
                    height="34" 
                    class="h-8 sm:h-9 w-auto transition-transform duration-300 group-hover:scale-105"
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
                                class="px-3.5 py-2 text-xs xl:text-sm font-medium tracking-wide text-cream/90 hover:text-saffron transition-colors rounded-full flex items-center gap-1 focus:outline-none"
                                :class="{ 'text-saffron bg-white/5': openDropdown === '{{ $item['label'] }}' }"
                                @click="openDropdown = openDropdown === '{{ $item['label'] }}' ? null : '{{ $item['label'] }}'"
                                aria-haspopup="true"
                                :aria-expanded="openDropdown === '{{ $item['label'] }}'"
                            >
                                <span>{{ $item['label'] }}</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': openDropdown === '{{ $item['label'] }}' }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            @if($item['label'] === 'Services')
                                @include('partials.mega-menu', ['item' => $item])
                            @else
                                <!-- Standard Dropdown -->
                                <div 
                                    x-show="openDropdown === '{{ $item['label'] }}'"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                                    @click.away="openDropdown = null"
                                    class="absolute top-full left-0 mt-3 w-64 bg-ink/95 backdrop-blur-xl border border-emerald/30 rounded-2xl p-2 shadow-2xl text-cream z-50 space-y-1"
                                    style="display: none;"
                                >
                                    @foreach($item['children'] as $child)
                                        <a 
                                            href="{{ $child['url'] }}" 
                                            class="block px-3.5 py-2 rounded-xl text-xs sm:text-sm text-sand/80 hover:text-saffron hover:bg-forest/60 transition-all font-medium"
                                        >
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <a 
                            href="{{ !empty($item['route']) ? route($item['route']) : $item['url'] }}" 
                            class="px-3.5 py-2 text-xs xl:text-sm font-medium tracking-wide text-cream/90 hover:text-saffron transition-colors rounded-full"
                        >
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- CTA Right -->
            <div class="hidden sm:flex items-center gap-3">
                <x-ui.button 
                    :href="config('fincun.navigation.header_cta.url')" 
                    variant="primary" 
                    class="text-xs px-5 py-2.5"
                >
                    {{ config('fincun.navigation.header_cta.label') }}
                </x-ui.button>
            </div>

            <!-- Hamburger Button for Mobile -->
            <button 
                type="button" 
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden p-2 rounded-full text-sand hover:text-saffron hover:bg-forest/50 transition-colors focus:outline-none"
                aria-label="Toggle navigation"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </nav>
    </div>

    @include('partials.mobile-menu')
</header>
