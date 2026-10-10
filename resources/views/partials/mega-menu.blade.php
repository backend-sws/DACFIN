<div 
    x-show="openDropdown === '{{ $item['label'] }}'"
    x-transition:enter="transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]"
    x-transition:enter-start="opacity-0 -translate-y-2 scale-[0.96]"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition-all duration-150 ease-in"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 -translate-y-2 scale-[0.97]"
    @click.away="openDropdown = null"
    class="absolute top-full left-1/2 -translate-x-1/2 pt-3 w-[840px] max-w-[92vw] z-50 pointer-events-auto"
    style="display: none;"
>
    <div class="relative bg-ink/95 backdrop-blur-2xl border border-emerald/30 rounded-3xl p-6 shadow-[0_30px_90px_-15px_rgba(0,0,0,0.7),0_0_0_1px_rgba(31,138,112,0.2)] text-cream overflow-hidden">
        <!-- Luminous Top Accent Line -->
        <div class="absolute top-0 inset-x-12 h-[2px] bg-gradient-to-r from-transparent via-mint/60 to-transparent"></div>
        
        <!-- Ambient Radial Glows -->
        <div class="absolute -top-24 -left-24 w-52 h-52 bg-emerald/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-52 h-52 bg-saffron/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header Row -->
        <div class="relative flex items-center justify-between pb-4 mb-4 border-b border-emerald/20">
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-1 rounded-full bg-emerald/20 border border-emerald/30 text-[10px] uppercase font-bold tracking-widest text-mint">
                    {{ $item['eyebrow'] ?? 'Advisory Expertise' }}
                </span>
                <p class="text-xs text-sand/70 hidden sm:block">
                    {{ $item['desc'] ?? 'Comprehensive wealth planning & institutional asset allocation' }}
                </p>
            </div>
            <a href="{{ route('contact') }}" class="group text-xs text-saffron font-semibold hover:text-cream transition-colors flex items-center gap-1.5 shrink-0">
                <span>Free Portfolio Review</span>
                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- 2-Column Content Layout (Left: Grid of 6 Services, Right: Spotlight Card) -->
        <div class="relative grid grid-cols-12 gap-5">
            <!-- Left: 6 Service Cards -->
            <div class="col-span-12 lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                @foreach($item['children'] as $child)
                    <a 
                        href="{{ $child['url'] }}" 
                        class="group p-3 rounded-2xl hover:bg-forest/60 transition-all duration-200 border border-transparent hover:border-emerald/30 flex items-start gap-3 relative overflow-hidden"
                    >
                        <!-- Icon Badge with Spring Hover -->
                        <div class="w-9 h-9 rounded-xl bg-forest/80 border border-emerald/25 flex items-center justify-center shrink-0 text-mint group-hover:scale-110 group-hover:bg-saffron group-hover:text-ink group-hover:border-saffron group-hover:shadow-[0_0_15px_rgba(242,169,59,0.4)] transition-all duration-300">
                            <x-ui.icon :name="$child['icon'] ?? 'chart'" class="w-4 h-4" />
                        </div>

                        <!-- Content -->
                        <div class="min-w-0 flex-1">
                            <div class="font-display font-semibold text-xs xl:text-sm text-cream group-hover:text-saffron transition-colors flex items-center justify-between">
                                <span class="truncate">{{ $child['label'] }}</span>
                                <svg class="w-3 h-3 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200 text-saffron shrink-0 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                            @if(!empty($child['desc']))
                                <p class="text-[11px] text-sand/65 line-clamp-1 mt-0.5 leading-snug group-hover:text-sand/90 transition-colors">
                                    {{ $child['desc'] }}
                                </p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Right: Spotlight Card -->
            <div class="col-span-12 lg:col-span-4 flex flex-col">
                <div class="h-full rounded-2xl bg-gradient-to-br from-forest/80 via-forest/40 to-ink/90 border border-emerald/30 p-4 sm:p-5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-emerald/20 rounded-full blur-2xl group-hover:scale-125 transition-transform duration-500"></div>

                    <div class="space-y-2 relative">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald/30 text-mint border border-emerald/40 text-[10px] font-bold uppercase tracking-wider">
                            <span class="w-1.5 h-1.5 rounded-full bg-mint animate-pulse"></span>
                            {{ $item['spotlight']['tag'] ?? 'Fiduciary' }}
                        </span>
                        <h4 class="font-display font-semibold text-sm text-cream leading-snug pt-1">
                            {{ $item['spotlight']['title'] ?? 'Personalized Wealth Blueprint' }}
                        </h4>
                        <p class="text-xs text-sand/70 leading-relaxed">
                            {{ $item['spotlight']['desc'] ?? 'Sit down with our advisors to map out your goals with zero product quotas.' }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-emerald/20 mt-4 space-y-3 relative">
                        <div class="flex items-baseline justify-between text-xs">
                            <span class="font-display font-bold text-saffron text-sm">
                                {{ $item['spotlight']['stat'] ?? '₹500Cr+' }}
                            </span>
                            <span class="text-[10px] text-sand/60">
                                {{ $item['spotlight']['stat_label'] ?? 'AUM Advised' }}
                            </span>
                        </div>
                        <a 
                            href="{{ $item['spotlight']['url'] ?? route('contact') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-saffron hover:bg-saffron/90 text-ink text-xs font-semibold tracking-wide shadow-md transition-all duration-200 hover:scale-[1.02]"
                        >
                            <span>{{ $item['spotlight']['cta'] ?? 'Book Free Call' }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
