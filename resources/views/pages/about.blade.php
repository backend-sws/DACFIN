@extends('layouts.app')

@section('page', 'about')
@section('title', 'About Us')

@php
    $about = config('fincun.company.about');
@endphp

@section('content')
    <x-page-hero 
        :eyebrow="$about['eyebrow']" 
        :title="$about['title']" 
        :text="$about['text']"
        :breadcrumbs="[['label' => 'About Us']]"
    />

    <!-- Story Section -->
    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Image Left -->
                <div class="lg:col-span-5" data-reveal="right">
                    <div class="relative rounded-[2.5rem] overflow-hidden border border-sand bg-forest aspect-[4/5] shadow-xl group">
                        <img 
                            src="{{ asset($about['image']) }}" 
                            alt="FINCUN Story" 
                            width="500" 
                            height="600" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        >
                    </div>
                </div>

                <!-- Story Text Right -->
                <div class="lg:col-span-7 space-y-6" data-reveal="left">
                    <x-ui.section-title 
                        :eyebrow="$about['story']['eyebrow']" 
                        :title="$about['story']['title']" 
                    />

                    <div class="space-y-4 text-slate text-base sm:text-lg leading-relaxed">
                        @foreach($about['story']['paragraphs'] as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>

                    <!-- Mission & Vision Bento Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-4" data-stagger>
                        <x-ui.card class="bg-forest text-cream border-emerald/30 shadow-lg" :tilt="true">
                            <div class="space-y-3">
                                <span class="text-xs uppercase font-bold tracking-widest text-mint block">01</span>
                                <h3 class="font-display font-bold text-xl text-saffron">
                                    {{ $about['mission'][0] }}
                                </h3>
                                <p class="text-xs sm:text-sm text-sand/80 leading-relaxed">
                                    {{ $about['mission'][1] }}
                                </p>
                            </div>
                        </x-ui.card>

                        <x-ui.card class="bg-forest text-cream border-emerald/30 shadow-lg" :tilt="true">
                            <div class="space-y-3">
                                <span class="text-xs uppercase font-bold tracking-widest text-mint block">02</span>
                                <h3 class="font-display font-bold text-xl text-saffron">
                                    {{ $about['vision'][0] }}
                                </h3>
                                <p class="text-xs sm:text-sm text-sand/80 leading-relaxed">
                                    {{ $about['vision'][1] }}
                                </p>
                            </div>
                        </x-ui.card>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
