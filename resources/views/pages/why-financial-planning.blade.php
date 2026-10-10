@extends('layouts.app')

@section('page', 'why-planning')
@section('title', 'Why Financial Planning?')

@php
    $plan = config('fincun.company.why_planning');
@endphp

@section('content')
    <x-page-hero 
        :eyebrow="$plan['eyebrow']" 
        :title="$plan['title']" 
        :text="$plan['text']"
        :breadcrumbs="[['label' => 'Why Financial Planning?']]"
    />

    <!-- Vertical Timeline with SVG Connecting Line -->
    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x max-w-4xl mx-auto space-y-16">
            
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald block">Strategic Progression</span>
                <h2 class="h-display text-3xl sm:text-4xl font-bold text-ink">
                    Three Critical Questions Every Investor Must Answer
                </h2>
                <p class="text-slate text-sm sm:text-base">
                    True financial planning isn't speculative trading. It is a systematic roadmap that connects where you stand with what you wish to achieve.
                </p>
            </div>

            <div class="relative space-y-12 sm:space-y-16 before:absolute before:inset-0 before:left-8 sm:before:left-1/2 before:-translate-x-1/2 before:w-1 before:bg-sand/80 before:h-full">
                @foreach($plan['steps'] as $idx => $step)
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center gap-8 sm:gap-16 {{ $idx % 2 === 1 ? 'sm:flex-row-reverse' : '' }}" data-reveal="up">
                        
                        <!-- Step Content (half width) -->
                        <div class="w-full sm:w-1/2 pl-16 sm:pl-0 {{ $idx % 2 === 1 ? 'sm:text-left' : 'sm:text-right' }}">
                            <div class="p-8 rounded-[2rem] bg-white border border-sand shadow-sm hover:shadow-xl transition-all duration-300 space-y-3" data-tilt>
                                <span class="text-xs uppercase font-bold tracking-widest text-saffron">Phase 0{{ $idx + 1 }}</span>
                                <h3 class="font-display font-bold text-xl sm:text-2xl text-ink">
                                    {{ $step[1] }}
                                </h3>
                                <p class="text-xs sm:text-sm text-slate leading-relaxed">
                                    {{ $step[2] }}
                                </p>
                            </div>
                        </div>

                        <!-- Center Marker Pulse Dot -->
                        <div class="absolute left-8 sm:left-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-forest border-4 border-cream text-saffron flex items-center justify-center font-mono font-bold text-sm shadow-lg z-10">
                            {{ $step[0] }}
                        </div>

                        <!-- Empty Balance Column on desktop -->
                        <div class="hidden sm:block sm:w-1/2"></div>
                    </div>
                @endforeach
            </div>

            <div class="pt-12 text-center">
                <x-ui.button :href="route('contact')" variant="primary" class="text-base px-8 py-4">
                    Build Your Roadmap Today
                </x-ui.button>
            </div>

        </div>
    </section>
@endsection
