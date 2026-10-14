@php $h = config('fincun.hero'); @endphp

<section class="hero is-ready" data-hero aria-labelledby="hero-title">
    <div class="hero__bg" style="--hero-bg: url('{{ asset($h['bg']) }}')" aria-hidden="true"></div>
    <div class="hero__wash" aria-hidden="true"></div>

    <div class="hero__inner">
        {{-- LEFT --}}
        <div class="hero__copy">
            <span class="hero__badge"><i class="hero__dot"></i>{{ $h['badge'] }}</span>

            <h1 id="hero-title" class="hero__title">
                @foreach ($h['title'] as $line)
                    <span class="line"><span class="line__in">
                        @foreach ($line as [$text, $soft])<span @class(['soft' => $soft])>{{ $text }}</span>@endforeach
                    </span></span>
                @endforeach
            </h1>

            <p class="hero__text">{{ $h['text'] }}</p>

            <div class="hero__cta">
                <a class="hero__btn" href="{{ url($h['primary'][1]) }}">{{ $h['primary'][0] }}</a>
                <a class="hero__link" href="{{ url($h['secondary'][1]) }}">
                    <span class="hero__circle"><x-hero-icon name="arrow" /></span>
                    {{ $h['secondary'][0] }}
                </a>
            </div>

            <ul class="hero__features">
                @foreach ($h['features'] as [$icon, $label])
                    <li><span class="hero__ficon"><x-hero-icon :name="$icon" /></span><span>{{ $label }}</span></li>
                @endforeach
            </ul>
        </div>

        {{-- RIGHT --}}
        <div class="hero__visual" style="opacity: 0; transform: translate3d(240px, 0, 0); will-change: transform, opacity;">
            <article class="hcard" data-hcard aria-label="Sample portfolio card">
                <header class="hcard__head">
                    <span class="hcard__brand">
                        <span class="hcard__mark overflow-hidden"><img src="{{ asset('images/dacfin-badge.svg') }}" class="w-5 h-5 rounded-full object-contain" alt="DACFIN"></span>{{ $h['card']['brand'] }}
                    </span>
                    <span class="hcard__toggle" aria-hidden="true"><i></i></span>
                </header>

                <p class="hcard__label">{{ $h['card']['label'] }}</p>
                <p class="hcard__value"
                   data-count="{{ $h['card']['value'] }}"
                   data-currency="{{ $h['card']['currency'] }}"
                   data-locale="{{ $h['card']['locale'] }}">{{ $h['card']['display'] }}</p>

                <ul class="hcard__actions">
                    @foreach ($h['card']['actions'] as [$icon, $label])
                        <li>
                            <span class="hcard__btn"><x-hero-icon :name="$icon" /></span>
                            <small>{{ $label }}</small>
                        </li>
                    @endforeach
                </ul>
            </article>

            @foreach ($h['floats'] as $f)
                <aside class="hfloat hfloat--{{ $loop->iteration }}" data-float aria-hidden="true">
                    <span class="hfloat__av">{{ $f['avatar'] }}</span>
                    <div class="hfloat__body">
                        <strong>{{ $f['title'] }}</strong>
                        <span><b>{{ $f['amount'] }}</b><em>{{ $f['meta'] }}</em></span>
                    </div>
                </aside>
            @endforeach

            <p class="hero__note">{{ $h['card']['illustrative'] }}</p>
        </div>
    </div>

    <span class="hero__vertical" aria-hidden="true">{{ $h['vertical_text'] }}</span>
</section>
