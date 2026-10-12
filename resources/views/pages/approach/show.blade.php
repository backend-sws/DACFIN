@extends('layouts.app')

@section('page', 'approach-' . $slug)
@section('title', $item['title'] ?? ($item['name'] . ' | ' . config('fincun.site.brand')))

@php
    $approaches = [
        'alignment' => ['name' => 'Alignment', 'url' => '/our-approach/alignment'],
        'customised-solutions' => ['name' => 'Customised Solutions', 'url' => '/our-approach/customised-solutions'],
        'keep-you-informed' => ['name' => 'Keep You Informed', 'url' => '/our-approach/keep-you-informed'],
    ];

    $keys = array_keys($approaches);
    $currentIdx = array_search($slug, $keys);
    $prevKey = $keys[($currentIdx - 1 + count($keys)) % count($keys)];
    $nextKey = $keys[($currentIdx + 1) % count($keys)];
@endphp

@section('content')
    <x-page-hero 
        :eyebrow="$item['eyebrow'] ?? 'Our Approach'" 
        :title="$item['name']" 
        :breadcrumbs="[['label' => 'Our Approach', 'url' => route('approach.show', 'alignment')], ['label' => $item['name']]]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x max-w-4xl mx-auto space-y-12">
            
            <!-- Heading Card -->
            <div class="p-8 sm:p-12 rounded-[2.5rem] bg-forest text-cream border border-emerald/30 shadow-xl space-y-4" data-reveal="up">
                <span class="text-xs uppercase font-bold tracking-widest text-mint block">Advisory Philosophy</span>
                <h2 class="h-display text-2xl sm:text-3xl md:text-4xl font-bold leading-tight text-cream">
                    {{ $item['heading'] }}
                </h2>
            </div>

            <!-- Body Paragraphs with Scrub Highlight -->
            <div class="space-y-6 text-slate text-base sm:text-lg leading-relaxed pt-4" data-scrub>
                @foreach($item['body'] as $para)
                    <p class="leading-relaxed">{{ $para }}</p>
                @endforeach
            </div>

            <!-- 3 Process Steps if present -->
            @isset($item['steps'])
                <div class="pt-8 border-t border-sand space-y-6">
                    <span class="text-xs uppercase font-bold tracking-widest text-emerald block">Action Steps</span>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-stagger>
                        @foreach($item['steps'] as $step)
                            <div class="p-6 rounded-2xl bg-white border border-sand shadow-sm space-y-2" data-tilt>
                                <span class="font-mono text-xs font-bold text-saffron px-2.5 py-0.5 rounded-full bg-forest inline-block">
                                    {{ $step[0] }}
                                </span>
                                <h3 class="font-display font-bold text-lg text-ink">{{ $step[1] }}</h3>
                                <p class="text-xs sm:text-sm text-slate leading-relaxed">{{ $step[2] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endisset

            <!-- Prev / Next Navigation -->
            <div class="pt-12 border-t border-sand flex items-center justify-between gap-4">
                <a 
                    href="{{ $approaches[$prevKey]['url'] }}" 
                    class="group flex items-center gap-3 p-4 rounded-2xl hover:bg-white border border-transparent hover:border-sand transition-all text-left"
                >
                    <span class="text-emerald text-lg group-hover:-translate-x-1 transition-transform">&larr;</span>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate block">Previous Approach</span>
                        <span class="font-display font-semibold text-sm sm:text-base text-ink group-hover:text-emerald">
                            {{ $approaches[$prevKey]['name'] }}
                        </span>
                    </div>
                </a>

                <a 
                    href="{{ $approaches[$nextKey]['url'] }}" 
                    class="group flex items-center gap-3 p-4 rounded-2xl hover:bg-white border border-transparent hover:border-sand transition-all text-right"
                >
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate block">Next Approach</span>
                        <span class="font-display font-semibold text-sm sm:text-base text-ink group-hover:text-emerald">
                            {{ $approaches[$nextKey]['name'] }}
                        </span>
                    </div>
                    <span class="text-emerald text-lg group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>

        </div>
    </section>
@endsection
