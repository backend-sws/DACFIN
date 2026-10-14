@php
    $why = config('fincun.home.why');
@endphp

<section id="why" class="py-16 sm:py-20 lg:py-24 bg-cream text-ink relative overflow-hidden border-t border-sand/60" data-why-section>
    <!-- Ambient Subtle Glows -->
    <div class="absolute top-1/4 -left-32 w-96 h-96 rounded-full bg-sand/30 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 rounded-full bg-ice-cyan/40 blur-[130px] pointer-events-none"></div>

    <div class="container-x space-y-8 sm:space-y-12 relative z-10">
        
        <!-- Header -->
        <div class="max-w-3xl space-y-2.5" data-why-header>
            <x-ui.section-title 
                :eyebrow="$why['eyebrow']" 
                :title="$why['title']" 
                :light="false" 
            />
            <p class="text-slate text-xs sm:text-sm md:text-base leading-relaxed pt-1">
                {{ $why['text'] }}
            </p>
        </div>

        <!-- 5 Principles Bento Grid + CTA Tile (Metallic Blue Cards with Luminous Sheen) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6" data-why-grid data-scroll-row>
            @foreach($why['items'] as $idx => $item)
                @php
                    $col = ($idx % 3 === 0) ? 'left' : (($idx % 3 === 1) ? 'center' : 'right');
                @endphp
                <div 
                    class="rounded-2xl sm:rounded-3xl p-5 sm:p-7 bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-2 transition-all duration-300 space-y-4 flex flex-col justify-between will-change-transform group relative overflow-hidden shadow-[0_12px_35px_rgba(15,40,90,0.22)]" 
                    data-why-card 
                    data-why-col="{{ $col }}"
                    data-scroll="{{ $col }}"
                    data-tilt
                >
                    <!-- Metallic Specular Edge Shine -->
                    <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                    <!-- Metallic Sheen Flare on Hover -->
                    <div class="absolute -right-16 -top-16 w-36 h-36 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                    <div class="flex items-center justify-between relative z-10">
                        <span class="font-mono text-xs font-bold text-white px-3 py-1 rounded-full bg-white/15 border border-white/25 shadow-xs backdrop-blur-sm group-hover:scale-105 group-hover:bg-white/25 transition-all">
                            0{{ $idx + 1 }}
                        </span>
                        <span class="text-[10px] font-mono tracking-widest text-[#93c5fd] uppercase font-semibold">
                            DACFIN Principle
                        </span>
                    </div>

                    <div class="space-y-2 my-auto relative z-10">
                        <h4 class="font-display font-bold text-base sm:text-lg text-white group-hover:text-[#bfdbfe] transition-colors leading-snug">
                            {{ $item[0] }}
                        </h4>
                        <p class="text-xs sm:text-[13px] text-[#dbeafe] leading-relaxed font-normal">
                            {{ $item[1] }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-white/15 flex items-center justify-between text-[11px] text-[#93c5fd] relative z-10">
                        <span class="flex items-center gap-1.5 text-[#bfdbfe] font-medium">
                            <span class="w-2 h-2 rounded-full bg-[#38bdf8] shadow-[0_0_10px_#38bdf8]"></span>
                            Transparent standard
                        </span>
                        <span class="font-mono text-white/50">
                            #0{{ $idx + 1 }}
                        </span>
                    </div>
                </div>
            @endforeach

            <!-- 6th Tile: Quick Callout (High-contrast Luxury Metallic Gold Card) -->
            <div 
                class="rounded-2xl sm:rounded-3xl p-5 sm:p-7 bg-gradient-to-br from-[#fbd672] via-[#f0be42] to-[#dfa124] text-[#0a1e42] space-y-4 flex flex-col justify-between hover:shadow-[0_20px_50px_rgba(245,190,66,0.45)] hover:-translate-y-2 transition-all duration-300 will-change-transform shadow-[0_12px_35px_rgba(240,190,66,0.3)] border border-amber-300/50 group relative overflow-hidden" 
                data-why-card 
                data-why-col="right"
            >
                <!-- Top Gold Specular Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-white/80 to-transparent pointer-events-none"></div>

                <div class="flex items-center justify-between relative z-10">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#0a1e42] px-2.5 py-1 rounded-full bg-white/40 border border-[#0a1e42]/15">
                        Client First
                    </span>
                    <span class="font-mono text-xs font-bold text-[#0a1e42]/85">
                        06 / 06
                    </span>
                </div>

                <div class="space-y-2 my-auto relative z-10">
                    <h4 class="font-display font-bold text-lg sm:text-xl text-[#0a1e42] leading-snug">
                        Ready to experience clear, jargon-free advisory?
                    </h4>
                    <p class="text-xs text-[#0a1e42]/90 leading-relaxed font-medium">
                        Schedule a one-on-one session with our Patna advisory team. Zero sales quotas, 100% fiduciary clarity.
                    </p>
                </div>

                <div class="pt-3 border-t border-[#0a1e42]/20 relative z-10">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0a1e42] underline uppercase tracking-wider group-hover:translate-x-1.5 transition-transform">
                        <span>Book a Conversation</span>
                        <span class="text-sm font-bold">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- 3 Approach Steps Bottom Bar (Metallic Blue Cards) -->
        <div class="pt-8 sm:pt-10 border-t border-sand/60">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5 sm:mb-6">
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-emerald block">Our Advisory Blueprint</span>
                    <h3 class="font-display text-lg sm:text-xl lg:text-2xl font-bold text-ink">The Three-Pillar Approach</h3>
                </div>
                <a 
                    href="{{ route('approach.show', 'alignment') }}" 
                    class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-sand bg-white hover:bg-ice-cyan/40 hover:border-emerald/40 text-ink hover:text-emerald text-xs font-bold tracking-wide transition-all duration-300 self-start sm:self-auto shadow-xs"
                >
                    <span>Explore Our Approach</span>
                    <svg class="w-4 h-4 text-emerald group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3.5 sm:gap-4" data-why-approach-grid>
                @foreach($why['approach'] as $app)
                    <a 
                        href="{{ $app[2] }}" 
                        class="group p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-[#1a3f85] via-[#14326b] to-[#0f244e] border border-[#3b82f6]/40 hover:border-[#93c5fd] hover:shadow-[0_12px_30px_rgba(26,63,133,0.3)] hover:-translate-y-1 transition-all flex items-center justify-between will-change-transform shadow-md relative overflow-hidden" 
                        data-why-approach-card
                    >
                        <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-[#60a5fa]/50 to-transparent pointer-events-none"></div>

                        <div class="flex items-center gap-3 relative z-10">
                            <span class="font-mono text-xs sm:text-sm font-bold text-[#fbbf24] group-hover:scale-110 transition-transform">
                                {{ $app[0] }}
                            </span>
                            <span class="font-display font-semibold text-xs sm:text-sm text-white group-hover:text-[#bfdbfe] transition-colors">
                                {{ $app[1] }}
                            </span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-[#93c5fd] group-hover:text-white group-hover:translate-x-1 transition-all shrink-0 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
