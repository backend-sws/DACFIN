@extends('layouts.app')

@section('page', 'loan-mf')
@section('title', 'Loan Against Mutual Funds')

@section('content')
    <x-page-hero 
        eyebrow="Instant Liquidity Solution" 
        title="Access Urgent Capital Without Liquidating Your Investments" 
        text="Keep your compounding intact while unlocking instant digital credit against your mutual fund holdings."
        :breadcrumbs="[['label' => 'Loan Against MF']]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x space-y-16">
            
            <!-- Explainer Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6" data-reveal="right">
                    <x-ui.section-title 
                        eyebrow="Why Pledge Instead of Redeem?" 
                        title="Don't Interrupt Decades of Compounding for Short-Term Cash Needs" 
                    />

                    <!-- PLACEHOLDER: replace with original text from fincun.in/loan-against-mf -->
                    <div class="space-y-4 text-slate text-base sm:text-lg leading-relaxed">
                        <p>
                            Redeeming mutual fund units during an emergency triggers capital gains taxes and forfeits future market compounding. A Loan Against Mutual Funds (LAMF) offers a prudent credit alternative.
                        </p>
                        <p>
                            By pledging your mutual fund units with leading RBI-regulated lending institutions, you receive an overdraft limit or instant loan disbursed directly to your bank account within hours.
                        </p>
                    </div>

                    <div class="pt-2">
                        <x-ui.button :href="route('contact')" variant="primary" class="text-sm px-8 py-3.5">
                            Apply for Loan Against MF &rarr;
                        </x-ui.button>
                    </div>
                </div>

                <div class="lg:col-span-5" data-reveal="left">
                    <div class="rounded-[2.5rem] p-8 sm:p-10 bg-forest text-cream border border-emerald/30 shadow-2xl space-y-6" data-tilt>
                        <span class="text-xs uppercase font-bold tracking-widest text-mint block">Core Highlights</span>

                        <ul class="space-y-4 text-sm text-sand/90">
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-saffron/20 text-saffron flex items-center justify-center shrink-0 font-bold text-xs">✓</span>
                                <span><strong>Attractive Interest Rates:</strong> Pay interest solely on the amount utilized, not the entire sanctioned limit.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-saffron/20 text-saffron flex items-center justify-center shrink-0 font-bold text-xs">✓</span>
                                <span><strong>Zero Prepayment Penalty:</strong> Repay anytime as your cash flow allows with zero foreclosure charges.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-saffron/20 text-saffron flex items-center justify-center shrink-0 font-bold text-xs">✓</span>
                                <span><strong>Fast Digital Lien:</strong> 100% paperless lien marking via CAMS / KFintech in minutes.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-saffron/20 text-saffron flex items-center justify-center shrink-0 font-bold text-xs">✓</span>
                                <span><strong>Both Equity &amp; Debt:</strong> Up to 50% on equity funds and up to 80% on debt/liquid mutual funds.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- How it works 4-step cards -->
            <div class="pt-8 border-t border-sand space-y-8">
                <div class="text-center max-w-xl mx-auto space-y-2">
                    <span class="text-xs uppercase font-bold tracking-widest text-emerald block">Process Flow</span>
                    <h3 class="font-display font-bold text-2xl sm:text-3xl text-ink">How to Avail in 4 Simple Steps</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-stagger>
                    <div class="p-6 rounded-3xl bg-white border border-sand shadow-sm space-y-2" data-tilt>
                        <span class="font-mono text-xs font-bold text-saffron">01</span>
                        <h4 class="font-display font-bold text-lg text-ink">Portfolio Assessment</h4>
                        <p class="text-xs text-slate">We verify your mutual fund units across registrar portals.</p>
                    </div>

                    <div class="p-6 rounded-3xl bg-white border border-sand shadow-sm space-y-2" data-tilt>
                        <span class="font-mono text-xs font-bold text-saffron">02</span>
                        <h4 class="font-display font-bold text-lg text-ink">Limit Sanction</h4>
                        <p class="text-xs text-slate">Loan limit approved based on eligible NAV values.</p>
                    </div>

                    <div class="p-6 rounded-3xl bg-white border border-sand shadow-sm space-y-2" data-tilt>
                        <span class="font-mono text-xs font-bold text-saffron">03</span>
                        <h4 class="font-display font-bold text-lg text-ink">Digital Lien Marking</h4>
                        <p class="text-xs text-slate">Secure OTP-based pledge marking without physical paperwork.</p>
                    </div>

                    <div class="p-6 rounded-3xl bg-white border border-sand shadow-sm space-y-2" data-tilt>
                        <span class="font-mono text-xs font-bold text-saffron">04</span>
                        <h4 class="font-display font-bold text-lg text-ink">Instant Disbursement</h4>
                        <p class="text-xs text-slate">Funds credited directly into your verified bank account.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
