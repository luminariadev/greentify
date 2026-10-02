# Daily commit 2026-08-30

chore: daily maintenance update

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log

# Daily commit 2026-09-01

chore: daily maintenance update

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-05 00:30 WIB — Project maintenance and disk cleanup

# Daily commit 2026-09-06

chore: daily maintenance update

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-06 01:30 WIB — Daily commit untuk GitHub streak

- 2026-09-07: SIT-APP mobile responsive fixes, pagination fix, thumbnail improvements

- 2026-09-07: Daily commit for SIT-APP fixes

# Daily commit 2026-09-08

chore: daily commit for streak 2026-09-08

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-08 01:00 WIB — Daily commit untuk GitHub streak

# Daily commit 2026-09-09

chore: daily commit for streak 2026-09-09

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-09 — Daily commit untuk GitHub streak

# Daily commit 2026-09-10

chore: daily commit for streak 2026-09-10

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-10 — Daily commit untuk GitHub streak

# Daily commit 2026-09-10

chore: daily commit for streak 2026-09-10

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-10 — Daily commit untuk GitHub streak

# Daily commit 2026-09-11
chore: daily commit for streak 2026-09-11

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-11 — Daily commit untuk GitHub streak

# Daily commit 2026-09-12
chore: daily commit for streak 2026-09-12

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-12 — Daily commit untuk GitHub streak

# Daily commit 2026-09-15

chore: daily commit for streak 2026-09-15

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-15 — Daily commit untuk GitHub streak

# Daily commit 2026-09-16
chore: daily commit for streak 2026-09-16

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-16 — Daily commit untuk GitHub streak

# Daily commit 2026-09-22

chore(streak): daily streak maintenance 2026-09-22 [skip ci]

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-22 — Daily commit untuk GitHub streak

# Daily commit 2026-09-24

chore(streak): daily streak maintenance 2026-09-24 [skip ci]

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-24 — Daily commit untuk GitHub streak

# Daily commit 2026-09-25

chore(streak): daily streak maintenance 2026-09-25 [skip ci]

## Summary
✅  Repository maintenance and health check
🔧  Verified build status and dependencies
🗂  Updated project log
- 2026-09-25 — Daily commit untuk GitHub streak

# Daily commit 2026-09-26

feat(api): ship the mobile API and bring the whole toolchain to green

## Summary
🟢 Regression重大: `routes/web.php` ditimpa placeholder 19-baris di commit 4dcb7e3
   (13 Agu 2026) — 154 baris route hilang, semua halaman web & 21 feature test 404.
🔧 Sanctum tidak pernah terpasang meski `routes/api.php` memakainya.
🧪 Factory: hanya UserFactory yang ada di disk.
💻 Test suite: 41 test / 11 error / 21 failure → **53 test / 0 error / 0 failure**
🧪 PHPStan level 6: 79 error → **0 error** (larastan juga belum terpasang)
✅ Pint: 111 files PASS (CI punya job `pint --test` yang selalu gagal)
🎯 Fase 5 "API untuk Mobile" — item terakhir roadmap — selesai.

## Commits (17)
| # | Commit | Scope |
|:-:|-------|-------|
| 1 | fix(routes): restore web routes wiped by 4dcb7e3 placeholder | routes |
| 2 | build(api): add laravel/sanctum for personal access tokens | api |
| 3 | fix(models): wire Sanctum tokens and register routes/api.php | api |
| 4 | test(factories): add the 7 missing model factories | test |
| 5 | fix(factories): HasFactory on Subscriber and explicit role on User | test |
| 6 | fix(api): drop the phantom tags relation, bind by id, open pricing page | api |
| 7 | feat(api): add API Resource layer and correct the stale API tests | api |
| 8 | fix(seeders): register the 4 orphan seeders and assert tier pricing | db |
| 9 | style: run Pint across the codebase so CI can pass | ci |
| 10 | fix(controllers): remove the five dead constructor middleware blocks | fix |
| 11 | style(models): annotate relations and scopes for PHPStan level 6 | types |
| 12 | style(notifications): annotate via/toDatabase payload shapes | types |
| 13 | style(controllers): declare View/RedirectResponse on 25 actions | types |
| 14 | style(types): finish PHPStan level 6 — 0 errors | types |
| 15 | chore: stop tracking the .phpstan analysis cache | chore |
| 16 | docs(roadmap): close Fase 5 — API untuk Mobile done | docs |
| 17 | docs: daily log 2026-09-26 | docs |

