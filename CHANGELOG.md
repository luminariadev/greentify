# Changelog

Semua perubahan penting pada Greentify dicatat di sini.

Format berdasarkan [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [0.6.0] - 2026-09-29

### Security
- **Fixed:** `POST /payments/{reference}/confirm` settled the payer's own
  payment. Any user could mark a donation `completed` or activate a paid
  membership by pressing one button, with no transfer and no verification —
  while the payment page stated the opposite. Confirming now only submits a
  claim; settlement requires an operator decision.

### Added
- Payment status `in_review` with `submitted_at`, `reviewed_by`,
  `reviewed_at`, and `review_note` columns
- Operator review queue at `/admin/payments` with approve/reject, a
  mandatory rejection reason, and decision history
- `PaymentReviewed` notification so the payer learns the outcome
- EMVCo/QRIS payload builder with CRC-16/CCITT-FALSE and the payment
  reference embedded in the merchant account tag
- `PaymentManager::reconcile()` and `php artisan payments:reconcile` for
  scheduled gateway polling and a stale-payment report

### Fixed
- Merchant names containing accented characters emitted a stray apostrophe
  (`É` → `E'`) into the QR payload via `iconv` transliteration

### Changed
- Test count 72 → 101; `test_confirming_a_payment_settles_it_once` was
  asserting the buggy behaviour and now asserts the claim semantics

## [0.5.1] - 2026-08-31

### Maintenance
- Dependency security audit and version alignment
- Documentation refresh and project metadata update

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
# Daily maintenance 2026-09-03 00:20:33
# Daily maintenance 2026-09-04 18:20:51
# Daily maintenance 2026-09-04 18:23:05
