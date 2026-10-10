@props([
    'items' => [
        'Mutual Funds', 'National Pension Scheme (NPS)', 'Portfolio Management (PMS)', 
        'Alternate Investment Funds (AIF)', 'Disciplined SIP', 'Loan Against MF', 
        'Comprehensive Insurance', 'Tax Planning', 'Retirement Advisory'
    ],
    'dark' => true,
])

<div class="relative w-full overflow-hidden py-6 {{ $dark ? 'bg-ink text-cream border-y border-emerald/20' : 'bg-sand/30 text-ink border-y border-sand' }}" data-marquee>
    <div class="flex whitespace-nowrap marquee-inner gap-8 items-center font-display text-lg sm:text-xl md:text-2xl font-semibold tracking-wider uppercase">
        @for($loopIdx = 0; $loopIdx < 2; $loopIdx++)
            <div class="flex items-center gap-8 shrink-0 marquee-track">
                @foreach($items as $item)
                    <span class="hover:text-saffron transition-colors cursor-default">{{ $item }}</span>
                    <span class="w-2 h-2 rounded-full bg-saffron/70 inline-block"></span>
                @endforeach
            </div>
        @endfor
    </div>
</div>
