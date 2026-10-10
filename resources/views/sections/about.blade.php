@php
    $about = config('fincun.home.about');
@endphp

<section id="about" class="section-y bg-cream overflow-hidden">
    <div class="container-x">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Column: Image in Arched Mask with Rotating Circular Badge (5 cols) -->
            <div class="lg:col-span-5 relative" data-reveal="right">
                <div class="relative mx-auto max-w-md">
                    <!-- Arched Image Container -->
                    <div class="relative rounded-t-[14rem] rounded-b-[2.5rem] overflow-hidden border-2 border-sand shadow-2xl bg-forest aspect-[4/5] flex items-center justify-center group">
                        <img 
                            src="{{ asset($about['image']) }}" 
                            alt="{{ $about['image_alt'] }}" 
                            width="540" 
                            height="600" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-ink/60 via-transparent to-transparent pointer-events-none"></div>

                        <!-- Quote Bottom Banner -->
                        <div class="absolute bottom-6 inset-x-6 p-4 rounded-2xl bg-ink/80 backdrop-blur-md border border-emerald/30 text-center text-cream">
                            <p class="font-display italic text-sm sm:text-base text-mint">
                                &ldquo;{{ $about['quote'] }}&rdquo;
                            </p>
                        </div>
                    </div>

                    <!-- Rotating Circular Badge -->
                    <div class="absolute -top-6 -right-6 sm:-top-8 sm:-right-8 w-28 h-28 sm:w-32 sm:h-32 rounded-full bg-saffron text-ink p-2 shadow-2xl flex items-center justify-center border-4 border-cream animate-spin" style="animation-duration: 20s;">
                        <svg class="w-full h-full" viewBox="0 0 100 100">
                            <defs>
                                <path id="textCircle" d="M 50, 50 m -35, 0 a 35,35 0 1,1 70,0 a 35,35 0 1,1 -70,0" />
                            </defs>
                            <text font-size="9" font-family="'Manrope', sans-serif" font-weight="800" letter-spacing="2.5" fill="#071922">
                                <textPath href="#textCircle">
                                    CLARITY &bull; TRUST &bull; GROWTH &bull;
                                </textPath>
                            </text>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="font-display font-bold text-sm text-ink">FIN</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Content + Mission/Vision Cards (7 cols) -->
            <div class="lg:col-span-7 space-y-8" data-reveal="left">
                <x-ui.section-title 
                    :eyebrow="$about['eyebrow']" 
                    :title="$about['title']" 
                />

                <div class="space-y-4 text-slate text-base sm:text-lg leading-relaxed">
                    @foreach($about['paragraphs'] as $para)
                        <p>{{ $para }}</p>
                    @endforeach
                </div>

                <!-- Mission & Vision Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2" data-stagger>
                    <x-ui.card class="bg-sand/30 border-sand hover:bg-sand/50 transition-colors" :tilt="true">
                        <div class="space-y-3">
                            <div class="w-10 h-10 rounded-2xl bg-emerald/15 text-emerald flex items-center justify-center font-bold">
                                01
                            </div>
                            <h4 class="font-display font-bold text-lg text-ink">
                                {{ $about['mission'][0] }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate leading-relaxed">
                                {{ $about['mission'][1] }}
                            </p>
                        </div>
                    </x-ui.card>

                    <x-ui.card class="bg-sand/30 border-sand hover:bg-sand/50 transition-colors" :tilt="true">
                        <div class="space-y-3">
                            <div class="w-10 h-10 rounded-2xl bg-saffron/20 text-ink flex items-center justify-center font-bold">
                                02
                            </div>
                            <h4 class="font-display font-bold text-lg text-ink">
                                {{ $about['vision'][0] }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate leading-relaxed">
                                {{ $about['vision'][1] }}
                            </p>
                        </div>
                    </x-ui.card>
                </div>

                <div class="pt-2">
                    <x-ui.button :href="route('about')" variant="ghost">
                        Learn More About Us
                    </x-ui.button>
                </div>
            </div>

        </div>
    </div>
</section>
