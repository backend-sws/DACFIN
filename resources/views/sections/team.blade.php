@php
    $team = config('fincun.home.team');
@endphp

<section class="section-y bg-cream overflow-hidden">
    <div class="container-x space-y-12 sm:space-y-16">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <x-ui.section-title 
                :eyebrow="$team['eyebrow']" 
                :title="$team['title']" 
            />

            <div>
                <x-ui.button :href="route('team')" variant="ghost" class="text-xs">
                    View Full Team &rarr;
                </x-ui.button>
            </div>
        </div>

        <p class="text-slate text-base sm:text-lg max-w-2xl leading-relaxed">
            {{ $team['text'] }}
        </p>

        <!-- Team Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6" data-stagger>
            @foreach($team['members'] as $member)
                <div class="group rounded-3xl overflow-hidden bg-sand/30 border border-sand hover:border-emerald/40 hover:bg-white transition-all duration-300 shadow-sm hover:shadow-xl flex flex-col" data-tilt>
                    
                    <!-- Avatar Image -->
                    <div class="aspect-[4/5] bg-forest/20 overflow-hidden relative">
                        <img 
                            src="{{ asset($member[2]) }}" 
                            alt="{{ $member[0] }}" 
                            width="320" 
                            height="380" 
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500"
                            loading="lazy"
                        >
                    </div>

                    <!-- Meta text -->
                    <div class="p-5 space-y-1">
                        <h4 class="font-display font-bold text-base text-ink group-hover:text-emerald transition-colors">
                            {{ $member[0] }}
                        </h4>
                        <p class="text-xs text-slate font-medium leading-snug">
                            {{ $member[1] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
