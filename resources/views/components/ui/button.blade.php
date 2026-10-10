@props([
    'href' => null,
    'variant' => 'primary', // primary (saffron), ghost, dark (forest/ink)
    'arrow' => true,
    'type' => 'button',
])

@php
    $baseClass = "group inline-flex items-center justify-center gap-2.5 px-6 py-3 rounded-full text-sm font-semibold tracking-wide transition-all duration-300 focus:outline-none";

    $variants = [
        'primary' => 'bg-saffron text-ink hover:bg-saffron/90 shadow-sm hover:shadow-md hover:scale-[1.02] active:scale-[0.98]',
        'ghost' => 'border border-sand text-ink hover:border-emerald hover:text-emerald bg-transparent hover:bg-sand/20',
        'dark' => 'bg-ink text-cream hover:bg-forest border border-emerald/30 hover:border-emerald hover:scale-[1.02]',
        'glass' => 'bg-white/10 backdrop-blur-md text-cream hover:bg-white/20 border border-white/15',
    ];

    $classes = $baseClass . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} data-magnetic>
        <span>{{ $slot }}</span>
        @if($arrow)
            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} data-magnetic>
        <span>{{ $slot }}</span>
        @if($arrow)
            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        @endif
    </button>
@endif
