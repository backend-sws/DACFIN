@php
    $team = config('fincun.home.team');
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-12 sm:space-y-16">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <x-ui.section-title 
                :eyebrow="$team['eyebrow']" 
                :title="$team['title']" 
            />

            <div>
                <x-ui.button :href="route('team')" variant="ghost" class="text-xs">
                    View Full Team &rarr;
                </x-ui.button>
            </div>
        </div>

        <p class="text-slate text-base sm:text-lg max-w-2xl leading-relaxed">
            {{ $team['text'] }}
        </p>

        <!-- Team Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 max-w-3xl gap-6" data-stagger>
            @foreach($team['members'] as $member)
                <div class="group relative rounded-3xl overflow-hidden bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col text-white" data-tilt>
                    <!-- Metallic Specular Edge Shine -->
                    <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none z-10"></div>
                    <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#3b82f6]/20 rounded-full blur-2xl pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>

                    <!-- Avatar Image -->
                    <div class="aspect-[4/5] bg-[#0c1f44] overflow-hidden relative">
                        <img 
                            src="{{ asset($member[2]) }}" 
                            alt="{{ $member[0] }}" 
                            width="320" 
                            height="380" 
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500"
                            loading="lazy"
                        >
                    </div>

                    <!-- Meta text -->
                    <div class="p-5 space-y-1 relative z-10">
                        <h4 class="font-display font-bold text-base text-white group-hover:text-[#bfdbfe] transition-colors">
                            {{ $member[0] }}
                        </h4>
                        <p class="text-xs text-[#dbeafe] font-medium leading-snug">
                            {{ $member[1] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
