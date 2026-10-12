# DACFIN — Dacfin Services Private Limited

Official website for **Dacfin Services Private Limited** — *Invest Today, Prosper Tomorrow.*

Built with Laravel 11, Tailwind CSS v4, GSAP ScrollTrigger, Alpine.js, and Lenis smooth scrolling.

---

## Company Information

- **Company Name:** Dacfin Services Private Limited
- **Brand:** DACFIN
- **Tagline:** Invest Today, Prosper Tomorrow.
- **Directors:** Dharmendra Kumar, Asha Kumari
- **Contact Person:** Dharmendra Kumar
- **Phone / WhatsApp:** +91 9934675399
- **Email:** dharmendra@dacfin.org
- **Address:** Shop No 14, Vijay Aman Apartment, Main Road, Near Gravity Mall, Kankarbagh, Patna, Bihar - 800020
- **Corporate Identity Number (CIN):** U67190BR2016PTC025796
- **AMFI Registration:** AMFI Registered Mutual Fund Distributor

---

## Tech Stack

- **Backend:** Laravel 11 (PHP 8.3)
- **Frontend:** Tailwind CSS v4, Blade Templates, Alpine.js
- **Animations:** GSAP 3 (ScrollTrigger), Lenis Smooth Scroll
- **Database:** SQLite (default) / MySQL supported
- **Asset Bundler:** Vite 6

---

## Quick Start

### 1. Requirements
- PHP 8.2 or 8.3
- Composer 2+
- Node.js 18+ & npm

### 2. Setup
```bash
# Clone the repository
git clone https://github.com/backend-sws/DACFIN.git
cd DACFIN

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Build frontend assets
npm run build

# Start the development server
php artisan serve
```

### 3. Tests
```bash
php artisan test
```
