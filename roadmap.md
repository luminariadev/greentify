# Greentify — Roadmap & Development Plan

> **Greentify**: Platform blog dan komunitas lingkungan
> **Status**: Fase 0–5 Selesai — Payment Gateway (Fase 6) berjalan, tinggal 1 item
> **Update Terakhir**: 29 September 2026

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
| **Iklan Ramah Lingkungan**           | 💰              | 1 minggu   | ✅ Selesai |
| - Banner ads untuk brand hijau       |                 |            |        |
| - Sponsored post                     |                 |            |        |
| **Donasi / Support Creator**         | 💰              | 1 minggu   | ✅ Selesai |
| - Fitur tip/donasi                   |                 |            |        |
| - Crowdfunding proyek lingkungan     |                 |            |        |

> ## 🎉 Fase 4 Monetisasi — SELESAI 100% (4/4)

### 🟣 Fase 5: Skalabilitas (Januari 2027+)

| Item                      | Estimasi   | Status |
| ------------------------- | ---------- | ------ |
| **Landing Page Publik (SEO)** | 1 minggu   | ✅ Selesai |
| **Dashboard Admin**           | 1-2 minggu | ✅ Selesai |
| **Email Newsletter**          | 1 minggu   | ✅ Selesai |
| **Role & Permission**         | 1 minggu   | ✅ Selesai |
| **Progressive Web App (PWA)** | 1 minggu   | ✅ Selesai |
| **API untuk Mobile**        | 2-3 minggu | ✅ Selesai (26 Sep 2026) |

> ## 🎉 Fase 5 Skalabilitas — 6/6 Selesai

### Endpoint API Mobile (v1)

| Method | Endpoint                    | Auth     | Keterangan                        |
| ------ | --------------------------- | -------- | --------------------------------- |
| POST   | `/api/register`             | ❌       | Issue Sanctum token               |
| POST   | `/api/login`                | ❌       | Issue Sanctum token               |
| POST   | `/api/logout`               | ✅ Bearer| Mencabut token aktif              |
| GET    | `/api/user`                 | ✅ Bearer| Profil user saat ini              |
| GET    | `/api/articles`             | ❌       | Published only, `per_page` 1–50  |
| GET    | `/api/articles/{id}`        | ❌       | Draft 404 kecuali penulis/staff  |
| GET    | `/api/categories`           | ❌       | Hanya kategori berisi artikel    |
| GET    | `/api/categories/{id}`      | ❌       | Lengkap dengan `articles_count`  |

Semua response memakai `App\Http\Resources` sehingga payload konsisten
(`data`, `meta`, `links`) dan tanggal dalam format ISO-8601.

### 🟠 Fase 6: Payment Gateway (Oktober 2026) — Sebagian Selesai

| Item                                         | Status | Notes                                           |
| -------------------------------------------- | ------ | ----------------------------------------------- |
| Tabel `payments` (polymorphic settlement)   | ✅     | Migration 2026_09_28_000001                    |
| Kontrak `PaymentGateway` + DTO              | ✅     | Swap provider = 1 binding di AppServiceProvider |
| `PaymentManager` (charge + settlement)      | ✅     | Idempoten, row lock, applyEffect sekali saja   |
| `ManualGateway` (transfer/QRIS + konfirmasi) | ✅     | Default, settlement via konfirmasi payer       |
| Webhook `POST /api/payments/webhook`         | ✅     | Amount check mencegah forging "paid"           |
| Donasi tidak auto-"completed"               | ✅     | Pending dulu, masuk total setelah dibayar     |
| Membership berbayar tidak free-activation    | ✅     | Aktif hanya setelah payment settle             |
| Test lifecycle payment (16 test)             | ✅     | Termasuk duplicate-webhook & amount mismatch  |
| Integrasi Midtrans / Xendit (real SDK)      | ☐     | `PAYMENT_GATEWAY` env, credential sudah slot   |
| QRIS EMVCo compliant                         | ✅     | TLV + CRC16-CCITT; dynamic CRC & MCC butuh PSP |
| Verifikasi manual oleh operator             | ✅     | Antrean admin, approve/reject + notifikasi     |
| Rekonsiliasi otomatis                        | ✅     | `payments:reconcile`, no-op sampai ada provider |

> **Perubahan perilaku 28 Sep 2026:** sebelumnya donasi langsung
> `status=completed` saat form disubmit dan membership berbayar langsung
> aktif selama 1 bulan. Keduanya kini butuh settlement payment dulu.
>
> **Perubahan perilaku 29 Sep 2026 — bug keamanan.** Tombol "Saya Sudah
> Transfer" ternyata men-*cairkan* pembayarannya sendiri: `confirm()`
> mengirim event `paid` langsung ke `PaymentManager::apply()`. Siapa pun
> bisa menandai donasinya selesai tanpa transfer apa pun. Sekarang tombol
> itu hanya mengirim klaim ke status `in_review`; operator yang memutuskan
> lewat `/admin/payments`. Alasan penolakan dikirim balik ke payer.
>
> Sisa 1 item: integrasi SDK provider asli (butuh kredensial & UUID
> notification dari Midtrans/Xendit — bukan pekerjaan kode yang bisa
> diselesaikan tanpa akses ke akun tersebut).

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
- [x] Iklan & Sponsored Post
- [x] Donasi / Crowdfunding

> ## 🎉 Fase 4 Monetisasi — SELESAI 100% (4/4)

### Fase 5: Skalabilitas

- [x] Landing Page Publik (SEO)
- [x] Dashboard Admin
- [x] Email Newsletter
- [x] Role & Permission
- [x] Progressive Web App (PWA)
- [x] API untuk Mobile (Sanctum token + ArticleResource/CategoryResource)

> ## 🎉 Fase 5 Skalabilitas — 6/6 Selesai
> Roadmap seluruh fase (0–5) sudah tuntas. Payment gateway (Fase 6)
> berjalan dengan verifikasi operator; tersisa integrasi SDK provider
> asli yang menunggu kredensial.

---

## 🔜 Fokus Berikutnya

1. **Integrasi Midtrans / Xendit** — 1 item Fase 6 yang tersisa. Butuh
   server key + UUID notification dari akun PSP; kontrak `PaymentGateway`
   dan binding di `AppServiceProvider` sudah siap.
2. **Rekonsiliasi terjadwal** — jalankan `payments:reconcile` lewat
   scheduler setiap 5 menit begitu provider aktif.
3. **Dashboard operator** — grafik pendapatan dan filter tanggal di
   antrean verifikasi, supaya tidak harus scroll 20 item per halaman.

---

_Catatan: Timeline bisa berubah sesuai prioritas dan sumber daya._
