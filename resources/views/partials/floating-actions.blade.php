@php
    $phoneTel = config('fincun.site.primary_phone_tel', '+919934675399');
    $phoneDisplay = config('fincun.site.phones.0', '+91 9934675399');
    $whatsappNum = config('fincun.site.whatsapp', '9934675399');
    
    // Build WhatsApp URL with prefilled greeting message
    $baseWaUrl = config('fincun.site.whatsapp_url', 'https://wa.me/919934675399');
    if (!str_contains($baseWaUrl, 'text=')) {
        $separator = str_contains($baseWaUrl, '?') ? '&' : '?';
        $whatsappUrl = $baseWaUrl . $separator . 'text=' . urlencode('Hello DACFIN, I would like to consult regarding financial planning and wealth management services.');
    } else {
        $whatsappUrl = $baseWaUrl;
    }
@endphp

<!-- Floating Call & WhatsApp Action Buttons -->
<div class="fixed bottom-5 right-4 sm:bottom-7 sm:right-7 z-40 flex flex-col items-end gap-3 pointer-events-auto print:hidden" role="region" aria-label="Quick Contact Actions">
    
    <!-- 1. Direct Phone Call Button -->
    <div class="relative group flex items-center">
        <!-- Desktop Hover Label / Tooltip -->
        <div class="hidden sm:flex items-center gap-2 absolute right-full mr-3.5 px-3 py-1.5 rounded-xl bg-ink/95 backdrop-blur-md border border-[#5C82CE]/35 text-white shadow-xl shadow-black/25 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none transition-all duration-200 whitespace-nowrap">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <div class="text-left">
                <span class="block text-[11px] font-medium text-[#dbeafe]">Call Us Directly</span>
                <span class="block text-xs font-bold text-white">{{ $phoneDisplay }}</span>
            </div>
            <!-- Tooltip pointer arrow -->
            <div class="absolute right-[-5px] top-1/2 -translate-y-1/2 w-2.5 h-2.5 bg-ink/95 border-t border-r border-[#5C82CE]/35 rotate-45"></div>
        </div>

        <a 
            href="tel:{{ $phoneTel }}" 
            class="relative w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-gradient-to-br from-[#1B3676] via-[#162D63] to-[#0D1C44] text-white flex items-center justify-center shadow-lg shadow-[#0D1C44]/35 hover:shadow-xl hover:shadow-[#1B3676]/45 border border-[#5C82CE]/40 transition-all duration-300 hover:scale-110 active:scale-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-[#5C82CE]/60 group"
            aria-label="Call DACFIN at {{ $phoneDisplay }}"
            title="Call {{ $phoneDisplay }}"
        >
            <!-- Gentle Glow on Hover -->
            <span class="absolute inset-0 rounded-full bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
            
            <!-- Phone Icon -->
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
        </a>
    </div>

    <!-- 2. WhatsApp Direct Chat Button -->
    <div class="relative group flex items-center">
        <!-- Desktop Hover Label / Tooltip -->
        <div class="hidden sm:flex items-center gap-2 absolute right-full mr-3.5 px-3 py-1.5 rounded-xl bg-ink/95 backdrop-blur-md border border-[#25D366]/40 text-white shadow-xl shadow-black/25 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none transition-all duration-200 whitespace-nowrap">
            <span class="w-2 h-2 rounded-full bg-[#25D366] animate-ping"></span>
            <div class="text-left">
                <span class="block text-[11px] font-medium text-[#86efac]">Chat on WhatsApp</span>
                <span class="block text-xs font-bold text-white">+91 {{ $whatsappNum }} <span class="text-[10px] font-normal text-[#86efac]/80">&bull; Instant reply</span></span>
            </div>
            <!-- Tooltip pointer arrow -->
            <div class="absolute right-[-5px] top-1/2 -translate-y-1/2 w-2.5 h-2.5 bg-ink/95 border-t border-r border-[#25D366]/40 rotate-45"></div>
        </div>

        <a 
            href="{{ $whatsappUrl }}" 
            target="_blank" 
            rel="noopener noreferrer" 
            class="relative w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-gradient-to-br from-[#25D366] to-[#1EBE5D] text-white flex items-center justify-center shadow-lg shadow-[#25D366]/35 hover:shadow-xl hover:shadow-[#25D366]/50 border border-white/35 transition-all duration-300 hover:scale-110 active:scale-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-[#25D366]/60 group"
            aria-label="Chat with DACFIN on WhatsApp at +91 {{ $whatsappNum }}"
            title="Chat on WhatsApp"
        >
            <!-- Pulsing Radar Wave Ring -->
            <span class="absolute -inset-1 rounded-full bg-[#25D366]/35 animate-ping pointer-events-none"></span>

            <!-- Subtle Inner Glow -->
            <span class="absolute inset-0 rounded-full bg-white/15 opacity-0 group-hover:opacity-100 transition-opacity"></span>

            <!-- Official WhatsApp Icon SVG -->
            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white fill-current relative z-10 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24">
                <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2ZM12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19.01L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 14.99 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67ZM8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7.02 8.48 7.02 9.68C7.02 10.88 7.89 12.04 8.01 12.2C8.13 12.37 9.71 14.81 12.14 15.86C14.16 16.73 14.57 16.56 15.01 16.52C15.45 16.48 16.43 15.94 16.63 15.37C16.84 14.81 16.84 14.33 16.78 14.22C16.71 14.12 16.55 14.06 16.31 13.94C16.07 13.82 14.89 13.24 14.67 13.16C14.45 13.08 14.29 13.04 14.13 13.28C13.97 13.53 13.51 14.06 13.37 14.22C13.23 14.39 13.09 14.41 12.85 14.29C12.61 14.17 11.83 13.91 10.91 13.09C10.19 12.45 9.7 11.66 9.56 11.42C9.42 11.18 9.54 11.04 9.66 10.92C9.77 10.81 9.91 10.63 10.03 10.49C10.15 10.35 10.19 10.25 10.27 10.09C10.35 9.93 10.31 9.79 10.25 9.67C10.19 9.55 9.73 8.42 9.54 7.96C9.35 7.51 9.16 7.57 9.02 7.56C8.89 7.55 8.73 7.33 8.53 7.33Z"/>
            </svg>
        </a>
    </div>
</div>
