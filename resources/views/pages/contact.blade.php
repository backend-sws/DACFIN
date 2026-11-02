@extends('layouts.app')

@section('page', 'contact')
@section('title', 'Contact Us')

@php
    $site = config('fincun.site');
@endphp

@section('content')
    <x-page-hero 
        eyebrow="Contact Us" 
        title="Let's talk about where your money's headed" 
        text="Reach out for a free consultation. Our advisors typically respond within one business day."
        :breadcrumbs="[['label' => 'Contact Us']]"
    />

    <section class="section-y bg-cream overflow-hidden" x-data="contactForm({ whatsappPhone: '{{ $site['whatsapp'] ?? '9934675399' }}' })">
        <div class="container-x">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Left: Contact Form (7 cols) -->
                <div class="lg:col-span-7 bg-white p-8 sm:p-12 rounded-[2.5rem] border border-sand shadow-lg space-y-8" data-reveal="right">
                    <div class="space-y-2">
                        <span class="text-xs uppercase font-bold tracking-widest text-emerald block">Inquiry Desk</span>
                        <h2 class="h-display text-2xl sm:text-3xl font-bold text-ink">
                            Send us a message
                        </h2>
                        <p class="text-xs sm:text-sm text-slate">
                            Fill out the form below and your message will be sent directly to our advisor on WhatsApp (+91 {{ $site['whatsapp'] ?? '9934675399' }}).
                        </p>
                    </div>

                    <!-- Server Error Notice if any -->
                    <div x-show="errorMessage" x-cloak class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm">
                        <span x-text="errorMessage"></span>
                    </div>

                    <form @submit.prevent="submitForm" method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        <!-- Honeypot field (hidden off-screen) -->
                        <div class="hidden" aria-hidden="true" style="display: none !important;">
                            <label for="website">Leave blank</label>
                            <input type="text" id="website" name="website" x-model="form.website" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-ink">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                x-model="form.name"
                                required 
                                placeholder="e.g. Ramesh Kumar"
                                class="w-full px-5 py-3.5 rounded-2xl border border-sand bg-cream/40 text-ink text-sm focus:border-emerald focus:bg-white transition-all outline-none"
                                :class="{ 'border-red-400': errors.name }"
                            >
                            <template x-if="errors.name">
                                <span class="text-red-500 text-xs" x-text="errors.name[0]"></span>
                            </template>
                        </div>

                        <!-- Phone & Email Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="space-y-1.5">
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-ink">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    x-model="form.phone"
                                    required 
                                    placeholder="+91 98765 43210"
                                    class="w-full px-5 py-3.5 rounded-2xl border border-sand bg-cream/40 text-ink text-sm focus:border-emerald focus:bg-white transition-all outline-none"
                                    :class="{ 'border-red-400': errors.phone }"
                                >
                                <template x-if="errors.phone">
                                    <span class="text-red-500 text-xs" x-text="errors.phone[0]"></span>
                                </template>
                            </div>

                            <!-- Email -->
                            <div class="space-y-1.5">
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-ink">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    x-model="form.email"
                                    required 
                                    placeholder="ramesh@example.com"
                                    class="w-full px-5 py-3.5 rounded-2xl border border-sand bg-cream/40 text-ink text-sm focus:border-emerald focus:bg-white transition-all outline-none"
                                    :class="{ 'border-red-400': errors.email }"
                                >
                                <template x-if="errors.email">
                                    <span class="text-red-500 text-xs" x-text="errors.email[0]"></span>
                                </template>
                            </div>
                        </div>

                        <!-- Interest -->
                        <div class="space-y-1.5">
                            <label for="interest" class="block text-xs font-bold uppercase tracking-wider text-ink">
                                I'm Interested In
                            </label>
                            <select 
                                id="interest" 
                                name="interest" 
                                x-model="form.interest"
                                class="w-full px-5 py-3.5 rounded-2xl border border-sand bg-cream/40 text-ink text-sm focus:border-emerald focus:bg-white transition-all outline-none"
                            >
                                <option value="">Select an area of financial focus</option>
                                <option value="Financial Planning">Financial Planning</option>
                                <option value="Investment Advise">Investment Advise</option>
                                <option value="Wealth Management">Wealth Management</option>
                                <option value="Insurance">Insurance</option>
                                <option value="Loan">Loan</option>
                                <option value="Training">Training</option>
                            </select>
                            <template x-if="errors.interest">
                                <span class="text-red-500 text-xs" x-text="errors.interest[0]"></span>
                            </template>
                        </div>

                        <!-- Message -->
                        <div class="space-y-1.5">
                            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-ink">
                                Your Message / Requirement
                            </label>
                            <textarea 
                                id="message" 
                                name="message" 
                                x-model="form.message"
                                rows="4" 
                                placeholder="Describe your current financial goals or what you'd like guidance on..."
                                class="w-full px-5 py-3.5 rounded-2xl border border-sand bg-cream/40 text-ink text-sm focus:border-emerald focus:bg-white transition-all outline-none resize-none"
                            ></textarea>
                            <template x-if="errors.message">
                                <span class="text-red-500 text-xs" x-text="errors.message[0]"></span>
                            </template>
                        </div>

                        <!-- Submit Button with Spinner & WhatsApp Icon -->
                        <div>
                            <button 
                                type="submit" 
                                :disabled="loading"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-white text-ink font-semibold text-sm border-2 border-sand hover:border-emerald hover:bg-cream/40 shadow-sm hover:shadow-md transition-all disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                data-magnetic
                            >
                                <span x-show="!loading" class="inline-flex items-center gap-2.5">
                                    <span class="font-bold text-ink">Send Message</span>
                                    <svg class="w-4 h-4 fill-[#25D366]" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                    </svg>
                                </span>
                                <span x-show="loading" x-cloak class="inline-flex items-center gap-2">
                                    <span class="font-bold text-ink">Connecting WhatsApp...</span>
                                </span>
                                <svg x-show="loading" x-cloak class="w-4 h-4 animate-spin text-ink" viewBox="0 0 24 24" fill="none">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <svg x-show="!loading" class="w-4 h-4 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right: Reach Us Directly & Map (5 cols) -->
                <div class="lg:col-span-5 space-y-8" data-reveal="left">
                    
                    <div class="p-8 sm:p-10 rounded-[2.5rem] bg-forest text-cream border border-emerald/30 shadow-xl space-y-6">
                        <span class="text-xs uppercase font-bold tracking-widest text-mint block">Reach Us Directly</span>
                        
                        <div class="space-y-6 text-sm">
                            <!-- Contact Person & Directors -->
                            <div class="space-y-1">
                                <span class="font-bold text-saffron block">Contact Person:</span>
                                <p class="text-cream font-medium text-base">{{ $site['contact_person'] ?? 'Dharmendra Kumar' }}</p>
                                <p class="text-sand/70 text-xs">Directors: {{ implode(', ', $site['directors'] ?? ['Dharmendra Kumar', 'Asha Kumari']) }}</p>
                            </div>

                            <!-- Offices -->
                            @foreach($site['offices'] as $office)
                                <div class="space-y-1">
                                    <span class="font-bold text-saffron block">{{ $office['city'] }} Headquarters:</span>
                                    <p class="text-sand/90 whitespace-pre-line leading-relaxed">{{ $office['address'] }}</p>
                                </div>
                            @endforeach

                            <div class="pt-4 border-t border-emerald/20 space-y-3">
                                <p>
                                    <span class="text-mint font-semibold block">Phone Number:</span>
                                    <a href="tel:{{ $site['primary_phone_tel'] }}" class="text-cream hover:text-saffron transition-colors">{{ $site['phones'][0] }}</a>
                                </p>
                                <p>
                                    <span class="text-mint font-semibold block">WhatsApp:</span>
                                    <a href="{{ $site['whatsapp_url'] ?? ('https://wa.me/91' . ($site['whatsapp'] ?? '9934675399')) }}" target="_blank" rel="noopener noreferrer" class="text-cream hover:text-saffron transition-colors inline-flex items-center gap-1.5">
                                        <span>+91 {{ $site['whatsapp'] ?? '9934675399' }}</span>
                                        <span class="text-xs px-2 py-0.5 rounded-full bg-emerald/30 text-mint">Chat on WhatsApp &rarr;</span>
                                    </a>
                                </p>
                                <p>
                                    <span class="text-mint font-semibold block">Email:</span>
                                    <a href="mailto:{{ $site['email'] }}" class="text-cream hover:text-saffron transition-colors">{{ $site['email'] }}</a>
                                </p>
                                <p>
                                    <span class="text-mint font-semibold block">Working Hours:</span>
                                    <span class="text-sand/80">{{ $site['hours'] }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Google Maps Iframe -->
                    <div class="rounded-[2.5rem] overflow-hidden border border-sand bg-sand/30 shadow-md aspect-[4/3]">
                        <iframe 
                            src="{{ $site['map_embed'] }}" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="{{ config('fincun.site.brand') }} Office Location Map"
                        ></iframe>
                    </div>

                </div>

            </div>
        </div>

        <!-- Success Modal with Animated Checkmark -->
        <div 
            x-show="successModal" 
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-ink/80 backdrop-blur-md"
            style="display: none;"
        >
            <div 
                @click.away="successModal = false"
                class="rounded-[2.5rem] bg-cream border border-sand p-8 sm:p-12 max-w-md w-full text-center space-y-6 shadow-2xl relative"
            >
                <!-- Animated Checkmark Circle -->
                <div class="w-20 h-20 rounded-full bg-forest text-saffron mx-auto flex items-center justify-center border-2 border-emerald shadow-lg">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div class="space-y-2">
                    <h3 class="font-display font-bold text-2xl text-ink">Redirecting to WhatsApp</h3>
                    <p class="text-sm text-slate leading-relaxed">
                        Your message has been prepared for WhatsApp (+91 {{ $site['whatsapp'] ?? '9934675399' }}). If it didn't open automatically, click the button below:
                    </p>
                </div>

                <div class="pt-2 space-y-3">
                    <a 
                        :href="whatsappUrl"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="px-8 py-3.5 rounded-full bg-[#25D366] hover:bg-[#20bd5a] text-white font-semibold text-sm shadow-md hover:shadow-lg transition-all inline-flex items-center justify-center gap-2.5 w-full cursor-pointer"
                    >
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Open Chat on WhatsApp</span>
                    </a>
                    <button 
                        type="button" 
                        @click="successModal = false"
                        class="px-8 py-3 rounded-full bg-sand/60 hover:bg-sand text-ink font-semibold text-xs transition-colors w-full cursor-pointer"
                    >
                        Close Window
                    </button>
                </div>
            </div>
        </div>

    </section>
@endsection
