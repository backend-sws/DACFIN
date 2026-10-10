@php
    $catalog = config('fincun.home.catalog') ?? [
        'eyebrow' => 'Offerings Catalog',
        'title' => 'Explore Tailored Financial Solutions',
        'tabs' => ['All Services', 'Financial Planning', 'Investment Advise', 'Wealth Management', 'Loans & NPS'],
        'items' => [],
    ];
    $tabs = $catalog['tabs'] ?? ['All Services', 'Financial Planning', 'Investment Advise', 'Wealth Management', 'Loans & NPS'];
    $items = $catalog['items'] ?? [];
@endphp

<section class="section-y bg-cream overflow-hidden" x-data="{ 
    activeTab: 'All Services',
    currentPage: 0,
    items: {{ Js::from($items) }},
    get filteredItems() {
        if (this.activeTab === 'All Services') return this.items;
        return this.items.filter(item => item.category === this.activeTab);
    }
}">
    <div class="container-x space-y-8 sm:space-y-12">
        
        <!-- Header Row with Filter Tabs on Left and Navigation Arrows on Right -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-2 border-b border-sand/40">
            <!-- Filter Tabs Pills -->
            <div class="flex flex-wrap items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                @foreach($tabs as $tab)
                    <button
                        type="button"
                        @click="activeTab = '{{ $tab }}'; currentPage = 0"
                        class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold tracking-wide transition-all duration-200 focus:outline-none"
                        :class="activeTab === '{{ $tab }}' 
                            ? 'bg-ink text-cream shadow-md' 
                            : 'bg-sand/30 hover:bg-sand/60 text-slate hover:text-ink'"
                    >
                        {{ $tab }}
                    </button>
                @endforeach
            </div>

            <!-- Carousel Controls on Right -->
            <div class="hidden sm:flex items-center gap-2 shrink-0">
                <button 
                    type="button"
                    @click="currentPage = Math.max(0, currentPage - 1)"
                    class="w-10 h-10 rounded-full border border-sand hover:border-emerald flex items-center justify-center text-ink hover:text-emerald transition-colors"
                    aria-label="Previous page"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button 
                    type="button"
                    @click="currentPage = currentPage + 1"
                    class="w-10 h-10 rounded-full border border-sand hover:border-emerald flex items-center justify-center text-ink hover:text-emerald transition-colors"
                    aria-label="Next page"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- 3 Cards Grid (Desktop: 3 in a row, Mobile: 1 stacked) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8" data-stagger>
            <template x-for="(item, index) in filteredItems" :key="item.title">
                <div 
                    class="group rounded-3xl bg-white border border-sand/60 hover:border-emerald/40 p-4 sm:p-5 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden"
                    data-tilt
                >
                    <!-- Top Visual Image Container -->
                    <div class="w-full aspect-[4/3] rounded-2xl bg-forest/10 border border-sand/40 overflow-hidden relative flex items-center justify-center p-3">
                        <img 
                            :src="item.image" 
                            :alt="item.title"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                        <!-- Top Category Tag -->
                        <span 
                            class="absolute top-3 left-3 px-3 py-1 rounded-full bg-ink/80 backdrop-blur-md text-mint text-[11px] font-semibold tracking-wide"
                            x-text="item.tag"
                        ></span>
                    </div>

                    <!-- Middle Content -->
                    <div class="py-4 space-y-2 flex-1">
                        <h3 class="font-display font-bold text-lg text-ink group-hover:text-emerald transition-colors" x-text="item.title"></h3>
                        <p class="text-xs text-slate line-clamp-2 leading-relaxed" x-text="item.desc"></p>
                    </div>

                    <!-- Bottom Row: Price / Key Metric + Pill Button -->
                    <div class="pt-3 border-t border-sand/40 flex items-center justify-between">
                        <div>
                            <span class="block text-sm font-bold font-display text-ink" x-text="item.metric"></span>
                            <span class="text-[10px] text-slate/80 uppercase tracking-wider" x-text="item.metric_label"></span>
                        </div>

                        <a 
                            :href="item.url" 
                            class="px-4 py-2 rounded-full bg-ink hover:bg-forest text-cream text-xs font-semibold tracking-wide transition-all group-hover:bg-saffron group-hover:text-ink flex items-center gap-1.5"
                        >
                            <span>Explore</span>
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </template>
        </div>

        <!-- Wireframe Pagination Dots Underneath -->
        <div class="flex items-center justify-center gap-2 pt-2">
            <span class="w-2.5 h-2.5 rounded-full bg-ink"></span>
            <span class="w-2 h-2 rounded-full bg-sand"></span>
            <span class="w-2 h-2 rounded-full bg-sand"></span>
        </div>

    </div>
</section>
