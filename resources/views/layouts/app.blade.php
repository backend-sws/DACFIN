<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @include('partials.head')
</head>
<body class="bg-cream text-slate font-sans antialiased selection:bg-emerald selection:text-white" x-data="header()" data-page="@yield('page', 'default')">
    <!-- Grain Overlay -->
    <div class="grain-overlay" aria-hidden="true"></div>

    <!-- Page Transition Curtain -->
    <div id="curtain" class="fixed inset-0 z-[100] bg-ink pointer-events-none hidden" aria-hidden="true"></div>

    <!-- Custom Cursor -->
    <div id="cursor" class="hidden lg:block" aria-hidden="true"></div>

    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main id="main" class="min-h-screen">
        @yield('content')
    </main>

    <!-- Global CTA Band (unless page defines no_cta) -->
    @unless (View::hasSection('no_cta'))
        @include('partials.cta-band')
    @endunless

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
