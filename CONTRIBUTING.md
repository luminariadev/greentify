# Contributing to Greentify

Terima kasih sudah ingin berkontribusi ke Greentify! 🌿

## Cara Berkontribusi

1. **Fork** repository ini
2. Buat branch baru: `git checkout -b fitur/nama-fitur`
3. Commit perubahan: `git commit -m "feat: deskripsi singkat"`
4. Push ke branch: `git push origin fitur/nama-fitur`
5. Buat **Pull Request** ke branch `main`

## Standar Commit

Gunakan [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` — fitur baru
- `fix:` — perbaikan bug
- `docs:` — perubahan dokumentasi
- `chore:` — tugas rutin
- `refactor:` — refaktor kode tanpa mengubah perilaku
- `test:` — menambah/memperbaiki test

## Standar Kode

- Ikuti PSR-12 untuk PHP
- Gunakan Tailwind utility classes untuk styling
- Setiap fitur baru wajib punya test
- Jalankan `php artisan test` sebelum push

## Lingkungan Pengembangan

Pastikan sudah tersedia:
- PHP 8.2+
- Composer
- MySQL 8+ / SQLite
- Node.js 18+ (untuk Vite)