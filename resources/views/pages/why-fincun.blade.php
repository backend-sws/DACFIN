@extends('layouts.app')

@section('page', 'why-fincun')
@section('title', 'Why Choose DACFIN?')

@php
    $whyFincun = config('fincun.company.why_fincun');
    $whyHome = config('fincun.home.why');
@endphp

@section('content')
    <x-page-hero 
        eyebrow="Why Choose DACFIN" 
        :title="$whyFincun['title']" 
        :text="$whyFincun['text']"
        :breadcrumbs="[['label' => 'Why DACFIN?']]"
    />

    <!-- Giant Stephen Covey Quote Section -->
    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x">
            <div class="rounded-[2.5rem] p-8 sm:p-14 lg:p-20 bg-forest text-cream border border-emerald/30 shadow-2xl relative overflow-hidden" data-reveal="up">
                <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-saffron/15 blur-[80px] pointer-events-none"></div>

                <div class="max-w-4xl space-y-8 relative z-10">
                    <span class="text-xs uppercase font-bold tracking-widest text-mint block">Guiding Philosophy</span>
                    
                    <blockquote class="h-display text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-cream" data-split="words">
                        &ldquo;{{ $whyFincun['quote'][0] }}&rdquo;
                    </blockquote>

                    <div class="flex items-center gap-4 pt-2">
                        <span class="w-12 h-[2px] bg-saffron"></span>
                        <span class="text-sm sm:text-base font-semibold text-saffron tracking-wide">
                            {{ $whyFincun['quote'][1] }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Principles Grid -->
    <section class="section-y bg-cream pt-0">
        <div class="container-x space-y-12">
            <x-ui.section-title 
                eyebrow="Core Commitments" 
                title="Clarity in Every Financial Decision" 
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-stagger>
                @foreach($whyHome['items'] as $idx => $item)
                    <div class="rounded-3xl p-8 bg-sand/30 border border-sand hover:border-emerald/40 hover:bg-white transition-all duration-300 space-y-4" data-tilt>
                        <span class="font-mono text-xs font-bold text-emerald px-3 py-1 rounded-full bg-emerald/10 inline-block">
                            0{{ $idx + 1 }}
                        </span>
                        <h3 class="font-display font-bold text-xl text-ink">
                            {{ $item[0] }}
                        </h3>
                        <p class="text-xs sm:text-sm text-slate leading-relaxed">
                            {{ $item[1] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Approach Integration -->
    @include('sections.why')
@endsection
