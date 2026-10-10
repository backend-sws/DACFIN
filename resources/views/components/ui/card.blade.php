@props([
    'tilt' => false,
    'dark' => false,
])

<div {{ $attributes->merge([
    'class' => 'rounded-[2rem] p-6 sm:p-8 transition-all duration-300 ' . 
    ($dark 
        ? 'bg-forest/60 border border-emerald/20 text-cream backdrop-blur-sm' 
        : 'bg-white/80 border border-sand/70 text-slate shadow-sm hover:shadow-md')
]) }}
@if($tilt) data-tilt @endif
>
    {{ $slot }}
</div>
