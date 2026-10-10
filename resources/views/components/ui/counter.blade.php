@props([
    'value' => null,
    'text' => null,
    'pad' => false,
    'label' => '',
    'light' => false,
])

<div {{ $attributes->merge(['class' => 'space-y-1']) }} data-reveal="up">
    <div class="h-display text-4xl sm:text-5xl lg:text-6xl font-extrabold {{ $light ? 'text-saffron' : 'text-emerald' }}">
        @if($value !== null)
            <span data-count="{{ $value }}" data-pad="{{ $pad ? 'true' : 'false' }}">
                {{ $pad ? sprintf('%02d', $value) : $value }}
            </span>
        @else
            <span>{{ $text }}</span>
        @endif
    </div>
    <div class="text-xs sm:text-sm font-medium tracking-wide {{ $light ? 'text-cream/80' : 'text-slate' }}">
        {{ $label ?: $slot }}
    </div>
</div>
