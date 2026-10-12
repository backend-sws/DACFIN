@extends('layouts.app')

@section('page', 'service-' . $slug)
@section('title', $item['title'] ?? ($item['name'] . ' | ' . config('fincun.site.brand')))

@section('content')
    <x-page-hero 
        :eyebrow="$item['eyebrow'] ?? 'Services'" 
        :title="$item['heading'] ?? $item['name']" 
        :text="$item['intro'] ?? ($item['tagline'] ?? '')"
        :breadcrumbs="[['label' => 'Services', 'url' => '#services'], ['label' => $item['name']]]"
    />

    <!-- Action / CTAs strip -->
    @if(!empty($item['ctas']))
        <section class="bg-forest py-6 text-cream border-b border-emerald/20">
            <div class="container-x flex flex-wrap items-center justify-between gap-4">
                <span class="text-sm font-medium text-mint">
                    Ready to take control of your financial growth?
                </span>
                <div class="flex items-center gap-3">
                    @foreach($item['ctas'] as $cta)
                        <x-ui.button :href="$cta[1]" :variant="$loop->first ? 'primary' : 'ghost'" class="text-xs px-5 py-2.5 {{ !$loop->first ? 'text-cream border-emerald/30' : '' }}">
                            {{ $cta[0] }}
                        </x-ui.button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 1. Timeline Section (Past, Present, Future) if present -->
    @isset($item['timeline'])
        <section class="section-y bg-cream overflow-hidden">
            <div class="container-x space-y-12">
                <x-ui.section-title 
                    eyebrow="Lifecycle Perspective" 
                    :title="$item['timeline']['title']" 
                />

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-stagger>
                    @foreach($item['timeline']['items'] as $timeItem)
                        <div class="rounded-3xl p-8 bg-white border border-sand shadow-sm hover:shadow-xl transition-all duration-300 space-y-4 flex flex-col justify-between" data-tilt>
                            <div class="space-y-2">
                                <span class="font-mono text-xs font-bold text-saffron px-3 py-1 rounded-full bg-forest inline-block">
                                    {{ $timeItem[0] }}
                                </span>
                                <h3 class="font-display font-bold text-xl sm:text-2xl text-ink">
                                    {{ $timeItem[1] }}
                                </h3>
                            </div>
                            <p class="text-xs sm:text-sm text-slate leading-relaxed">
                                {{ $timeItem[2] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset

    <!-- 2. Six Pillars Bento Grid if present -->
    @isset($item['pillars'])
        <section class="section-y bg-ink text-cream relative overflow-hidden">
            <div class="absolute -top-20 left-1/4 w-96 h-96 rounded-full bg-forest/40 blur-[120px] pointer-events-none"></div>

            <div class="container-x relative z-10 space-y-12">
                <x-ui.section-title 
                    eyebrow="Strategic Pillars" 
                    :title="$item['pillars']['title']" 
                    :light="true" 
                />

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-stagger>
                    @foreach($item['pillars']['items'] as $idx => $pillar)
                        <div class="rounded-3xl p-8 bg-forest/50 border border-emerald/25 hover:border-saffron hover:bg-forest/80 transition-all duration-300 space-y-4 flex flex-col justify-between" data-tilt>
                            <span class="font-mono text-xs font-bold text-mint px-3 py-1 rounded-full bg-ink/60 border border-emerald/20 self-start">
                                Pillar 0{{ $idx + 1 }}
                            </span>
                            <div class="space-y-2">
                                <h3 class="font-display font-bold text-xl text-cream">
                                    {{ $pillar[0] }}
                                </h3>
                                <p class="text-xs sm:text-sm text-sand/70 leading-relaxed">
                                    {{ $pillar[1] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset

    <!-- 3. Process Steps Line if present -->
    @isset($item['process'])
        <section class="section-y bg-cream overflow-hidden">
            <div class="container-x space-y-12">
                <x-ui.section-title 
                    eyebrow="Implementation Roadmap" 
                    :title="$item['process']['title']" 
                />

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4" data-stagger>
                    @foreach($item['process']['steps'] as $idx => $step)
                        <div class="p-6 rounded-2xl bg-sand/30 border border-sand text-center space-y-2 hover:bg-white hover:shadow-md transition-all">
                            <span class="font-mono text-xs font-bold text-emerald">Step 0{{ $idx + 1 }}</span>
                            <h4 class="font-display font-bold text-base text-ink">{{ $step }}</h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset

    <!-- 4. Why Matters & Chips if present -->
    @isset($item['why'])
        <section class="section-y bg-forest text-cream border-t border-emerald/30">
            <div class="container-x max-w-4xl mx-auto text-center space-y-8" data-reveal="up">
                <span class="text-xs uppercase font-bold tracking-widest text-mint block">Value Proposition</span>
                <h2 class="h-display text-3xl sm:text-4xl font-bold text-cream">
                    {{ $item['why']['title'] }}
                </h2>
                <p class="text-sand/80 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto">
                    {{ $item['why']['text'] }}
                </p>

                @if(!empty($item['why']['chips']))
                    <div class="flex flex-wrap items-center justify-center gap-3 pt-4">
                        @foreach($item['why']['chips'] as $chip)
                            <span class="px-5 py-2.5 rounded-full bg-ink/60 border border-emerald/30 text-xs sm:text-sm font-semibold text-mint hover:border-saffron transition-colors">
                                {{ $chip }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endisset

    <!-- Related Services Footer Selector -->
    <section class="py-16 bg-cream border-t border-sand">
        <div class="container-x">
            <h3 class="text-xs uppercase font-bold tracking-widest text-slate mb-6">Other Advisory Services</h3>
            <div class="flex flex-wrap gap-3">
                @foreach(config('fincun.navigation.header.2.children') as $other)
                    <a 
                        href="{{ $other['url'] }}" 
                        class="px-5 py-2.5 rounded-full text-xs font-semibold transition-all {{ $other['url'] === '/services/'.$slug ? 'bg-saffron text-ink font-bold' : 'bg-sand/40 text-ink hover:bg-sand/80' }}"
                    >
                        {{ $other['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
