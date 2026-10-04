# Changelog

Semua perubahan penting pada Greentify dicatat di sini.

Format berdasarkan [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [0.9.0] - 2026-10-04

### Added
- **Revenue trend on the operator queue** (`App\Payments\Support\RevenueTrend`),
  selectable per day / week / month. The header carried a lifetime total and a
  "today" figure for a while, but an operator still could not tell whether
  revenue was trending up or had been flat for a month — which is the whole
  reason to look at a payment queue at all.
  Three decisions live in the class rather than the view, because each one is
  the difference between a useful figure and a wrong one:
  - Only `paid` counts. `refunded` is excluded on purpose — money that came in
    and went back out is not income, and the page says so out loud so an
    operator can tell "no revenue" from "revenue net of refunds".
  - Periods with no sales are filled with zero, not skipped. Fetching only the
    periods that happen to have rows draws a straight line across a week with
    nothing in it, and a straight line reads as steady revenue.
  - The bucket count is capped at 400. `from`/`to` arrive from the query
    string, and without a ceiling a single mistyped parameter could build
    20 000 buckets on the queue page.
- The chart is deliberately **not** wired to the queue's date filter. A claim
  still sitting in the queue is not revenue, so the two read different rows
  (`submitted_at` against `paid_at`); coupling them would mean filtering the
  claims table silently changed an income figure. Pinned by a test.
- Rendered as inline SVG on a fixed `viewBox`, not a charting library: the
  shape is a dozen rectangles, and Chart.js would add ~200 kB of JavaScript to
  a page whose real content is a table.

### Fixed
- **Two tests in `PaymentQueueFilterTest` were a time bomb.** They asked for
  `from=2026-09-29` while the rows were created with `now()->subDay()`. The two
  agreed for three days, then the suite failed with an empty result set. The
  filter never changed — the window it was measured against did. The window is
  now derived from the rows it is supposed to select.
- Chart axis labels were rendered in English. `config/app.php` ships locale
  `en` and nothing in the app ever calls `Carbon::setLocale()`, so
  `translatedFormat()` produced "04 Oct" on an interface that is entirely in
  Indonesian. Month abbreviations are now spelled out in `RevenueTrend`, which
  is also deterministic instead of ambient.
- Weekly and monthly spans were computed in days regardless of granularity,
  producing a 12-day "weekly" chart and an 11-day "monthly" one. An operator
  comparing last week with the week before was comparing a week against three
  days.

### Verification
```
php vendor/bin/phpunit --no-coverage   → OK (186 tests, 594 assertions)  [dari 179]
php vendor/bin/pint --test            → PASS (141 files)
php vendor/bin/phpstan analyse        → [OK] No errors
npm run build                         → ✓ built
```

## [0.8.0] - 2026-09-30

### Fixed
- **Fixed:** nothing ever moved a payment from `pending` to `expired`.
  `Payment::effectiveStatus()` computed the answer on every render, but the
  row kept saying `pending` forever — so a payment whose QR had been closed
  for a week still counted towards every pending total, and the payer could
  still press "I have transferred" on a code no bank would accept. Added
  `Payment::markExpired()` (only `pending` qualifies; a payment already
  claimed keeps its status because the money may well have landed) plus
  `scopeExpiredPending()`.
- **Fixed:** a payment past its window could still be claimed by the payer.
  `confirm()` checked `status`, and `pending` is always true for an expired
  payment, so the claim reached the operator queue. That is worse than a
  refusal: an operator is asked to check a transfer that cannot exist. The
  claim is now refused with an explanation and the row stays `pending` so
  the sweeper can retire it.
- **Fixed:** `payments:reconcile` existed as a command and was never
  registered in the scheduler — `routes/console.php` contained only
  `inspire`, so the roadmap's "run reconciliation every 5 minutes" was a
  sentence rather than code. Both payment jobs are now scheduled.

### Added
- `payments:expire-stale` command and a scheduler entry every minute, which
  is what turns the expired status into something real
- Date filter (from/to on `submitted_at`) for the operator payment queue,
  with `withQueryString()` so pagination keeps it. An unparseable bound is
  dropped rather than rejected — this is a read-only view of the
  operator's own queue, and a typo should widen the result set instead of
  erroring mid-reconcile.
- The header's "awaiting" figure now uses the same predicate as the list, so
  a filtered page cannot show a number that disagrees with the table under it
- An "expired" card in the queue header. Without a number here, a dead
  scheduler is indistinguishable from a healthy system: no error, no log, the
  queue still works.
- Tests for expiry, the scheduler, the leaky claim path and the queue
  filter (17)

### Changed
- Test count 149 → 166

## [0.7.0] - 2026-09-30

### Security
- **Fixed:** the report queue and report review were gated on
  `auth()->user()->email === 'admin@greentify.id'` while the rest of the
  application used the `role` column (present since 2026-08-10). A real
  admin on any other address got 403, and whoever held that address got in
  regardless of role — an address `ArticleSeeder` provisions for a content
  author with no role at all, and which `/register` could therefore claim on
  a fresh install. Now `isStaff()` (admin + moderator), consistent with
  `Api\ArticleController`.
- **Fixed:** `ReportSubmitted` was delivered by looking up
  `admin@greentify.id` as a single user, so a report went to an article
  author, or nowhere. It now goes to every non-`user` role, so a promoted
  moderator is notified too.
- **Added:** named rate limiters per trust boundary in
  `AppServiceProvider`. Before this exactly one of 69 routes was throttled —
  login, registration, comments, replies, likes, bookmarks, follows,
  notifications, reports, the contact form and the newsletter were all
  open, so a single client could mass-create accounts, flood the admin's
  notifications, or use the contact form as a mail relay. 14 routes are now
  throttled. Login is limited per email+IP so a shared office or campus NAT
  is not locked out after a few typos while credential stuffing still is.

### Fixed
- **Fixed:** every successful article write redirected to
  `route('articles.index')`, a name no route has ever defined — so the
  redirect 500'd. The create and edit forms linked to the same dead name and
  threw on render. The public list is `blogspot`.
- **Fixed:** the public article page, the blog list and the bookmarks page
  referenced `$article->liked_by` and `$article->bookmarked_by`; the
  relations are `likedBy()` and `bookmarkedBy()`. All three threw
  "Call to a member function isNotEmpty() on null" — 500 for any signed-in
  visitor, and the like/bookmark buttons never rendered at all.
- **Fixed:** a successful web login redirected to the literal URL
  `/welcome`, which no route defines. Every login ended on a 404. The
  fallback is now `route('welcome')`, so a renamed route throws instead of
  silently producing a dead URL.

### Added
- Feature tests for the article write flow and authorship checks (11),
  auth (13), report authorization (13) and rate limiting (11) — the four
  areas above had no coverage at all

### Changed
- Test count 101 → 149

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
