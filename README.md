# 🌿 Greentify

> Platform blog dan komunitas lingkungan untuk meningkatkan kesadaran dan tindakan positif terhadap pelestarian alam.

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel&logoColor=white)
![CI](https://github.com/luminariadev/greentify/actions/workflows/ci.yml/badge.svg)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.4-4479A1?logo=mysql&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind-4-06B6D4?logo=tailwindcss&logoColor=white)
![PWA](https://img.shields.io/badge/PWA-Ready-5A0FC8)
![License](https://img.shields.io/badge/License-MIT-green)

## 📈 Status Proyek

| Fase | Status |
|------|--------|
| Fase 0-3 (Fitur Inti) | ✅ Selesai |
| Fase 4: Monetisasi | ✅ 100% (Marketplace, Membership, Iklan, Donasi) |
| Fase 5: Skalabilitas | ✅ 100% (Landing SEO, Admin, Newsletter, Role, PWA, API Mobile) |

## 📖 About

**Greentify** adalah platform blog dan komunitas lingkungan yang didedikasikan untuk meningkatkan kesadaran dan tindakan positif terhadap lingkungan. Platform ini menyediakan berbagai informasi, sumber daya, dan ide kreatif untuk membantu individu dan komunitas dalam upaya mereka untuk menjaga dan merawat alam.

> *"The environment is where we all meet; where we all have a mutual interest; it is the one thing all of us share."* — Rizkia Nuari Fujiana

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 11 (PHP 8.2+) |
| Frontend | Tailwind CSS + Vite |
| Database | MySQL / SQLite |
| Authentication | Custom Laravel Auth |

## 🚀 Features

### Saat Ini (MVP)
- 🔐 User Authentication (Login/Register/Logout)
- 📝 Blog Posts — 4 Kategori Lingkungan (dinamis dari database)
- ✍️ **User Generated Content (CRUD Artikel) — Lengkap dengan Rich Text Editor & Upload Gambar**
- 💬 **Sistem Komentar & Reply per Artikel**
- 👤 **Profil Pengguna — Foto, Bio, & Artikel Saya**
- 📬 Contact Form (Halaman Penuh)
- 📱 Responsive Design (Mobile-First)
- 🎨 Modern UI dengan Design System (Tailwind + Material 3 Forest Theme)

### Rencana Pengembangan (Fase 3+)
- ❤️ Like, Bookmark, Follow User
- 🔍 Search & Filter Kategori
- 🏪 Green Marketplace (Affiliate)
- 💎 Premium Membership
- 🌙 Dark Mode Toggle
- 📊 Dashboard Admin

## 📂 Documentation

| Dokumen | Deskripsi |
|---------|-----------|
| [design.md](design.md) | Design system, palet warna, typography, wireframe |
| [roadmap.md](roadmap.md) | Development plan, timeline, monetisasi, tracking |

## 🌱 Blog Categories

| # | Kategori | Deskripsi |
|---|----------|-----------|
| 1 | ♻️ **Limbah** | Pengurangan Limbah Plastik |
| 2 | 💧 **Konservasi** | Konservasi Air & Sumber Daya |
| 3 | 🌿 **Penghijauan** | Penghijauan Kota & Perubahan Iklim |
| 4 | 🌲 **Hutan** | Perlindungan Hutan Hujan & Keanekaragaman |

## 📦 Installation

```bash
# Clone repository
git clone <repository-url>
cd Greentify

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env, then:
php artisan migrate
php artisan db:seed   # kategori + artikel contoh

# Build assets & run
npm run build
php artisan serve
```

## 📁 Project Structure

```
Greentify/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php
│   │   ├── ArticleController.php    (CRUD + myArticles)
│   │   ├── CommentController.php    (store + reply)
│   │   ├── ProfileController.php    (show user + articles)
│   │   └── ContactFormController.php
│   └── Models/
│       ├── User.php
│       ├── Article.php
│       ├── Category.php
│       ├── Comment.php
│       └── Pesan.php
├── database/
│   ├── migrations/   (users, categories, articles, comments, pesan)
│   └── seeders/      (CategorySeeder, ArticleSeeder)
├── resources/views/
│   ├── auth/          (login, register)
│   ├── blog/          (limbah, konservasi, penghijauan, hutan)
│   ├── articles/      (create, edit, show, my-articles)
│   ├── profile/       (show)
│   ├── components/    (head, navbar, sidebar, content, footer, blog-sidebar)
│   └── layouts/       (app, blog)
└── routes/web.php
```

## 📈 Roadmap

Lihat [roadmap.md](roadmap.md) untuk detail timeline, monetisasi, dan tracking progress.

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
