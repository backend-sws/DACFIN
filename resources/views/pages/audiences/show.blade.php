@extends('layouts.app')

@section('page', 'audience-' . $slug)
@section('title', $item['title'] ?? ($item['name'] . ' | FINCUN'))

@section('content')
    <x-page-hero 
        :eyebrow="$item['eyebrow'] ?? 'Who We Serve'" 
        :title="$item['name']" 
        :text="$item['tagline'] ?? ''"
        :breadcrumbs="[['label' => 'Who We Serve', 'url' => route('audiences.show', 'individual-families')], ['label' => $item['name']]]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Main Body Content (8 cols) -->
                <div class="lg:col-span-8 space-y-8" data-reveal="up">
                    
                    <!-- Quote-style Large Heading -->
                    <div class="p-8 sm:p-10 rounded-[2.5rem] bg-forest text-cream border border-emerald/30 shadow-xl space-y-4 relative overflow-hidden" data-tilt>
                        <span class="text-xs uppercase font-bold tracking-widest text-mint block">Client Commitment</span>
                        <blockquote class="h-display text-2xl sm:text-3xl font-bold leading-snug text-cream">
                            &ldquo;{{ $item['heading'] }}&rdquo;
                        </blockquote>
                    </div>

                    <!-- Body Paragraphs -->
                    <div class="space-y-6 text-slate text-base sm:text-lg leading-relaxed pt-4">
                        @foreach($item['body'] as $paragraph)
                            <p class="leading-relaxed">{{ $paragraph }}</p>
                        @endforeach
                    </div>

                    <!-- Key Focus Areas if present -->
                    @if(!empty($item['key_focus']))
                        <div class="pt-6 border-t border-sand space-y-4">
                            <h3 class="font-display font-bold text-xl sm:text-2xl text-ink">
                                Tailored Priorities for {{ $item['name'] }}
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                @foreach($item['key_focus'] as $focus)
                                    <div class="flex items-start gap-3 p-4 rounded-2xl bg-white border border-sand shadow-sm">
                                        <div class="w-6 h-6 rounded-full bg-emerald/15 text-emerald flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">
                                            ✓
                                        </div>
                                        <span class="text-xs sm:text-sm text-slate font-medium">{{ $focus }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="pt-8">
                        <x-ui.button :href="route('contact')" variant="primary" class="text-sm px-8 py-3.5">
                            Speak with an Advisor for {{ $item['name'] }}
                        </x-ui.button>
                    </div>
                </div>

                <!-- Sticky Sidebar of all 7 Segments (4 cols) -->
                <div class="lg:col-span-4 sticky top-28 space-y-6">
                    <div class="rounded-3xl p-6 bg-sand/30 border border-sand space-y-4">
                        <span class="text-xs uppercase font-bold tracking-widest text-emerald block">Client Segments</span>
                        <h4 class="font-display font-bold text-lg text-ink">Who We Specialize In</h4>
                        
                        <div class="space-y-1.5 pt-2">
                            @foreach(config('fincun.navigation.header.3.children') as $segment)
                                @php
                                    $segSlug = basename($segment['url']);
                                    $isActive = $segSlug === $slug;
                                @endphp
                                <a 
                                    href="{{ $segment['url'] }}" 
                                    class="flex items-center justify-between p-3 rounded-xl text-xs sm:text-sm font-semibold transition-all {{ $isActive ? 'bg-forest text-cream shadow-sm' : 'text-slate hover:bg-white hover:text-ink' }}"
                                >
                                    <span>{{ $segment['label'] }}</span>
                                    <span class="{{ $isActive ? 'text-saffron' : 'text-sand/60' }}">&rarr;</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Support Callout -->
                    <div class="rounded-3xl p-6 bg-forest text-cream border border-emerald/30 space-y-3">
                        <span class="text-[10px] uppercase tracking-widest text-mint font-bold block">Need Immediate Advice?</span>
                        <p class="text-xs text-sand/80">Call our advisory desk directly for a confidential conversation.</p>
                        <a href="tel:{{ config('fincun.site.primary_phone_tel') }}" class="text-xs font-bold text-saffron hover:underline block pt-1">
                            {{ config('fincun.site.phones.0') }} &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
