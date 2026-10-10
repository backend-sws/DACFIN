@props([
    'eyebrow' => null,
    'title' => '',
    'text' => null,
    'breadcrumbs' => [], // [['label' => 'Home', 'url' => '/'], ...]
])

<section class="relative bg-ink text-cream pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden border-b border-emerald/20">
    <!-- Animated Gradient Orbs in Background -->
    <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-emerald/20 blur-[100px] pointer-events-none animate-pulse"></div>
    <div class="absolute top-1/2 -right-32 w-96 h-96 rounded-full bg-forest/40 blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-80 h-80 rounded-full bg-saffron/10 blur-[90px] pointer-events-none"></div>

    <div class="container-x relative z-10">
        <!-- Breadcrumbs -->
        @if(count($breadcrumbs) > 0)
            <nav class="flex items-center gap-2 text-xs uppercase tracking-wider text-sand/60 mb-6" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-saffron transition-colors">Home</a>
                @foreach($breadcrumbs as $crumb)
                    <span class="text-sand/40">/</span>
                    @if(!empty($crumb['url']) && !$loop->last)
                        <a href="{{ $crumb['url'] }}" class="hover:text-saffron transition-colors">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-mint font-semibold">{{ $crumb['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endif

        <div class="max-w-4xl space-y-5" data-hero>
            @if($eyebrow)
                <div data-reveal="up">
                    <x-ui.eyebrow :text="$eyebrow" :light="true" />
                </div>
            @endif

            <h1 class="h-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-[1.1] text-cream" data-split="words">
                {!! $title !!}
            </h1>

            @if($text)
                <p class="text-base sm:text-lg md:text-xl text-sand/80 max-w-2xl font-light leading-relaxed pt-2" data-reveal="up">
                    {{ $text }}
                </p>
            @endif
        </div>
    </div>
</section>
