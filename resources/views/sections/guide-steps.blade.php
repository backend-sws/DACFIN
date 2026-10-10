@php
    $guide = config('fincun.home.guide') ?? [
        'eyebrow' => 'How It Works',
        'title' => 'User guide for first timer',
        'subtitle' => 'A structured 4-step roadmap engineered to turn complex financial choices into clear, compounding wealth.',
        'steps' => [],
    ];
    $steps = $guide['steps'] ?? [];
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x">
        <!-- Wireframe 2-Column Card -->
        <div class="rounded-3xl sm:rounded-[2.5rem] bg-white border border-sand/60 p-8 sm:p-12 lg:p-16 shadow-lg relative overflow-hidden">
            <!-- Subtle Radial Gradient Background -->
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-mint/30 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                
                <!-- Left Column (Quote Mark + Large Title + Subtitle) -->
                <div class="lg:col-span-5 space-y-6" data-reveal="right">
                    <!-- Decorative Large Quote Mark from Wireframe -->
                    <div class="text-6xl sm:text-7xl font-display font-black text-sand/60 leading-none select-none">
                        &ldquo;&ldquo;
                    </div>

                    <div class="space-y-4">
                        <span class="text-xs uppercase font-bold tracking-widest text-emerald">
                            {{ $guide['eyebrow'] ?? 'How It Works' }}
                        </span>
                        <h2 class="h-display text-3xl sm:text-4xl lg:text-5xl font-bold text-ink leading-tight">
                            {{ $guide['title'] ?? 'User guide for first timer' }}
                        </h2>
                        <p class="text-slate text-sm sm:text-base leading-relaxed">
                            {{ $guide['subtitle'] ?? 'A structured 4-step roadmap engineered to turn complex financial choices into clear, compounding wealth.' }}
                        </p>
                    </div>

                    <!-- Quick consultation link -->
                    <div class="pt-2">
                        <a 
                            href="{{ route('contact') }}" 
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-ink hover:bg-forest text-cream text-xs sm:text-sm font-semibold transition-all hover:scale-[1.02]"
                        >
                            <span>Schedule Step 1 Call</span>
                            <svg class="w-4 h-4 text-saffron" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column (4 Structured Steps from Wireframe) -->
                <div class="lg:col-span-7 space-y-4 sm:space-y-6" data-stagger>
                    @foreach($steps as $item)
                        <div class="p-5 sm:p-6 rounded-2xl bg-cream/60 hover:bg-cream border border-sand/40 hover:border-emerald/40 transition-all duration-200 space-y-1.5 group">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-xs sm:text-sm font-bold text-emerald tracking-wide">
                                    {{ $item['step'] }}
                                </span>
                                <span class="w-2 h-2 rounded-full bg-sand group-hover:bg-saffron transition-colors"></span>
                            </div>

                            <h3 class="font-display font-bold text-base sm:text-lg text-ink group-hover:text-emerald transition-colors">
                                {{ $item['title'] }}
                            </h3>

                            <p class="text-xs sm:text-sm text-slate leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
