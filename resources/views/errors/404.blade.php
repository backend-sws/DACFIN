@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<section class="min-h-[70vh] flex items-center justify-center bg-ink text-cream py-32 px-4 relative overflow-hidden">
    <!-- Gradient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-forest/50 blur-[120px] pointer-events-none"></div>

    <div class="container-x relative z-10 text-center max-w-2xl space-y-8" data-reveal="up">
        <div class="space-y-2">
            <span class="text-xs uppercase font-bold tracking-widest text-saffron">Error 404</span>
            <div class="h-display text-7xl sm:text-9xl font-black text-cream tracking-tight">
                4<span class="text-saffron italic">0</span>4
            </div>
        </div>

        <div class="space-y-3">
            <h1 class="h-display text-2xl sm:text-3xl font-bold text-cream">
                The Page You Are Looking For Does Not Exist
            </h1>
            <p class="text-sand/70 text-sm sm:text-base leading-relaxed">
                The link might be outdated or the page may have been moved. Let's get you back to navigating your financial roadmap.
            </p>
        </div>

        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
            <x-ui.button :href="route('home')" variant="primary">
                Return to Homepage
            </x-ui.button>
            <x-ui.button :href="route('contact')" variant="ghost" class="text-cream border-emerald/30 hover:bg-forest/50">
                Contact Advisors
            </x-ui.button>
        </div>
    </div>
</section>
@endsection
