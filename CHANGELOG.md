# Changelog

Semua perubahan penting pada Greentify dicatat di sini.

Format berdasarkan [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [0.5.0] - 2026-08-17

### Added
- REST API endpoints (articles, categories, auth) with Sanctum token
- Feature tests: Donation, Membership, Marketplace, Newsletter, API
- Unit tests: User role, Donation scope
- CI/CD pipeline (GitHub Actions: PHP matrix, Pint, Vite build)
- Dependabot configuration
- CONTRIBUTING.md and SECURITY.md

## [0.4.0] - 2026-08-10

### Added
- Progressive Web App (PWA): manifest.json, service worker
- Email Newsletter: mailable, unsubscribe page, admin send form
- Role & Permission: admin middleware, user role column
- Landing Page (SEO-friendly)

## [0.3.0] - 2026-08-08

### Added
- Green Marketplace (affiliate products)
- Premium Membership: tiers, pricing page, subscribe
- Iklan & Sponsored Post: ad display, click tracking
- Donasi: QRIS/Transfer/E-Wallet, preset amounts

## [0.2.0] - 2026-07-20

### Added
- User authentication (login/register/logout)
- CRUD Artikel dengan rich text editor
- Sistem komentar & reply
- Profil pengguna
- Contact form

## [0.1.0] - 2026-07-01

### Added
- Initial release
- Laravel 11 + Tailwind CSS 4
- Blog categories (Limbah, Konservasi, Penghijauan, Hutan)
- Database migrations & seeders
