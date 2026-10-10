@extends('layouts.app')

@section('page', 'mobile-apps')
@section('title', 'Mobile Apps')

@section('content')
    <x-page-hero 
        eyebrow="Digital Advisory Experience" 
        title="Your Wealth Dashboard, In Your Pocket" 
        text="Track, monitor, and manage your mutual funds, NPS holdings, and goals seamlessly wherever you go."
        :breadcrumbs="[['label' => 'Mobile Apps']]"
    />

    <section class="section-y bg-cream overflow-hidden">
        <div class="container-x">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left: App Features (7 cols) -->
                <div class="lg:col-span-7 space-y-8" data-reveal="right">
                    <x-ui.section-title 
                        eyebrow="FINCUN Client App" 
                        title="Intelligent Portfolio Tracking Designed for Simplicity" 
                    />

                    <!-- PLACEHOLDER: replace with original text from fincun.in/mobile-apps -->
                    <p class="text-slate text-base sm:text-lg leading-relaxed">
                        The official FINCUN mobile app connects directly with your investment portfolio, providing daily valuations, automated capital gains reports, and one-tap rebalancing requests.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-5 rounded-2xl bg-white border border-sand shadow-sm space-y-1.5">
                            <span class="text-saffron font-bold text-sm block">01 &bull; Real-Time Valuation</span>
                            <h4 class="font-display font-semibold text-ink text-base">Live Net Worth Tracker</h4>
                            <p class="text-xs text-slate">Consolidated view of equity, debt, liquid funds, and NPS.</p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white border border-sand shadow-sm space-y-1.5">
                            <span class="text-saffron font-bold text-sm block">02 &bull; Goal Progress</span>
                            <h4 class="font-display font-semibold text-ink text-base">Target Milestones</h4>
                            <p class="text-xs text-slate">Visual trackers for retirement, education, and wealth targets.</p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white border border-sand shadow-sm space-y-1.5">
                            <span class="text-saffron font-bold text-sm block">03 &bull; Bank-Grade Security</span>
                            <h4 class="font-display font-semibold text-ink text-base">Biometric &amp; 256-Bit SSL</h4>
                            <p class="text-xs text-slate">Your financial records and transactions remain protected.</p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white border border-sand shadow-sm space-y-1.5">
                            <span class="text-saffron font-bold text-sm block">04 &bull; Direct Advisor Desk</span>
                            <h4 class="font-display font-semibold text-ink text-base">Instant Consultation</h4>
                            <p class="text-xs text-slate">Connect with your dedicated wealth manager directly in-app.</p>
                        </div>
                    </div>

                    <!-- Download Row -->
                    <div class="pt-4 flex flex-wrap items-center gap-6">
                        <a href="{{ config('fincun.site.play_store') }}" target="_blank" rel="noopener noreferrer" class="transition-transform hover:scale-105 inline-block">
                            <img src="{{ asset('images/google-play-badge.svg') }}" alt="Google Play" width="160" height="48" class="h-12 w-auto">
                        </a>

                        <span class="text-xs text-slate font-medium">Compatible with Android 8.0 &amp; Above</span>
                    </div>
                </div>

                <!-- Right: QR Code Card (5 cols) -->
                <div class="lg:col-span-5" data-reveal="left">
                    <div class="rounded-[2.5rem] p-8 sm:p-12 bg-forest text-cream border border-emerald/30 shadow-2xl text-center space-y-6" data-tilt>
                        <span class="text-xs uppercase font-bold tracking-widest text-mint block">Instant Mobile Download</span>
                        
                        <div class="p-4 bg-cream rounded-3xl inline-block shadow-inner">
                            <img src="{{ asset('images/qr-code.svg') }}" alt="Scan QR Code" width="180" height="180" class="w-44 h-44 mx-auto">
                        </div>

                        <div class="space-y-1">
                            <h4 class="font-display font-bold text-xl text-cream">Scan with Camera</h4>
                            <p class="text-xs text-sand/70">Point your smartphone camera at the QR code to open the Google Play Store directly.</p>
                        </div>

                        <div class="pt-2 border-t border-emerald/20 text-[11px] text-sand/60">
                            Package ID: <span class="font-mono text-saffron">com.fincun.client</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
