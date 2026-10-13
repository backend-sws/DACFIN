@php
    $srvData = config('fincun.home.services');
@endphp

<section id="services" class="py-12 sm:py-16 lg:py-20 bg-cream text-ink relative overflow-hidden border-t border-sand/60" x-data="{ activeTab: 0 }">
    <!-- Ambient Subtle Glow -->
    <div class="absolute -top-32 right-1/4 w-96 h-96 rounded-full bg-ice-cyan/40 blur-[120px] pointer-events-none"></div>

    <div class="container-x relative z-10 space-y-6 sm:space-y-8">
        <div class="max-w-3xl" data-reveal="up">
            <x-ui.section-title 
                :eyebrow="$srvData['eyebrow']" 
                :title="$srvData['title']" 
                :light="false" 
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
                            ? 'bg-gradient-to-r from-[#1a3f85] via-[#132f66] to-[#0c1f44] text-white border-[#3b82f6]/60 shadow-lg ring-2 ring-[#60a5fa]/30 relative overflow-hidden' 
                            : 'bg-white border-sand/70 text-slate hover:bg-ice-cyan/40 hover:text-ink hover:border-emerald/40'"
                    >
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <span 
                                class="font-mono text-[10px] sm:text-[11px] font-bold px-2 py-0.5 rounded-md transition-colors"
                                :class="activeTab === {{ $idx }} ? 'bg-[#2563eb]/70 text-white border border-[#60a5fa]/50 font-bold shadow-xs' : 'bg-sand/30 text-slate group-hover:text-emerald group-hover:bg-ice-cyan'"
                            >
                                0{{ $idx + 1 }}
                            </span>
                            <span class="font-display font-semibold text-xs sm:text-sm leading-snug">
                                {{ $tab }}
                            </span>
                        </div>
                        <svg 
                            class="hidden lg:block w-4 h-4 shrink-0 transition-transform duration-300 ml-2"
                            :class="activeTab === {{ $idx }} ? 'text-white translate-x-1' : 'text-slate/40 opacity-0 group-hover:opacity-100'"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                @endforeach

                <div class="pt-1.5 hidden lg:block">
                    <a 
                        href="{{ route('services.show', 'financial-planing') }}" 
                        class="group inline-flex items-center justify-between w-full px-5 py-2.5 rounded-full border border-sand bg-white hover:bg-ice-cyan/40 hover:border-emerald/40 text-ink hover:text-emerald text-xs font-bold tracking-wide transition-all duration-300 shadow-xs"
                    >
                        <span>Explore All 6 Services</span>
                        <svg class="w-3.5 h-3.5 text-emerald group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right: Content Panel with Image and Checklist (8 cols) -->
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
                        class="rounded-2xl sm:rounded-3xl bg-gradient-to-br from-[#1a3f85] via-[#132f66] to-[#0c1f44] border border-[#3b82f6]/40 p-4 sm:p-7 space-y-4 sm:space-y-5 shadow-[0_15px_45px_rgba(21,50,102,0.25)] relative overflow-hidden text-white"
                        @if($idx > 0) style="display: none;" @endif
                    >
                        <!-- Metallic Specular Edge Shine -->
                        <div class="absolute inset-x-0 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#60a5fa]/70 to-transparent pointer-events-none"></div>
                        <div class="absolute -right-20 -top-20 w-48 h-48 bg-[#3b82f6]/20 rounded-full blur-2xl pointer-events-none"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 items-center relative z-10">
                            <div class="space-y-2">
                                <span class="text-[10px] uppercase font-bold tracking-widest text-[#93c5fd]">Service 0{{ $idx + 1 }}</span>
                                <h3 class="h-display text-lg sm:text-2xl lg:text-3xl font-bold text-white leading-snug">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-[#dbeafe] text-xs sm:text-sm leading-relaxed">
                                    {{ $item['text'] }}
                                </p>
                            </div>

                            <!-- Image Illustration -->
                            <div class="rounded-xl overflow-hidden border border-white/20 h-32 sm:h-44 md:aspect-[16/10] bg-white/5 flex items-center justify-center">
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
                        <div class="pt-3 sm:pt-4 border-t border-white/15 relative z-10">
                            <h4 class="text-[10px] uppercase font-bold tracking-widest text-[#93c5fd] mb-2.5">Key Deliverables</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-2.5">
                                @foreach($item['points'] as $point)
                                    <div class="flex items-center gap-2.5 p-2 sm:p-2.5 rounded-lg bg-white/10 border border-white/15">
                                        <div class="w-4 h-4 rounded-full bg-white/20 text-[#bfdbfe] flex items-center justify-center shrink-0 text-[10px] font-bold">
                                            ✓
                                        </div>
                                        <span class="text-xs text-[#dbeafe] font-medium leading-snug">{{ $point }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-1 flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2.5 relative z-10">
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
            <a 
                href="{{ route('services.show', 'financial-planing') }}" 
                class="group inline-flex items-center justify-between w-full px-5 py-2.5 rounded-full border border-sand bg-white hover:bg-ice-cyan/40 hover:border-emerald/40 text-ink hover:text-emerald text-xs font-bold tracking-wide transition-all duration-300 shadow-xs"
            >
                <span>Explore All 6 Services</span>
                <svg class="w-3.5 h-3.5 text-emerald group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
