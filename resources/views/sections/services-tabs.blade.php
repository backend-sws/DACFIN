@php
    $srvData = config('fincun.home.services');
@endphp

<section id="services" class="section-y bg-ink text-cream relative overflow-hidden" x-data="{ activeTab: 0 }">
    <!-- Ambient Glow -->
    <div class="absolute -top-32 right-1/4 w-96 h-96 rounded-full bg-emerald/15 blur-[120px] pointer-events-none"></div>

    <div class="container-x relative z-10 space-y-12 sm:space-y-16">
        <div class="max-w-3xl">
            <x-ui.section-title 
                :eyebrow="$srvData['eyebrow']" 
                :title="$srvData['title']" 
                :light="true" 
            />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left: Tab Buttons (4 cols) -->
            <div class="lg:col-span-4 flex flex-col gap-3">
                @foreach($srvData['tabs'] as $idx => $tab)
                    <button 
                        type="button" 
                        @click="activeTab = {{ $idx }}"
                        class="text-left p-5 sm:p-6 rounded-2xl sm:rounded-3xl transition-all duration-300 border flex items-center justify-between group focus:outline-none"
                        :class="activeTab === {{ $idx }} 
                            ? 'bg-forest border-saffron shadow-lg text-cream' 
                            : 'bg-forest/30 border-emerald/15 text-sand/70 hover:bg-forest/60 hover:text-cream'"
                    >
                        <div class="flex items-center gap-4">
                            <span 
                                class="font-mono text-xs font-bold px-2.5 py-1 rounded-lg transition-colors"
                                :class="activeTab === {{ $idx }} ? 'bg-saffron text-ink' : 'bg-ink text-sand/60 group-hover:text-mint'"
                            >
                                0{{ $idx + 1 }}
                            </span>
                            <span class="font-display font-semibold text-sm sm:text-base leading-snug">
                                {{ $tab }}
                            </span>
                        </div>
                        <svg 
                            class="w-5 h-5 shrink-0 transition-transform duration-300"
                            :class="activeTab === {{ $idx }} ? 'text-saffron translate-x-1' : 'text-sand/40 opacity-0 group-hover:opacity-100'"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                @endforeach

                <div class="pt-4">
                    <x-ui.button :href="route('services.show', 'financial-planing')" variant="ghost" class="text-mint border-emerald/30 hover:bg-forest w-full justify-between">
                        <span>Explore All 6 Services</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </x-ui.button>
                </div>
            </div>

            <!-- Right: Content Panel with Image and Checklist (8 cols) -->
            <div class="lg:col-span-8">
                @foreach($srvData['items'] as $idx => $item)
                    <div 
                        x-show="activeTab === {{ $idx }}"
                        x-transition:enter="transition ease-out duration-400"
                        x-transition:enter-start="opacity-0 translate-y-4 scale-98"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-200 absolute"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-98"
                        class="rounded-[2.5rem] bg-forest/50 border border-emerald/30 p-8 sm:p-10 lg:p-12 space-y-8 backdrop-blur-xl"
                        @if($idx > 0) style="display: none;" @endif
                    >
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div class="space-y-4">
                                <span class="text-xs uppercase font-bold tracking-widest text-mint">Service 0{{ $idx + 1 }}</span>
                                <h3 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold text-cream">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-sand/80 text-sm sm:text-base leading-relaxed">
                                    {{ $item['text'] }}
                                </p>
                            </div>

                            <!-- Image Illustration -->
                            <div class="rounded-2xl overflow-hidden border border-emerald/20 aspect-video md:aspect-[4/3] bg-ink flex items-center justify-center">
                                <img 
                                    src="{{ asset($item['image']) }}" 
                                    alt="{{ $item['alt'] }}" 
                                    width="450" 
                                    height="340" 
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                            </div>
                        </div>

                        <!-- Checklist -->
                        <div class="pt-6 border-t border-emerald/20">
                            <h4 class="text-xs uppercase font-bold tracking-widest text-saffron mb-4">Key Deliverables</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                @foreach($item['points'] as $point)
                                    <div class="flex items-start gap-3 p-3 rounded-xl bg-ink/40 border border-emerald/15">
                                        <div class="w-5 h-5 rounded-full bg-emerald/20 text-mint flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">
                                            ✓
                                        </div>
                                        <span class="text-xs sm:text-sm text-sand/90 font-medium">{{ $point }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-2 flex items-center justify-end">
                            <x-ui.button :href="route('contact')" variant="primary" class="text-xs px-6 py-3">
                                Get Started with Consultation
                            </x-ui.button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
