# Greentify — Roadmap & Development Plan

> **Greentify**: Platform blog dan komunitas lingkungan
> **Status**: Fase 2 & 3 Selesai — Lanjut Fase 4 (Monetisasi) / Fase 5 (Skalabilitas)
> **Update Terakhir**: 4 Agustus 2026

---

## 📊 Fase Pengembangan

### 🔵 Fase 0: Foundation ✅ (Selesai)

| Item                         | Status |
| ---------------------------- | ------ |
| Setup Laravel 11 + Tailwind  | ✅     |
| Autentikasi (Login/Register) | ✅     |
| Struktur halaman dasar       | ✅     |
| Route & Controller dasar     | ✅     |
| Migrasi database             | ✅     |

### 🟢 Fase 1: Perbaikan Bug & Stabilitas ✅ (Selesai)

| Item                        | Status     | Notes                   |
| --------------------------- | ---------- | ----------------------- |
| Fix konflik merge README.md | ✅ Selesai | Konflik HEAD vs d8f105e |
| Aktifkan route logout       | ✅ Selesai | Tadinya dikomentari     |
| Isi konten halaman kosong   | ✅ Selesai | welcome & blogspot      |

### 🟡 Fase 2: MVP Fitur Inti (Sekarang — Agustus 2026) ✅ SELESAI

| Item                                 | Prioritas | Estimasi |
| ------------------------------------ | --------- | -------- |
| **Manajemen Artikel (CRUD)**         | 🔴 Tinggi | 3-4 hari |
| - User bisa buat/edit/hapus artikel  |           |          |
| - Rich text editor (TinyMCE/Quill)   |           |          |
| - Upload gambar artikel              |           |          |
| **Kategori Blog Dinamis**            | 🔴 Tinggi | 1 hari   |
| - Data dari database, bukan hardcode |           |          |
| - Admin bisa tambah kategori         |           |          |
| **Sistem Komentar**                  | 🔴 Tinggi | 2-3 hari |
| - Komentar per artikel               |           |          |
| - Reply/balas komentar               |           |          |
| **Profil Pengguna**                  | 🟡 Sedang | 1-2 hari |
| - Foto profil, bio                   |           |          |
| - Artikel yang ditulis user          |           |          |
| **Halaman Contact Us**               | 🟡 Sedang | 1 hari   |
| - Dari popup jadi halaman penuh      |           |          |
| - Validasi & notifikasi              |           |          |
| **UI Refresh (design.md)**           | 🟡 Sedang | 2-3 hari |
| - Implementasi design system         |           |          |
| - Responsive mobile-first            |           |          |
| - Dark mode toggle                   |           |          |

### 🟠 Fase 3: Fitur Komunitas (September — Oktober 2026) — Sebagian Selesai

| Item                        | Prioritas | Status |
| --------------------------- | --------- | ------ |
| **Like & Bookmark Artikel** | 🔴 Tinggi | ✅ Selesai |
| **Follow Antar User**       | 🟡 Sedang | ✅ Selesai |
| **Notifikasi**              | 🟡 Sedang | ✅ Selesai |
| **Report Content**          | 🟢 Rendah | ✅ Selesai |
| **Search & Filter**         | 🟡 Sedang | ✅ Selesai (di blogspot) |

### 🔴 Fase 4: Monetisasi (November — Desember 2026)

| Item                                 | Potensi Revenue | Estimasi   | Status |
| ------------------------------------ | --------------- | ---------- | ------ |
| **Green Marketplace (Afiliasi)**     | 💰💰💰          | 2-3 minggu | ✅ Selesai |
| - Produk ramah lingkungan            |                 |            |        |
| - Affiliate link ke Tokopedia/Shopee |                 |            |        |
| **Premium Membership**               | 💰💰            | 1-2 minggu | ✅ Selesai |
| - Konten eksklusif                   |                 |            |        |
| - Article analytics, badge, no ads   |                 |            |        |
| **Iklan Ramah Lingkungan**           | 💰              | 1 minggu   | ⬜ |
| - Banner ads untuk brand hijau       |                 |            |        |
| - Sponsored post                     |                 |            |        |
| **Donasi / Support Creator**         | 💰              | 1 minggu   | ⬜ |
| - Fitur tip/donasi                   |                 |            |        |
| - Crowdfunding proyek lingkungan     |                 |            |        |

### 🟣 Fase 5: Skalabilitas (Januari 2027+)

| Item                      | Estimasi   |
| ------------------------- | ---------- |
| Landing Page Publik (SEO) | 1 minggu   |
| Dashboard Admin           | 1-2 minggu |
| Email Newsletter          | 1 minggu   |
| Role & Permission         | 1 minggu   |
| API untuk Mobile          | 2-3 minggu |
| Progressive Web App (PWA) | 1 minggu   |

---

## 💰 Analisis Monetisasi Detail

### 1. Green Marketplace (Affiliate)

User bisa lihat & beli produk ramah lingkungan via link afiliasi.

| Produk                            | Margin Afiliasi |
| --------------------------------- | --------------- |
| Tumbler & Botol Minum             | 5-10%           |
| Tas Belanja Ramah Lingkungan      | 5-10%           |
| Skincare Natural & Organik        | 10-15%          |
| Tanaman Hias & Perlengkapan Kebun | 5-10%           |
| Panel Surya Rumah Tangga          | 5-8%            |

### 2. Premium Membership

| Tier             | Harga          | Fitur                                      |
| ---------------- | -------------- | ------------------------------------------ |
| Free             | Gratis         | Baca, komentar, 1 artikel/minggu           |
| Green            | Rp 25.000/bln  | Unlimited artikel, 5 artikel/minggu, badge |
| Pro Green        | Rp 50.000/bln  | Semua + analytics, no ads, prioritas       |
| Community Leader | Rp 100.000/bln | Verified, webinar eksklusif, mentorship    |

### 3. Iklan & Sponsored Content

| Tipe                   | Estimasi Revenue                      |
| ---------------------- | ------------------------------------- |
| Banner Ads             | Rp 500k-2jt/bln (setelah 10k visitor) |
| Sponsored Post         | Rp 300k-1jt/artikel                   |
| Newsletter Sponsorship | Rp 200k-500k/edisi                    |

---

## 📈 Target Trafik & Revenue (12 Bulan)

| Bulan      | Target Visitor | Target Revenue |
| ---------- | -------------- | -------------- |
| 1 (Launch) | 500            | Rp 0           |
| 2          | 2.000          | Rp 100k        |
| 3          | 5.000          | Rp 500k        |
| 4-6        | 10.000         | Rp 1-2jt       |
| 7-9        | 25.000         | Rp 3-5jt       |
| 10-12      | 50.000         | Rp 8-15jt      |

---

## 📋 Checklist Tracking

### Fase 2: MVP Fitur Inti

- [x] Manajemen Artikel (CRUD)
- [x] Kategori Blog Dinamis
- [x] Sistem Komentar
- [x] Profil Pengguna
- [x] Halaman Contact Us (Full page)
- [x] UI Refresh (Design System)

### Fase 3: Fitur Komunitas

- [x] Like & Bookmark
- [x] Follow user
- [x] Notifikasi
- [x] Search & Filter
- [x] Report Content

### Fase 4: Monetisasi

- [x] Green Marketplace (Afiliasi)
- [x] Premium Membership
- [ ] Iklan & Sponsored Post
- [ ] Donasi / Crowdfunding

---

_Catatan: Timeline bisa berubah sesuai prioritas dan sumber daya._
