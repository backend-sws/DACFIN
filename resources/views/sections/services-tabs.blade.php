@php
    $srvData = config('fincun.home.services');
@endphp

<section id="services" class="py-12 sm:py-16 lg:py-20 bg-ink text-cream relative overflow-hidden" x-data="{ activeTab: 0 }">
    <!-- Ambient Glow -->
    <div class="absolute -top-32 right-1/4 w-96 h-96 rounded-full bg-emerald/15 blur-[120px] pointer-events-none"></div>

    <div class="container-x relative z-10 space-y-6 sm:space-y-8">
        <div class="max-w-3xl" data-reveal="up">
            <x-ui.section-title 
                :eyebrow="$srvData['eyebrow']" 
                :title="$srvData['title']" 
                :light="true" 
            />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- Left: Tab Buttons (4 cols on lg, horizontal swipeable pill bar on mobile) -->
            <div class="lg:col-span-4 flex flex-row lg:flex-col overflow-x-auto lg:overflow-visible gap-2 lg:gap-2.5 pb-2 lg:pb-0 scrollbar-none" data-stagger-left>
                @foreach($srvData['tabs'] as $idx => $tab)
                    <button 
                        type="button" 
                        @click="activeTab = {{ $idx }}"
                        class="text-left shrink-0 lg:shrink whitespace-nowrap lg:whitespace-normal px-3.5 py-2.5 sm:px-4 sm:py-3.5 lg:p-4 rounded-xl sm:rounded-2xl transition-all duration-300 border flex items-center justify-between group focus:outline-none"
                        :class="activeTab === {{ $idx }} 
                            ? 'bg-forest border-saffron shadow-md text-cream ring-1 ring-saffron/40' 
                            : 'bg-forest/30 border-emerald/15 text-sand/70 hover:bg-forest/60 hover:text-cream'"
                    >
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <span 
                                class="font-mono text-[10px] sm:text-[11px] font-bold px-2 py-0.5 rounded-md transition-colors"
                                :class="activeTab === {{ $idx }} ? 'bg-saffron text-ink' : 'bg-ink text-sand/60 group-hover:text-mint'"
                            >
                                0{{ $idx + 1 }}
                            </span>
                            <span class="font-display font-semibold text-xs sm:text-sm leading-snug">
                                {{ $tab }}
                            </span>
                        </div>
                        <svg 
                            class="hidden lg:block w-4 h-4 shrink-0 transition-transform duration-300 ml-2"
                            :class="activeTab === {{ $idx }} ? 'text-saffron translate-x-1' : 'text-sand/40 opacity-0 group-hover:opacity-100'"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                @endforeach

                <div class="pt-1.5 hidden lg:block">
                    <x-ui.button :href="route('services.show', 'financial-planing')" variant="ghost" class="text-mint border-emerald/30 hover:bg-forest w-full justify-between py-2 text-xs">
                        <span>Explore All 6 Services</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </x-ui.button>
                </div>
            </div>

            <!-- Right: Content Panel with Image and Checklist (8 cols) - Slides in from the RIGHT -->
            <div class="lg:col-span-8" data-reveal="from-right">
                @foreach($srvData['items'] as $idx => $item)
                    <div 
                        x-show="activeTab === {{ $idx }}"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-3 scale-98"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-200 absolute"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-98"
                        class="rounded-2xl sm:rounded-3xl bg-forest/50 border border-emerald/30 p-4 sm:p-7 space-y-4 sm:space-y-5 backdrop-blur-xl"
                        @if($idx > 0) style="display: none;" @endif
                    >
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 items-center">
                            <div class="space-y-2">
                                <span class="text-[10px] uppercase font-bold tracking-widest text-mint">Service 0{{ $idx + 1 }}</span>
                                <h3 class="h-display text-lg sm:text-2xl lg:text-3xl font-bold text-cream leading-snug">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-sand/80 text-xs sm:text-sm leading-relaxed">
                                    {{ $item['text'] }}
                                </p>
                            </div>

                            <!-- Image Illustration -->
                            <div class="rounded-xl overflow-hidden border border-emerald/20 h-32 sm:h-44 md:aspect-[16/10] bg-ink flex items-center justify-center">
                                <img 
                                    src="{{ asset($item['image']) }}" 
                                    alt="{{ $item['alt'] }}" 
                                    width="420" 
                                    height="260" 
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                            </div>
                        </div>

                        <!-- Checklist -->
                        <div class="pt-3 sm:pt-4 border-t border-emerald/20">
                            <h4 class="text-[10px] uppercase font-bold tracking-widest text-saffron mb-2.5">Key Deliverables</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-2.5">
                                @foreach($item['points'] as $point)
                                    <div class="flex items-center gap-2.5 p-2 sm:p-2.5 rounded-lg bg-ink/40 border border-emerald/15">
                                        <div class="w-4 h-4 rounded-full bg-emerald/20 text-mint flex items-center justify-center shrink-0 text-[10px] font-bold">
                                            ✓
                                        </div>
                                        <span class="text-xs text-sand/90 font-medium leading-snug">{{ $point }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-1 flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2.5">
                            <x-ui.button :href="route('contact')" variant="primary" class="text-xs px-5 py-2.5 w-full sm:w-auto text-center justify-center">
                                Get Started with Consultation
                            </x-ui.button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Mobile Explore Button Below Panel -->
        <div class="lg:hidden pt-1 text-center">
            <x-ui.button :href="route('services.show', 'financial-planing')" variant="ghost" class="text-mint border-emerald/30 hover:bg-forest w-full justify-between py-2.5 text-xs">
                <span>Explore All 6 Services</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </x-ui.button>
        </div>
    </div>
</section>
