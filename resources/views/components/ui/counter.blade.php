@props([
    'value' => null,
    'text' => null,
    'pad' => false,
    'label' => '',
    'light' => false,
    'isLive' => false,
])

<div {{ $attributes->merge(['class' => 'space-y-0.5 group-hover/item:-translate-y-0.5 transition-transform duration-200']) }}>
    <div class="h-display text-2xl sm:text-3xl lg:text-[2.1rem] font-bold tracking-tight leading-none {{ $light ? 'text-saffron' : 'text-emerald group-hover/item:text-saffron' }} flex items-baseline justify-center sm:justify-start gap-1 transition-colors duration-200">
        @if($value !== null)
            <span data-count="{{ $value }}" data-pad="{{ $pad ? 'true' : 'false' }}">
                {{ $pad ? sprintf('%02d', $value) : $value }}
            </span>
        @else
            <span>{{ $text }}</span>
        @endif
    </div>
    <div class="text-[11px] sm:text-xs font-medium tracking-normal leading-snug {{ $light ? 'text-cream/80' : 'text-slate' }} flex items-center justify-center sm:justify-start gap-1.5">
        @if($isLive)
            <span class="relative flex h-2 w-2 shrink-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald"></span>
            </span>
        @endif
        <span class="line-clamp-2">{{ $label ?: $slot }}</span>
    </div>
</div>