## Bug nyata yang ditemukan (bukan cuma rapikan)
- `$this->middleware()` di 5 controller sudah **no-op** sejak `Controller` tidak
  lagi extend `Illuminate\Routing\Controller`. Aman dihapus karena `routes/web.php`
  sudah membungkus semua aksi itu di `Route::middleware('auth')`.
- `/membership/pricing` berada di dalam auth group → harga tidak pernah
  terlihat tamu.
- 4 seeder (MembershipTiers, AffiliateMarketplace, AdsAndSponsored) tidak pernah
  dipanggil DatabaseSeeder.
- `LengthAwarePaginator` tidak punya `load()`/`loadCount()`; dipanggil di
  paginator, bukan collectionnya.
- 3 test file ditulis untuk schema yang tak pernah ada (`articles.body`,
  `articles.tags`, `products.title`) → gagal saat INSERT, bukan saat assertion.

## Verifikasi
```
php vendor/bin/phpunit --no-coverage   → OK (53 tests, 143 assertions)
php vendor/bin/pint --test            → PASS (111 files)
php vendor/bin/phpstan analyse        → [OK] No errors
php artisan route:list                → 66 routes
```
- 2026-09-26 — Daily commit: perbaikan regresi + API mobile + toolchain hijau

# Daily commit 2026-09-28

Fase 6 — Payment Gateway. Bukan streak-saver: gate dijalankan dulu dan
sudah hijau (phpunit 53/53), roadmap 0–5 sudah tuntas, jadi focus ke
fokus roadmap berikutnya.

## 19 commit

| #  | Commit | Scope |
| --:|--------|-------|
| 1  | feat(db): add payments table | db |
| 2  | feat(payments): add Payment model with idempotent settlement | payments |
| 3  | feat(payments): define the PaymentGateway contract and charge DTOs | payments |
| 4  | feat(payments): add ChargeResult and GatewayEvent value objects | payments |
| 5  | feat(payments): add PaymentManager to orchestrate charge and settlement | payments |
| 6  | feat(payments): add ManualGateway that produces real instructions | payments |
| 7  | feat(payments): bind PaymentGateway and PaymentManager in the container | payments |
| 8  | feat(payments): add PaymentController with payer instructions and confirmation | payments |
| 9  | feat(payments): expose the provider webhook | payments |
| 10 | feat(donations): route donations through PaymentManager | donations |
| 11 | fix(membership): stop granting paid tiers for free on button press | membership |
| 12 | test(payments): cover the payment lifecycle end to end | test |
| 13 | docs(ui): tell payers the new two-step flow | ui |
| 14 | feat(payments): add payments config block and env documentation | config |
| 15 | refactor(payments): read the bank account from config, not a const | payments |
| 16 | fix(types): correct MorphMany generics on Donation relations | types |
| 17 | docs(roadmap): open Fase 6 — 8 done / 4 open | docs |
| 18 | test(donations): land the rewritten DonationTest and the PaymentFactory | test |
| 19 | chore(gitignore): ignore local SQLite database files | chore |

## Dua bug monetization yang sudah lama ada

**Donasi dihitung sebagai pendapatan sebelum uang masuk.** `DonationController::store()`
menulis `status='completed'` di baris yang sama dengan pembuatan record, dengan
komentar "Mock: langsung sukses". Effectifnya `/donasi` menampilkan donasi yang
belum dibayar di "Total Terkumpul" — angka utama di halaman itu fiksi.

**Membership berbayar gratis.** `MembershipController::subscribe()` memakai
`Membership::updateOrCreate(..., is_active => true, expires_at => now()->addMonth())`
untuk semua tier. Klik tombol = Green 25rb / Pro Green 50rb / Community Leader
100rb aktif sebulan penuh. Komentarnya jujur: "payment gateway integration is a
future task". Itu gap yang ditutup seri ini.

Keduanya kini butuh settlement: `Donation` pending → `Payment` pending →
`PaymentManager::apply()` → efek dijalankan. `apply()` ambil row lock dan
return boolean apakah *panggilan itu* yang mentransisi status, jadi webhook
duplikat tidak menambah 1 bulan membership lagi.

## Yang sengaja TIDAK dikerjakan
- SDK Midtrans/Xendit — butuh credential; slot env sudah disiapkan
- QRIS EMVCo compliant — placeholder format, perlu acquirer
- Admin verification queue — sekarang payer bisa self-confirm (throttle 10/menit)
- Rekonsiliasi otomatis — loop `PaymentManager::refresh()` belum ada

