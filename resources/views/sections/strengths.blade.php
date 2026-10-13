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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" data-strengths-grid>
            
            <!-- Large Tile (Intro Text & Mission Summary) -->
            <div class="lg:col-span-2 rounded-3xl sm:rounded-[2.5rem] bg-white text-ink p-6 sm:p-10 lg:p-12 border border-sand/80 shadow-xl flex flex-col justify-between space-y-6 sm:space-y-8 relative overflow-hidden will-change-transform" data-tilt data-strengths-left>
                <div class="absolute -right-20 -bottom-20 w-72 h-72 rounded-full bg-ice-cyan/60 blur-[80px] pointer-events-none"></div>

                <div class="space-y-4 max-w-xl">
                    <span class="text-xs uppercase font-bold tracking-widest text-emerald">Foundational Principles</span>
                    <h3 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight text-ink">
                        Human Expertise Powered by Smart Technology.
                    </h3>
                    <p class="text-slate text-sm sm:text-base leading-relaxed">
                        {{ $strengths['text'] }}
                    </p>
                </div>

                <div class="pt-4 flex flex-wrap sm:flex-nowrap items-center gap-3.5 sm:gap-6 border-t border-sand/60 text-xs text-slate">
                    <div><span class="text-emerald font-bold text-sm block">100%</span> Client Alignment</div>
                    <div><span class="text-emerald font-bold text-sm block">2 Offices</span> Patna &amp; Ranchi</div>
                    <div><span class="text-emerald font-bold text-sm block">6 Days</span> Dedicated Advisory</div>
                </div>
            </div>

            <!-- Tile 1: Client-Centric Approach (Side Box Right) -->
            <div class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between space-y-6 overflow-hidden text-white will-change-transform" data-tilt data-strengths-right>
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-lg shadow-sm group-hover:scale-110 group-hover:from-saffron group-hover:to-amber-500 transition-all duration-300 relative z-10">
                    01
                </div>
                <div class="space-y-2 relative z-10">
                    <h4 class="font-display font-bold text-xl text-white group-hover:text-[#bfdbfe] transition-colors">
                        {{ $strengths['items'][0][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][0][1] }}
                    </p>
                </div>
            </div>

            <!-- Tile 2: Technology + Expertise (Left Box) -->
            <div class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-saffron shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between space-y-6 overflow-hidden text-white will-change-transform" data-tilt data-strengths-left>
                <!-- Metallic Specular Edge Shine (Gold Accent) -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-saffron/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-saffron/20 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-saffron to-amber-600 border border-saffron/50 text-white flex items-center justify-center font-bold text-lg shadow-sm group-hover:scale-110 transition-all duration-300 relative z-10">
                    02
                </div>
                <div class="space-y-2 relative z-10">
                    <h4 class="font-display font-bold text-xl text-white group-hover:text-amber-200 transition-colors">
                        {{ $strengths['items'][1][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][1][1] }}
                    </p>
                </div>
            </div>

            <!-- Tile 3: Holistic Financial Solutions (Center Box) -->
            <div class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between space-y-6 overflow-hidden text-white will-change-transform" data-tilt data-strengths-center>
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-lg shadow-sm group-hover:scale-110 group-hover:from-saffron group-hover:to-amber-500 transition-all duration-300 relative z-10">
                    03
                </div>
                <div class="space-y-2 relative z-10">
                    <h4 class="font-display font-bold text-xl text-white group-hover:text-[#bfdbfe] transition-colors">
                        {{ $strengths['items'][2][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][2][1] }}
                    </p>
                </div>
            </div>

            <!-- Tile 4: Trusted Relationships (Side Box Right) -->
            <div class="group relative rounded-3xl sm:rounded-[2rem] bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] p-6 sm:p-7 shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between space-y-6 overflow-hidden text-white will-change-transform" data-tilt data-strengths-right>
                <!-- Metallic Specular Edge Shine -->
                <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                <!-- Ambient Flare -->
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#3b82f6]/25 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#2563eb] to-[#1d4ed8] border border-[#60a5fa]/50 text-white flex items-center justify-center font-bold text-lg shadow-sm group-hover:scale-110 group-hover:from-saffron group-hover:to-amber-500 transition-all duration-300 relative z-10">
                    04
                </div>
                <div class="space-y-2 relative z-10">
                    <h4 class="font-display font-bold text-xl text-white group-hover:text-[#bfdbfe] transition-colors">
                        {{ $strengths['items'][3][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-[#dbeafe] leading-relaxed">
                        {{ $strengths['items'][3][1] }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
