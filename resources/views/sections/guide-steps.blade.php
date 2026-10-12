@php
    $guide = config('fincun.home.guide') ?? [
        'eyebrow' => 'How It Works',
        'title' => 'User guide for first timer',
        'subtitle' => 'A structured 4-step roadmap engineered to turn complex financial choices into clear, compounding wealth.',
        'steps' => [],
    ];
    $steps = $guide['steps'] ?? [];
@endphp

<section class="py-10 sm:py-14 lg:py-16 bg-cream overflow-hidden">
    <div class="container-x">
        <!-- Wireframe 2-Column Card -->
        <div class="rounded-2xl sm:rounded-3xl bg-white border border-sand/60 p-6 sm:p-8 lg:p-10 shadow-md relative overflow-hidden">
            <!-- Subtle Radial Gradient Background -->
            <div class="absolute -right-20 -top-20 w-72 h-72 bg-mint/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                
                <!-- Left Column (Compact Eyebrow + Title + Subtitle + Action) -->
                <div class="lg:col-span-5 space-y-4" data-reveal="right">
                    <div class="space-y-2">
                        <span class="text-xs uppercase font-bold tracking-widest text-emerald">
                            {{ $guide['eyebrow'] ?? 'How It Works' }}
                        </span>
                        <h2 class="h-display text-2xl sm:text-3xl lg:text-4xl font-bold text-ink leading-tight">
                            {{ $guide['title'] ?? 'User guide for first timer' }}
                        </h2>
                    </div>

                    <p class="text-slate text-xs sm:text-sm leading-relaxed max-w-md">
                        {{ $guide['subtitle'] ?? 'A structured 4-step roadmap engineered to turn complex financial choices into clear, compounding wealth.' }}
                    </p>

                    <!-- Quick consultation link -->
                    <div class="pt-1">
                        <a 
                            href="{{ route('contact') }}" 
                            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full bg-ink hover:bg-forest text-cream text-xs sm:text-sm font-semibold transition-all hover:scale-[1.02] w-full sm:w-auto text-center"
                        >
                            <span>Schedule Step 1 Call</span>
                            <svg class="w-3.5 h-3.5 text-saffron" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column (4 Structured Steps from Wireframe) -->
                <div class="lg:col-span-7 space-y-2.5 sm:space-y-3" data-stagger>
                    @foreach($steps as $item)
                        <div class="p-3.5 sm:p-4 rounded-xl bg-cream/50 hover:bg-cream border border-sand/50 hover:border-emerald/40 transition-all duration-200 space-y-1.5 group shadow-2xs hover:shadow-xs">
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="font-mono text-[11px] font-bold text-emerald bg-emerald/10 border border-emerald/20 px-2 py-0.5 rounded-md">
                                        {{ $item['step'] }}
                                    </span>
                                    <h3 class="font-display font-bold text-sm sm:text-base text-ink group-hover:text-emerald transition-colors leading-snug">
                                        {{ $item['title'] }}
                                    </h3>
                                </div>
                                <span class="w-1.5 h-1.5 rounded-full bg-sand/60 group-hover:bg-saffron transition-colors shrink-0"></span>
                            </div>

                            <p class="text-xs sm:text-[13px] text-slate/85 leading-relaxed pl-0 sm:pl-1">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
