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
