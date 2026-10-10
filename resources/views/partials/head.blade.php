@php
    $pageTitle = trim($__env->yieldContent('title'));
    $fullTitle = $pageTitle ? ($pageTitle . ' | ' . config('fincun.site.brand')) : config('fincun.site.meta.title');
@endphp

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $fullTitle }}</title>
<meta name="description" content="@yield('meta_description', config('fincun.site.meta.description'))">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="@yield('meta_description', config('fincun.site.meta.description'))">
<meta property="og:image" content="{{ asset(config('fincun.site.meta.image')) }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="@yield('meta_description', config('fincun.site.meta.description'))">
<meta name="twitter:image" content="{{ asset(config('fincun.site.meta.image')) }}">

<!-- Favicon -->
<link rel="icon" type="image/svg+xml" href="{{ asset('images/fincun-logo.svg') }}">

<!-- Google Fonts: Fraunces & Manrope -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400..800;1,9..144,400..700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Progressive Enhancement JS Detection -->
<script>
  document.documentElement.classList.add('js');
</script>

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'FinancialService',
  'name' => config('fincun.site.name'),
  'alternateName' => config('fincun.site.brand'),
  'url' => url('/'),
  'logo' => asset('images/fincun-logo.svg'),
  'description' => config('fincun.site.meta.description'),
  'email' => config('fincun.site.email'),
  'telephone' => config('fincun.site.primary_phone_tel'),
  'openingHours' => 'Mo-Sa 08:00-20:00',
  'address' => [
    [
      '@type' => 'PostalAddress',
      'streetAddress' => 'I/J-2, Chandi Vyapar Bhawan, Exhibition Road',
      'addressLocality' => 'Patna',
      'postalCode' => '800001',
      'addressRegion' => 'Bihar',
      'addressCountry' => 'IN'
    ],
    [
      '@type' => 'PostalAddress',
      'streetAddress' => 'G-2, Kanhai Complex, Argora chowk',
      'addressLocality' => 'Ranchi',
      'postalCode' => '834002',
      'addressRegion' => 'Jharkhand',
      'addressCountry' => 'IN'
    ]
  ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
