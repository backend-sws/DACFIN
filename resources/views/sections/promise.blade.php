@php
    $promise = config('fincun.home.promise');
@endphp

<section class="section-y bg-cream text-ink relative overflow-hidden border-t border-sand">
    <div class="container-x text-center max-w-4xl mx-auto space-y-8" data-reveal="up">
        
        <x-ui.eyebrow :text="$promise['eyebrow']" class="justify-center" />

        <h2 class="h-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-[1.15] text-ink" data-split="words">
            {{ $promise['title'] }}
        </h2>

        <p class="text-base sm:text-lg md:text-xl text-slate max-w-3xl mx-auto leading-relaxed font-light" data-scrub>
            {{ $promise['text'] }}
        </p>

        <div class="pt-6 flex justify-center">
            <x-ui.button :href="$promise['cta'][1]" variant="primary" class="text-base px-9 py-4.5">
                {{ $promise['cta'][0] }}
            </x-ui.button>
        </div>

    </div>
</section>
