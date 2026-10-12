@php
    $cta = config('fincun.home.cta_band');
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x">
        <div class="relative rounded-[2.5rem] bg-forest text-cream p-8 sm:p-12 md:p-16 lg:p-20 overflow-hidden border border-emerald/30 shadow-2xl" data-reveal="up">
            <!-- Animated Gradient Blob -->
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-saffron/20 blur-[90px] pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-emerald/30 blur-[100px] pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl space-y-6">
                <x-ui.eyebrow text="Start Your Journey" :light="true" />

                <h2 class="h-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-[1.1] text-cream" data-split="words">
                    {{ $cta['title'] }}
                </h2>

                <p class="text-base sm:text-lg md:text-xl text-sand/80 max-w-2xl font-light leading-relaxed">
                    {{ $cta['text'] }}
                </p>

                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <x-ui.button :href="$cta['button'][1]" variant="primary" class="text-base px-8 py-4">
                        {{ $cta['button'][0] }}
                    </x-ui.button>

                    <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="inline-flex items-center gap-2 text-sm text-white hover:text-white/80 transition-colors font-medium px-4 py-3">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>Call directly: {{ config('fincun.site.phones.0') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
