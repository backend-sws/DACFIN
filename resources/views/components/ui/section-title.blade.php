@props([
    'eyebrow' => null,
    'title' => '',
    'light' => false,
    'center' => false,
])

<div {{ $attributes->merge(['class' => 'space-y-3 ' . ($center ? 'text-center max-w-3xl mx-auto' : 'max-w-3xl')]) }} data-reveal="up">
    @if($eyebrow)
        <x-ui.eyebrow :text="$eyebrow" :light="$light" />
    @endif
    <h2 class="h-display text-3xl sm:text-4xl md:text-5xl font-bold leading-[1.15] {{ $light ? 'text-cream' : 'text-ink' }}" data-split="words">
        {!! $title ?: $slot !!}
    </h2>
</div>
