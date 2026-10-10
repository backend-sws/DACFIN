@php
    $strengths = config('fincun.home.strengths');
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-12 sm:space-y-16">
        
        <x-ui.section-title 
            :eyebrow="$strengths['eyebrow']" 
            :title="$strengths['title']" 
        />

        <!-- Bento Grid: 1 large intro card + 4 strength tiles -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-stagger>
            
            <!-- Large Tile (Intro Text & Mission Summary) -->
            <div class="lg:col-span-2 rounded-[2.5rem] bg-forest text-cream p-8 sm:p-12 border border-emerald/30 shadow-xl flex flex-col justify-between space-y-8 relative overflow-hidden" data-tilt>
                <div class="absolute -right-20 -bottom-20 w-72 h-72 rounded-full bg-saffron/10 blur-[80px] pointer-events-none"></div>

                <div class="space-y-4 max-w-xl">
                    <span class="text-xs uppercase font-bold tracking-widest text-mint">Foundational Principles</span>
                    <h3 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight text-cream">
                        Human Expertise Powered by Smart Technology.
                    </h3>
                    <p class="text-sand/80 text-sm sm:text-base leading-relaxed">
                        {{ $strengths['text'] }}
                    </p>
                </div>

                <div class="pt-4 flex items-center gap-6 border-t border-emerald/20 text-xs text-sand/60">
                    <div><span class="text-saffron font-bold text-sm block">100%</span> Client Alignment</div>
                    <div><span class="text-saffron font-bold text-sm block">2 Offices</span> Patna &amp; Ranchi</div>
                    <div><span class="text-saffron font-bold text-sm block">6 Days</span> Dedicated Advisory</div>
                </div>
            </div>

            <!-- Tile 1: Client-Centric Approach -->
            <x-ui.card class="bg-sand/30 border-sand hover:bg-white flex flex-col justify-between space-y-6" :tilt="true">
                <div class="w-12 h-12 rounded-2xl bg-emerald/15 text-emerald flex items-center justify-center font-bold text-lg">
                    01
                </div>
                <div class="space-y-2">
                    <h4 class="font-display font-bold text-xl text-ink">
                        {{ $strengths['items'][0][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate leading-relaxed">
                        {{ $strengths['items'][0][1] }}
                    </p>
                </div>
            </x-ui.card>

            <!-- Tile 2: Technology + Expertise -->
            <x-ui.card class="bg-sand/30 border-sand hover:bg-white flex flex-col justify-between space-y-6" :tilt="true">
                <div class="w-12 h-12 rounded-2xl bg-saffron/20 text-ink flex items-center justify-center font-bold text-lg">
                    02
                </div>
                <div class="space-y-2">
                    <h4 class="font-display font-bold text-xl text-ink">
                        {{ $strengths['items'][1][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate leading-relaxed">
                        {{ $strengths['items'][1][1] }}
                    </p>
                </div>
            </x-ui.card>

            <!-- Tile 3: Holistic Financial Solutions -->
            <x-ui.card class="bg-sand/30 border-sand hover:bg-white flex flex-col justify-between space-y-6" :tilt="true">
                <div class="w-12 h-12 rounded-2xl bg-forest/15 text-forest flex items-center justify-center font-bold text-lg">
                    03
                </div>
                <div class="space-y-2">
                    <h4 class="font-display font-bold text-xl text-ink">
                        {{ $strengths['items'][2][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate leading-relaxed">
                        {{ $strengths['items'][2][1] }}
                    </p>
                </div>
            </x-ui.card>

            <!-- Tile 4: Trusted Relationships -->
            <x-ui.card class="bg-sand/30 border-sand hover:bg-white flex flex-col justify-between space-y-6" :tilt="true">
                <div class="w-12 h-12 rounded-2xl bg-emerald/15 text-emerald flex items-center justify-center font-bold text-lg">
                    04
                </div>
                <div class="space-y-2">
                    <h4 class="font-display font-bold text-xl text-ink">
                        {{ $strengths['items'][3][0] }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate leading-relaxed">
                        {{ $strengths['items'][3][1] }}
                    </p>
                </div>
            </x-ui.card>

        </div>
    </div>
</section>
