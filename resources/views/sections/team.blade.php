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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 max-w-6xl gap-6 items-start" data-stagger>
            @foreach($team['members'] as $member)
                <div x-data="{ open: false }" class="group relative rounded-3xl overflow-hidden bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 hover:border-[#93c5fd] shadow-[0_12px_35px_rgba(15,40,90,0.22)] hover:shadow-[0_20px_50px_rgba(26,63,133,0.38)] hover:-translate-y-1 transition-all duration-300 flex flex-col text-white h-fit" data-tilt>
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
                            class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500"
                            loading="lazy"
                        >
                    </div>

                    <!-- Meta text -->
                    <div class="p-5 space-y-2 relative z-10 flex-1 flex flex-col justify-start">
                        <div class="space-y-1">
                            <h4 class="font-display font-bold text-base text-white group-hover:text-[#bfdbfe] transition-colors">
                                {{ $member[0] }}
                            </h4>
                            <p class="text-xs text-[#dbeafe] font-medium leading-snug">
                                {{ $member[1] }}
                            </p>
                        </div>

                        @if(!empty($member[4]))
                            <div>
                                <button 
                                    type="button" 
                                    @click="open = !open" 
                                    class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-[#93c5fd] hover:text-white transition-colors pt-1 cursor-pointer focus:outline-none select-none"
                                >
                                    <span x-text="open ? 'View Less' : 'View Description'"></span>
                                    <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>

                            <div 
                                x-show="open" 
                                x-cloak
                                x-transition:enter="transition-all ease-out duration-250"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition-all ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-1"
                            >
                                <p class="text-[11px] sm:text-xs text-[#dbeafe]/85 leading-relaxed pt-2.5 border-t border-white/10 mt-1">
                                    {{ $member[4] }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
