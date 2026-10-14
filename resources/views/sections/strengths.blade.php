@php
    $strengths = config('fincun.home.strengths');
@endphp

<section class="section-y bg-cream overflow-hidden" data-strengths-section>
    <div class="container-x space-y-12 sm:space-y-16">
        
        <div data-strengths-header class="will-change-transform">
            <x-ui.section-title 
                :eyebrow="$strengths['eyebrow']" 
                :title="$strengths['title']" 
            />
        </div>

        <!-- Bento Grid: 1 large intro card + 4 strength tiles -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 items-stretch" data-strengths-grid data-scroll-row>
            
            <!-- Large Tile (Intro Text & Mission Summary - Row 1, 2 Columns) -->
            <div class="lg:col-span-2 rounded-3xl sm:rounded-[2.5rem] bg-white text-ink p-6 sm:p-8 lg:p-10 border border-sand/80 shadow-xl flex flex-col justify-between relative overflow-hidden will-change-transform h-full" data-tilt data-strengths-left data-scroll="left">
                <div class="absolute -right-20 -bottom-20 w-72 h-72 rounded-full bg-ice-cyan/60 blur-[80px] pointer-events-none"></div>

                <div class="space-y-3 sm:space-y-4 max-w-xl relative z-10">
                    <span class="text-xs uppercase font-bold tracking-widest text-emerald">Foundational Principles</span>
                    <h2 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight text-ink">
                        Human Expertise Powered by Smart Technology.
                    </h2>
                    <p class="text-slate text-sm sm:text-base leading-relaxed pt-1">
                        {{ $strengths['text'] }}
                    </p>
                </div>

                <div class="mt-8 pt-5 flex flex-wrap sm:flex-nowrap items-center gap-4 sm:gap-8 border-t border-sand/60 text-xs text-slate relative z-10">
                    <div>
                        <span class="text-emerald font-bold text-base block font-display">100%</span>
                        <span class="text-slate/80">Client Alignment</span>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-sand/80"></div>
                    <div>
                        <span class="text-emerald font-bold text-base block font-display">2 Offices</span>
                        <span class="text-slate/80">Patna &amp; Ranchi</span>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-sand/80"></div>
                    <div>
                        <span class="text-emerald font-bold text-base block font-display">6 Days</span>
                        <span class="text-slate/80">Dedicated Advisory</span>
                    </div>
                </div>
            </div>

            <!-- Tile 01: Client-Centric Approach (Row 1, 1 Column) -->
            <div 
                class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 lg:p-8 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden text-white will-change-transform h-full min-h-[260px]" 
                data-tilt 
                data-strengths-right 
                data-scroll="right"
            >
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-36 h-36 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="flex items-center justify-between relative z-10 mb-6">
                    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-base sm:text-lg shadow-sm group-hover:scale-105 transition-all duration-300">
                        01
                    </div>
                    <span class="text-[10px] font-mono tracking-widest text-[#93c5fd] uppercase font-semibold">
                        Core Strength
                    </span>
                </div>

                <div class="mt-auto pt-4 space-y-2 relative z-10">
                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-[#bfdbfe] transition-colors leading-snug">
                        {{ $strengths['items'][0][0] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][0][1] }}
                    </p>
                </div>
            </div>

            <!-- Tile 02: Technology + Expertise (Row 2, Column 1) -->
            <div 
                class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 lg:p-8 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden text-white will-change-transform h-full min-h-[250px]" 
                data-tilt 
                data-strengths-left 
                data-scroll="left"
            >
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-36 h-36 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="flex items-center justify-between relative z-10 mb-6">
                    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-base sm:text-lg shadow-sm group-hover:scale-105 transition-all duration-300">
                        02
                    </div>
                    <span class="text-[10px] font-mono tracking-widest text-[#93c5fd] uppercase font-semibold">
                        Core Strength
                    </span>
                </div>

                <div class="space-y-2 relative z-10">
                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-[#bfdbfe] transition-colors leading-snug">
                        {{ $strengths['items'][1][0] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][1][1] }}
                    </p>
                </div>
            </div>

            <!-- Tile 03: Holistic Financial Solutions (Row 2, Column 2) -->
            <div 
                class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 lg:p-8 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden text-white will-change-transform h-full min-h-[250px]" 
                data-tilt 
                data-strengths-center 
                data-scroll="center"
            >
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-36 h-36 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="flex items-center justify-between relative z-10 mb-6">
                    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-base sm:text-lg shadow-sm group-hover:scale-105 transition-all duration-300">
                        03
                    </div>
                    <span class="text-[10px] font-mono tracking-widest text-[#93c5fd] uppercase font-semibold">
                        Core Strength
                    </span>
                </div>

                <div class="space-y-2 relative z-10">
                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-[#bfdbfe] transition-colors leading-snug">
                        {{ $strengths['items'][2][0] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][2][1] }}
                    </p>
                </div>
            </div>

            <!-- Tile 04: Trusted Relationships (Row 2, Column 3) -->
            <div 
                class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 lg:p-8 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden text-white will-change-transform h-full min-h-[250px]" 
                data-tilt 
                data-strengths-right 
                data-scroll="right"
            >
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-36 h-36 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="flex items-center justify-between relative z-10 mb-6">
                    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-base sm:text-lg shadow-sm group-hover:scale-105 transition-all duration-300">
                        04
                    </div>
                    <span class="text-[10px] font-mono tracking-widest text-[#93c5fd] uppercase font-semibold">
                        Core Strength
                    </span>
                </div>

                <div class="space-y-2 relative z-10">
                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-[#bfdbfe] transition-colors leading-snug">
                        {{ $strengths['items'][3][0] }}
                    </h3>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][3][1] }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
