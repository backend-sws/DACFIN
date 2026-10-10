export default function contactForm() {
    return {
        loading: false,
        successModal: false,
        errorMessage: null,
        errors: {},
        form: {
            name: '',
            phone: '',
            email: '',
            interest: '',
            message: '',
            website: '' // honeypot
        },

        async submitForm(event) {
            this.loading = true;
            this.errorMessage = null;
            this.errors = {};

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
                    body: JSON.stringify(this.form)
                });

                const data = await response.json();

                if (response.ok && data.ok) {
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
                } else if (response.status === 429) {
                    this.errorMessage = 'Too many requests. Please wait a minute before submitting again.';
                } else {
                    this.errorMessage = data.message || 'Something went wrong. Please try again or reach out by phone.';
                }
            } catch (err) {
                console.error(err);
                this.errorMessage = 'Network error. Please check your internet connection or call our office.';
            } finally {
                this.loading = false;
            }
        }
    };
}
