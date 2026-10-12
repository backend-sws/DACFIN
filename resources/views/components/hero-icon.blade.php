@props(['name'])

<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor"
     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($name)
        @case('chart')   <path d="M4 20V11M10 20V4M16 20v-6M22 20H2"/> @break
        @case('clock')   <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/> @break
        @case('shield')  <path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3z"/><path d="M9 12l2 2 4-4"/> @break
        @case('invest')  <rect x="4" y="4" width="16" height="16" rx="3"/><path d="M8 15l3-3 2 2 3-4"/> @break
        @case('plan')    <circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r=".9" fill="currentColor"/> @break
        @case('more')    <g fill="currentColor" stroke="none"><circle cx="7.5" cy="7.5" r="1.6"/><circle cx="16.5" cy="7.5" r="1.6"/><circle cx="7.5" cy="16.5" r="1.6"/><circle cx="16.5" cy="16.5" r="1.6"/></g> @break
        @case('arrow')   <path d="M5 12h14M13 6l6 6-6 6"/> @break
        @case('mark')    <path fill="currentColor" stroke="none" d="M6 4h12v3.2H9.4v3.1H16v3.2H9.4V20H6z"/> @break
    @endswitch
</svg>
