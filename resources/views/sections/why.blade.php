@php
    $why = config('fincun.home.why');
@endphp

<section class="section-y bg-forest text-cream relative overflow-hidden border-t border-emerald/30">
    <div class="container-x space-y-16">
        
        <!-- Header -->
        <div class="max-w-3xl space-y-4">
            <x-ui.section-title 
                :eyebrow="$why['eyebrow']" 
                :title="$why['title']" 
                :light="true" 
            />
            <p class="text-sand/80 text-base sm:text-lg leading-relaxed pt-2">
                {{ $why['text'] }}
            </p>
        </div>

        <!-- 5 Principles Bento/List Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-stagger>
            @foreach($why['items'] as $idx => $item)
                <div class="rounded-3xl p-6 sm:p-8 bg-ink/50 border border-emerald/20 hover:border-saffron/50 transition-all duration-300 space-y-4 flex flex-col justify-between" data-tilt>
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-xs font-bold text-saffron px-3 py-1 rounded-full bg-forest border border-emerald/30">
                            0{{ $idx + 1 }}
                        </span>
                        <span class="w-2 h-2 rounded-full bg-emerald/60"></span>
                    </div>
                    <div class="space-y-2">
                        <h4 class="font-display font-bold text-xl text-cream">
                            {{ $item[0] }}
                        </h4>
                        <p class="text-xs sm:text-sm text-sand/70 leading-relaxed">
                            {{ $item[1] }}
                        </p>
                    </div>
                </div>
            @endforeach

            <!-- 6th Tile: Quick Callout -->
            <div class="rounded-3xl p-6 sm:p-8 bg-saffron text-ink space-y-4 flex flex-col justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-ink/70">Client First</span>
                <div>
                    <h4 class="font-display font-bold text-2xl text-ink leading-snug">
                        Ready to experience clear, jargon-free advisory?
                    </h4>
                </div>
                <div>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-xs font-bold text-ink underline uppercase tracking-wider">
                        Book a Conversation &rarr;
                    </a>
                </div>
            </div>
        </div>

        <!-- 3 Approach Steps Bottom Bar -->
        <div class="pt-12 border-t border-emerald/20">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                <div>
                    <span class="text-xs uppercase font-bold tracking-widest text-mint block">Our Advisory Blueprint</span>
                    <h3 class="font-display text-2xl font-bold text-cream">The Three-Pillar Approach</h3>
                </div>
                <x-ui.button :href="route('approach.show', 'alignment')" variant="ghost" class="text-mint border-emerald/30 text-xs">
                    Explore Our Approach
                </x-ui.button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($why['approach'] as $app)
                    <a 
                        href="{{ $app[2] }}" 
                        class="group p-6 rounded-2xl bg-ink/40 border border-emerald/20 hover:border-saffron hover:bg-ink/70 transition-all flex items-center justify-between"
                    >
                        <div class="flex items-center gap-4">
                            <span class="font-mono text-sm font-bold text-saffron group-hover:scale-110 transition-transform">
                                {{ $app[0] }}
                            </span>
                            <span class="font-display font-semibold text-base sm:text-lg text-cream group-hover:text-saffron transition-colors">
                                {{ $app[1] }}
                            </span>
                        </div>
                        <svg class="w-4 h-4 text-mint group-hover:text-saffron group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
