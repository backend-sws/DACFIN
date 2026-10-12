@extends('layouts.app')

@section('page', 'journal-' . $slug)
@section('title', 'Wealth Journal — Issue ' . $issue['no'])

@section('content')
    <!-- Sticky Reading Progress Bar -->
    <div class="fixed top-0 inset-x-0 h-1 bg-transparent z-50">
        <div id="reading-bar" class="h-full bg-saffron w-0 transition-all duration-75"></div>
    </div>

    <x-page-hero 
        :eyebrow="'Issue ' . $issue['no'] . ' • ' . $issue['date']" 
        :title="$issue['title'] ?? ('Issue ' . $issue['no'] . ' — ' . $issue['date'])" 
        text="An Investor Education Initiative by Dacfin Services Private Limited."
        :breadcrumbs="[['label' => 'Wealth Journal', 'url' => route('journal.index')], ['label' => 'Issue ' . $issue['no']]]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x max-w-3xl mx-auto space-y-12">
            
            <!-- Issue Meta Box -->
            <div class="p-6 rounded-2xl bg-white border border-sand flex items-center justify-between text-xs text-slate">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-emerald/15 text-emerald font-bold flex items-center justify-center">
                        {{ $issue['no'] }}
                    </span>
                    <div>
                        <span class="font-bold text-ink block">DACFIN Wealth Journal</span>
                        <span>Published: {{ $issue['date'] }}</span>
                    </div>
                </div>

                <a href="{{ route('journal.index') }}" class="text-emerald font-semibold hover:underline">
                    &larr; Back to all issues
                </a>
            </div>

            <!-- Issue Body Content -->
            <article class="prose prose-lg text-slate space-y-6 text-base sm:text-lg leading-relaxed">
                @if(!empty($issue['body']))
                    <div class="p-8 sm:p-10 rounded-[2rem] bg-forest text-cream border border-emerald/30 shadow-lg">
                        <span class="text-xs uppercase font-bold tracking-widest text-mint block mb-3">Executive Summary</span>
                        <p class="text-base sm:text-lg text-sand/90 leading-relaxed font-light">
                            {{ $issue['body'] }}
                        </p>
                    </div>

                    <div class="space-y-4 pt-4 text-slate">
                        <p>
                            At DACFIN, our investor education releases aim to provide actionable market intelligence free of short-term noise. Markets naturally traverse cycles of optimism and correction; an investor anchored in structured asset allocation consistently outperforms speculative decision-making.
                        </p>
                        <p>
                            To receive our full PDF newsletter edition or discuss how current market developments influence your specific portfolio milestones, schedule a complimentary consultation with one of our certified wealth advisors.
                        </p>
                    </div>
                @else
                    <div class="p-10 rounded-[2rem] bg-white border border-sand text-center space-y-4">
                        <span class="text-xs uppercase font-bold tracking-widest text-saffron">Issue In Preparation</span>
                        <h3 class="font-display font-bold text-2xl text-ink">This issue will be available soon</h3>
                        <p class="text-slate text-sm max-w-md mx-auto">
                            Our research team is compiling the comprehensive data and insights for this edition.
                        </p>
                        <div class="pt-2">
                            <x-ui.button :href="route('journal.index')" variant="ghost" class="text-xs">
                                Return to Journal List
                            </x-ui.button>
                        </div>
                    </div>
                @endif
            </article>

            <!-- Bottom Share & Back Link -->
            <div class="pt-8 border-t border-sand flex flex-wrap items-center justify-between gap-4">
                <a href="{{ route('journal.index') }}" class="text-sm font-semibold text-emerald hover:text-ink flex items-center gap-2">
                    <span>&larr;</span>
                    <span>All Wealth Journal Editions</span>
                </a>

                <x-ui.button :href="route('contact')" variant="primary" class="text-xs px-6 py-3">
                    Consult Our Research Team
                </x-ui.button>
            </div>

        </div>
    </section>
@endsection
