<footer class="relative bg-ink text-sand/80 pt-20 pb-12 overflow-hidden border-t border-emerald/20">
    <!-- Giant Faded Outlined Wordmark Behind in Parallax -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 select-none pointer-events-none opacity-[0.03] whitespace-nowrap overflow-hidden" data-parallax="0.1">
        <span class="font-display text-[16vw] font-black tracking-widest text-cream uppercase">
            {{ config('fincun.site.brand') }}
        </span>
    </div>

    <div class="container-x relative z-10 space-y-16">
        <!-- Top Row: Brand & Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8">
            <!-- Brand Column (2 cols) -->
            <div class="lg:col-span-2 space-y-6">
                <a href="{{ route('home') }}" class="inline-block" aria-label="{{ config('fincun.site.brand') }} Home">
                    <img src="{{ asset('images/dacfin-logo-light.svg') }}" alt="{{ config('fincun.site.brand') }}" width="160" height="40" class="h-10 w-auto">
                </a>
                <p class="text-sm text-sand/70 max-w-sm leading-relaxed">
                    {{ config('fincun.site.tagline') }}
                </p>

                <!-- Badges: QR & Google Play -->
                <div class="flex items-center gap-4 pt-2">
                    <div class="p-2 bg-cream rounded-xl shadow-sm inline-block">
                        <img src="{{ asset('images/qr-code.svg') }}" alt="QR Code" width="56" height="56" class="w-14 h-14" loading="lazy">
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs text-mint font-semibold uppercase tracking-wider block">Get Our Client App</span>
                        <a href="{{ config('fincun.site.play_store') }}" target="_blank" rel="noopener noreferrer" class="inline-block transition-transform hover:scale-105">
                            <img src="{{ asset('images/google-play-badge.svg') }}" alt="Google Play" width="130" height="40" class="h-10 w-auto" loading="lazy">
                        </a>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="flex items-center gap-3 pt-2">
                    @foreach(config('fincun.site.social') as $soc)
                        <a 
                            href="{{ $soc['url'] }}" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="w-10 h-10 rounded-full bg-forest text-sand hover:text-saffron hover:bg-emerald/30 border border-emerald/20 flex items-center justify-center transition-all duration-200 hover:scale-110"
                            aria-label="{{ $soc['name'] }}"
                        >
                            @if(file_exists(public_path($soc['icon'])))
                                {!! file_get_contents(public_path($soc['icon'])) !!}
                            @else
                                <span class="text-xs">{{ substr($soc['name'], 0, 2) }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Services Column -->
            <div class="space-y-4">
                <h4 class="font-display font-semibold text-white text-base uppercase tracking-wider text-xs">
                    Services
                </h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(config('fincun.navigation.footer.services') as $srv)
                        <li>
                            <a href="{{ $srv[1] }}" class="text-white/80 hover:text-white transition-colors">
                                {{ $srv[0] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Quick Links Column -->
            <div class="space-y-4">
                <h4 class="font-display font-semibold text-white text-base uppercase tracking-wider text-xs">
                    Quick Links
                </h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(config('fincun.navigation.footer.quick') as $link)
                        <li>
                            <a href="{{ $link[1] }}" class="text-white/80 hover:text-white transition-colors">
                                {{ $link[0] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Get In Touch Column -->
            <div class="space-y-4">
                <h4 class="font-display font-semibold text-white text-base uppercase tracking-wider text-xs">
                    Get in Touch
                </h4>
                <div class="space-y-3 text-xs sm:text-sm">
                    @foreach(config('fincun.site.offices') as $office)
                        <div class="space-y-0.5">
                            <span class="font-bold text-white">{{ $office['city'] }} Office:</span>
                            <p class="text-white/90 whitespace-pre-line leading-relaxed">{{ $office['address'] }}</p>
                        </div>
                    @endforeach

                    <div class="pt-1 space-y-1.5">
                        <p><span class="text-white font-medium">Contact:</span> <span class="text-white font-semibold">{{ config('fincun.site.contact_person') }}</span></p>
                        <p><span class="text-white font-medium">Phone:</span> <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="text-white hover:text-white/80 font-bold underline underline-offset-2">{{ config('fincun.site.phones.0') }}</a></p>
                        <p><span class="text-white font-medium">WhatsApp:</span> <a href="{{ config('fincun.site.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="text-white hover:text-white/80 font-bold underline underline-offset-2">+91 {{ config('fincun.site.whatsapp') }}</a></p>
                        <p><span class="text-white font-medium">Email:</span> <a href="mailto:{{ config('fincun.site.email') }}" class="text-white hover:text-white/80 font-bold underline underline-offset-2">{{ config('fincun.site.email') }}</a></p>
                        <p><span class="text-white font-medium">Hours:</span> <span class="text-white">{{ config('fincun.site.hours') }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle Row: Bottom Links (Mutual Funds, Loans Against MF, NPS Registration, NPS Payments) -->
        <div class="pt-8 border-t border-emerald/15">
            <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3 text-xs text-white/80 font-medium">
                @foreach(config('fincun.navigation.footer.bottom_links') as $blink)
                    <a href="{{ $blink[1] }}" class="hover:text-white transition-colors" @if(str_starts_with($blink[1], 'http')) target="_blank" rel="noopener noreferrer" @endif>
                        {{ $blink[0] }}
                    </a>
                    @if(!$loop->last)
                        <span class="text-white/40 hidden sm:inline">&bull;</span>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Legal Disclaimer -->
        <div class="p-6 rounded-2xl bg-forest/40 border border-emerald/20 text-xs text-white/75 leading-relaxed text-justify space-y-2">
            <span class="font-bold text-mint uppercase tracking-wider block text-[10px]">Statutory Disclaimer</span>
            <p>{{ config('fincun.site.disclaimer') }}</p>
        </div>

        <!-- Bottom Line: Copyright, Directors, Back-to-top -->
        <div class="pt-6 border-t border-emerald/15 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-white/70">
            <div class="space-y-1 text-center md:text-left">
                <p>&copy; {{ date('Y') }} {{ config('fincun.site.name') }}. All rights reserved.</p>
                <p class="text-white/85">Directors: <span class="text-white font-medium">{{ implode(', ', config('fincun.site.directors')) }}</span></p>
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 pt-0.5 text-white/75">
                    @foreach(config('fincun.site.amfi') as $reg)
                        <span>{{ $reg }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Back to top button with scroll progress ring -->
            <button 
                type="button"
                @click="window.lenis ? window.lenis.scrollTo(0) : window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="group flex items-center gap-3 px-4 py-2 rounded-full bg-forest hover:bg-emerald/40 text-cream transition-all border border-emerald/25"
                aria-label="Back to top"
            >
                <span class="text-xs font-medium group-hover:text-saffron transition-colors">Back to top</span>
                <div class="relative w-7 h-7 flex items-center justify-center">
                    <svg class="w-7 h-7 -rotate-90" viewBox="0 0 36 36">
                        <circle cx="18" cy="18" r="14" fill="none" stroke="currentColor" stroke-width="2" class="text-emerald/30"/>
                        <circle id="scroll-ring" cx="18" cy="18" r="14" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="88" stroke-dashoffset="88" class="text-saffron transition-all duration-150"/>
                    </svg>
                    <svg class="w-3 h-3 absolute inset-auto text-cream group-hover:-translate-y-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </div>
            </button>
        </div>
    </div>
</footer>
