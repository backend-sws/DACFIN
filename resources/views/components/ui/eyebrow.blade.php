@props([
    'text' => '',
    'light' => false,
])

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest ' . ($light ? 'text-mint' : 'text-emerald')]) }}>
    <span class="w-6 h-[2px] rounded-full {{ $light ? 'bg-saffron' : 'bg-emerald' }}"></span>
    <span>{{ $text ?: $slot }}</span>
</div>