Semuanya tercatat sebagai ☐ di roadmap.md, bukan dicentang hijau.

## Verifikasi (semua diukur ulang setelah edit terakhir)
```
php vendor/bin/phpunit --no-coverage   → OK (72 tests, 186 assertions)   [dari 53/143]
php vendor/bin/pint --test            → PASS (124 files)                 [dari 111]
php vendor/bin/phpstan analyse        → [OK] No errors
npm run build                         → ✓ built in 776ms
php artisan route:list --json         → api 10 / web 56 / total 66       [dari 62]
```
- 2026-09-28 — Daily commit: payment gateway (donasi & membership tidak lagi free-activation)

# Daily commit 2026-09-29

fix(payments): operator verification — bayar tidak bisa mencairkan dirinya sendiri

## Bug yang ditemukan
`POST /payments/{ref}/confirm` mengirim `GatewayEvent(status: paid)` langsung
ke `PaymentManager::apply()`. Artinya **payer menekan satu tombol dan
donasinya jadi `completed`, membership-nya aktif sebulan** — tanpa transfer
apa pun. Halaman pembayaran menulis "Verifikasi manual oleh tim Greentify"
dan tidak ada verifikasi manual di mana pun.

Terverifikasi ulang hari ini: `test_confirming_a_payment_settles_it_once`
mengasersi `isPaid()` setelah payer menekan tombol. Test itu lulus karena
bug-nya masih ada, bukan karena perilakunya benar.

## Yang dikerjakan
- Status `in_review` + kolom `submitted_at` / `reviewed_by` / `reviewed_at` /
  `review_note`. Klaim = payer, keputusan = operator.
- `PaymentManager::submitForReview()` hanya mengantre; `review()` yang
  mencairkan, lewat `apply()` yang sama dengan webhook (idempoten, row lock).
- Antrean operator di `/admin/payments`: approve / reject (alasan wajib
  minimal 10 karakter), notifikasi `PaymentReviewed` ke payer.
- QRIS EMVCo: TLV + CRC16-CCITT-FALSE (dicek dengan test vector standar
  `123456789` → `0x29B1`), reference pembawa di tag 26 supaya acquirer bisa
  rekonsiliasi.
- Rekonsiliasi: `PaymentManager::reconcile()` + `php artisan payments:reconcile`.

## Bug kedua yang ditemukan test
`iconv(...//TRANSLIT...)` mengubah `É` menjadi `E'` — tanda kutip ikut
terbawa. Merchant "Greentify Ékoprese" akan jadi "Greentify E'koprese" di
QR yang benar-benar dipindai user. `normalise()` kini membuang semua
non-ASCII outright; aksen yang hilang tidak terlihat, tanda kutip yang
menyisa terlihat.

## Test yang diperbaiki
`test_confirming_a_payment_settles_it_once` ditulis ulang menjadi
`test_confirming_queues_the_payment_and_pressing_twice_does_nothing` —
sekarang mengasersi semantik klaim. Ditambah 16 test review flow + 13 test
EMVCo.

## Yang sengaja TIDAK dikerjakan
- SDK Midtrans/Xendit — butuh server key + UUID notification dari akun PSP.
  Kontrak `PaymentGateway` dan binding di `AppServiceProvider` sudah siap;
  yang kurang kredensial, bukan kode. Tetap ☐ di roadmap.md.

## Verifikasi (diukur ulang setelah edit terakhir)
```
php vendor/bin/phpunit --no-coverage   → OK (101 tests, 351 assertions)  [dari 72/186]
php vendor/bin/pint --test            → PASS (131 files)
php vendor/bin/phpstan analyse        → [OK] No errors
npm run build                         → ✓ built in 690ms
php artisan route:list --json         → api 10 / web 59 / total 69       [dari 66]
```

17 commit: 6eb0af4, 8c34017, f4d4fd1, 159b4f6, 837feae, 8f73b3b, 012fbda,
39ba7a5, a7dc6c3, cab7f53, 3a19274, 42ef4fc, bdafeee, 4082b04, fc38fe4,
948df75, 35810bd
- 2026-09-29 — Daily commit: verifikasi operator + QRIS EMVCo + rekonsiliasi

- 2026-10-03: README project structure disinkronkan dengan app/Payments, Console/Commands, Notifications
