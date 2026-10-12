@extends('layouts.app')

@section('page', 'journal-index')
@section('title', 'DACFIN Wealth Journal')

@section('content')
    <x-page-hero 
        eyebrow="Investor Education Initiative" 
        :title="$journal['title']" 
        :text="$journal['intro']"
        :breadcrumbs="[['label' => 'Wealth Journal']]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x space-y-12">
            
            <div class="max-w-2xl">
                <span class="text-xs uppercase font-bold tracking-widest text-emerald block mb-2">Quarterly &amp; Monthly Publications</span>
                <h2 class="h-display text-3xl sm:text-4xl font-bold text-ink">
                    Empowering Long-Term Investors with Transparent Market Perspectives
                </h2>
            </div>

            <!-- Issues Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" data-stagger>
                @foreach($journal['issues'] as $slug => $issue)
                    <a 
                        href="{{ route('journal.show', $slug) }}" 
                        class="group rounded-3xl p-7 bg-white border border-sand hover:border-emerald/40 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between space-y-8"
                        data-tilt
                    >
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs font-bold text-ink px-3 py-1 rounded-full bg-sand/60">
                                Issue {{ $issue['no'] }}
                            </span>
                            <span class="text-xs text-slate font-medium">
                                {{ $issue['date'] }}
                            </span>
                        </div>

                        <!-- Magazine Cover Mockup -->
                        <div class="aspect-[4/3] rounded-2xl bg-ink p-6 flex flex-col justify-between relative overflow-hidden group-hover:scale-[1.02] transition-transform">
                            <div class="space-y-1">
                                <span class="text-[9px] uppercase tracking-widest text-mint font-bold block">DACFIN JOURNAL</span>
                                <h3 class="font-display font-bold text-lg text-cream leading-snug group-hover:text-saffron transition-colors">
                                    {{ $issue['title'] ?? 'Strategic Wealth Perspectives' }}
                                </h3>
                            </div>

                            <div class="pt-4 border-t border-emerald/20 flex items-center justify-between text-xs text-sand/60">
                                <span>Read Issue</span>
                                <span class="text-saffron group-hover:translate-x-1 transition-transform">&rarr;</span>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs sm:text-sm text-slate line-clamp-2">
                                {{ $issue['body'] ?? 'Click to read complete issue insights and analysis.' }}
                            </p>
                            <span class="text-xs font-bold text-emerald group-hover:text-ink flex items-center gap-1 mt-3">
                                View full newsletter &rarr;
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
@endsection
