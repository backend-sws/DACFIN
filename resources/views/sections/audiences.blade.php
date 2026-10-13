@php
    $aud = config('fincun.home.audiences');
@endphp

<section class="section-y bg-cream text-ink relative overflow-hidden border-t border-sand/60" data-pin-x>
    <div class="container-x mb-10 sm:mb-14 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <x-ui.section-title 
            :eyebrow="$aud['eyebrow']" 
            :title="$aud['title']" 
            :light="false" 
        />

        <a 
            href="{{ $aud['all_link'][1] }}" 
            class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-sand bg-white hover:bg-ice-cyan/40 hover:border-emerald/40 text-ink hover:text-emerald text-xs font-bold tracking-wide transition-all duration-300 shadow-xs"
        >
            <span>{{ $aud['all_link'][0] }}</span>
            <svg class="w-4 h-4 text-emerald group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </a>
    </div>

    <!-- Pinned Horizontal Scroll Wrapper for Desktop, Snap Swipe for Mobile -->
    <div class="horizontal-scroll-container overflow-x-auto lg:overflow-visible pb-6 sm:pb-8 lg:pb-0 px-4 sm:px-8 scrollbar-none snap-x snap-mandatory">
        <div class="horizontal-scroll-track flex lg:inline-flex gap-4 sm:gap-6 min-w-max lg:min-w-0 lg:flex-nowrap">
            @foreach($aud['items'] as $idx => $item)
                <div class="w-[82vw] max-w-[320px] sm:w-80 shrink-0 snap-center rounded-3xl sm:rounded-[2.5rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 p-6 sm:p-8 flex flex-col justify-between space-y-8 sm:space-y-12 hover:border-[#93c5fd] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] transition-all duration-300 group shadow-[0_12px_35px_rgba(15,40,90,0.22)] relative overflow-hidden" data-tilt>
                    
                    <!-- Metallic Specular Edge Shine -->
                    <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                    <div class="absolute -right-16 -top-16 w-36 h-36 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                    <div class="flex items-center justify-between relative z-10">
                        <span class="font-mono text-xs font-bold text-white px-3 py-1 rounded-full bg-white/15 border border-white/25 shadow-xs backdrop-blur-sm group-hover:scale-105 group-hover:bg-white/25 transition-all">
                            0{{ $idx + 1 }}
                        </span>
                        <div class="w-8 h-8 rounded-full bg-white/15 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            &rarr;
                        </div>
                    </div>

                    <div class="space-y-3 relative z-10">
                        <h4 class="font-display font-bold text-2xl text-white group-hover:text-[#bfdbfe] transition-colors">
                            {{ $item[0] }}
                        </h4>
                        <p class="text-sm text-[#dbeafe] leading-relaxed">
                            {{ $item[1] }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-white/15 relative z-10">
                        <a href="{{ $item[2] }}" class="text-xs font-semibold text-[#93c5fd] group-hover:text-white flex items-center gap-1.5 transition-colors">
                            <span>Learn more</span>
                            <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
