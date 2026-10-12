@extends('layouts.app')

@section('page', 'team')
@section('title', 'Our Team')

@php
    $teamMeta = config('fincun.home.team');
    $teamBios = config('fincun.company.team_bios');
@endphp

@section('content')
    <x-page-hero 
        :eyebrow="$teamMeta['eyebrow']" 
        :title="$teamMeta['title']" 
        :text="$teamMeta['text']"
        :breadcrumbs="[['label' => 'Our Team']]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x space-y-12">
            
            <div class="max-w-2xl">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald block mb-2">Leadership &amp; Advisory</span>
                <h2 class="h-display text-3xl sm:text-4xl font-bold text-ink">
                    The People Dedicated to Your Financial Peace of Mind
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl gap-8" data-stagger>
                @foreach($teamBios as $slug => $member)
                    <div class="rounded-3xl bg-sand/30 border border-sand hover:border-emerald/40 hover:bg-white transition-all duration-300 p-6 flex flex-col justify-between space-y-6 shadow-sm hover:shadow-xl group" data-tilt>
                        
                        <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-forest/20 relative">
                            <img 
                                src="{{ asset($member['image']) }}" 
                                alt="{{ $member['name'] }}" 
                                width="320" 
                                height="380" 
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500"
                                loading="lazy"
                            >
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-xs font-bold text-emerald px-2.5 py-0.5 rounded-full bg-emerald/10">
                                    {{ $member['initials'] }}
                                </span>
                                <span class="text-[11px] text-slate font-semibold uppercase tracking-wider">
                                    Advisory Core
                                </span>
                            </div>

                            <h3 class="font-display font-bold text-2xl text-ink group-hover:text-emerald transition-colors">
                                {{ $member['name'] }}
                            </h3>

                            <p class="text-xs font-bold text-saffron uppercase tracking-wide">
                                {{ $member['role'] }}
                            </p>

                            <p class="text-xs sm:text-sm text-slate leading-relaxed pt-1">
                                {{ $member['bio'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-sand/70">
                            <a href="{{ route('contact') }}" class="text-xs font-semibold text-emerald hover:text-ink flex items-center gap-1 transition-colors">
                                <span>Schedule a consultation</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
