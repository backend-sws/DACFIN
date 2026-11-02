export default function contactForm(options = {}) {
    const rawNumber = options.whatsappPhone || '9934675399';
    const cleanNumber = String(rawNumber).replace(/[^0-9]/g, '');
    const defaultFullNumber = cleanNumber.length === 10 ? `91${cleanNumber}` : cleanNumber;

    return {
        loading: false,
        successModal: false,
        errorMessage: null,
        errors: {},
        whatsappUrl: `https://wa.me/${defaultFullNumber}`,
        form: {
            name: '',
            phone: '',
            email: '',
            interest: '',
            message: '',
            website: '' // honeypot
        },

        buildWhatsAppUrl() {
            const lines = [
                'Hello DACFIN,',
                '',
                'I would like to inquire regarding financial services:',
                `*Name:* ${this.form.name.trim()}`,
                `*Phone:* ${this.form.phone.trim()}`,
                `*Email:* ${this.form.email.trim()}`
            ];

            if (this.form.interest && this.form.interest.trim()) {
                lines.push(`*Interested In:* ${this.form.interest.trim()}`);
            }

            if (this.form.message && this.form.message.trim()) {
                lines.push(`*Message:* ${this.form.message.trim()}`);
            }

            return `https://wa.me/${defaultFullNumber}?text=${encodeURIComponent(lines.join('\n'))}`;
        },

        validate() {
            this.errors = {};
            if (!this.form.name || !this.form.name.trim()) {
                this.errors.name = ['Full name is required.'];
            }
            if (!this.form.phone || !this.form.phone.trim()) {
                this.errors.phone = ['Phone number is required.'];
            } else if (!/^[0-9+\-\s]{8,15}$/.test(this.form.phone.trim())) {
                this.errors.phone = ['Please enter a valid phone number.'];
            }
            if (!this.form.email || !this.form.email.trim()) {
                this.errors.email = ['Email address is required.'];
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email.trim())) {
                this.errors.email = ['Please enter a valid email address.'];
            }
            return Object.keys(this.errors).length === 0;
        },

        async submitForm(event) {
            this.errorMessage = null;

            if (!this.validate()) {
                this.errorMessage = 'Please complete the highlighted fields before sending.';
                return;
            }

            this.loading = true;
            const waUrl = this.buildWhatsAppUrl();
            this.whatsappUrl = waUrl;

            // Open WhatsApp window synchronously during user click/submit gesture to avoid popup blockers
            let waWindow = null;
            let popupBlocked = false;
            try {
                waWindow = window.open(waUrl, '_blank');
                if (!waWindow || waWindow.closed || typeof waWindow.closed === 'undefined') {
                    popupBlocked = true;
                }
            } catch (e) {
                popupBlocked = true;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            try {
                const response = await fetch('/contact-us', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken || '',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(this.form),
                    keepalive: true
                });

                const data = await response.json();

                if (response.ok && data.ok) {
                    if (data.whatsapp_url) {
                        this.whatsappUrl = data.whatsapp_url;
                    }
                    this.successModal = true;
                    this.form = {
                        name: '',
                        phone: '',
                        email: '',
                        interest: '',
                        message: '',
                        website: ''
                    };
                } else if (response.status === 422) {
                    this.errors = data.errors || {};
                    this.errorMessage = 'Please correct the highlighted fields and try again.';
                } else {
                    this.successModal = true;
                }
            } catch (err) {
                console.error(err);
                this.successModal = true;
            } finally {
                this.loading = false;
                if (popupBlocked) {
                    window.location.href = this.whatsappUrl;
                }
            }
        }
    };
}
