# Greentify Design System

## Overview

**Greentify** adalah platform blog dan komunitas lingkungan yang fokus pada meningkatkan kesadaran dan mendorong tindakan positif untuk pelestarian alam. Platform ini menyediakan konten edukatif dan inspiratif tentang berbagai topik lingkungan, dikombinasikan dengan fitur komunitas untuk kolaborasi dan interaksi pengguna.

## Design Principles

### 1. Aksesibilitas & Keterbacaan
- ✅ Kontras warna tinggi untuk keterbacaan optimal
- ✅ Typography responsif yang dapat disesuaikan
- ✅ Navigasi yang intuitif dan logis

### 2. Responsif & Modern
- ✅ Desain yang adaptif untuk semua perangkat (desktop, tablet, mobile)
- ✅ UX yang fokus pada pengguna dengan interaksi yang lancar
- ✅ Arsitektur komponen yang modular

### 3. Lingkungan Hemat Sumber Daya
- ✅ Visual yang fokus dan minimal
- ✅ Estetika yang terinspirasi dari alam untuk mencerminkan misi platform
- ✅ Highlight satu porsi alam, sumber daya, dan keindahan
- ✅ Gaya "dark" yang nyaman untuk pengguna dan hemat sumber daya

## Brand Guidelines

### Logo & Identitas Visual
- **Nama**: Greentify
- **Tagline**: Platform Edukasi Lingkungan & Komunitas
- **Warna Utama**: Hijau (#059669), Abu-abu (#1F2937), Putih (#FFFFFF), Kuning (#FCD34D)
- **Font**: System Font (Poppins, Inter, atau font sans-serif modern)

### Palet Warna
```css
--primary-green: #059669;    /* Hijau utama */
--secondary-green: #10B981;  /* Hijau sekunder */
--dark-green: #064E3B;       /* Hijau gelap */
--light-green: #D1FAE5;      /* Hijau muda */
--accent-yellow: #FCD34D;    /* Aksen */
--text-dark: #1F2937;         /* Teks utama */
--text-light: #FFFFFF;        /* Teks sekunder */
--bg-light: #F9FAFB;          /* Latar belakang */
```

### Iconografi
- Menggunakan iconografi yang terinspirasi dari lingkungan
- Material icons atau FontAwesome
- Desain yang konsisten dan mudah dibaca di semua ukuran

## Typography

### Heading & Titles
- **H1**: Poppins Bold, 48px (Desktop), 36px (Mobile)
- **H2**: Poppins SemiBold, 36px (Desktop), 28px (Mobile)
- **H3**: Poppins Medium, 24px (Desktop), 20px (Mobile)

### Body Text
- **Paragraph**: Inter Regular, 16px
- **Caption/Small Text**: Inter Regular, 14px

## Components (Contoh)

### Buttons
- **Primary Button**: Solid Green, White Text. `#059669` background, `#FFFFFF` text.
- **Secondary Button**: Outlined Green, Green Text. `border: 1px solid #059669`, `#059669` text.
- **Ghost Button**: Transparent, Green Text.

### Cards
- Desain minimalis, shadow lembut.
- Padding konsisten (misalnya, `p-4` atau `p-6` Tailwind).
- Menggunakan gambar relevan dengan lingkungan.

### Navigation (Sidebar)
- Dark mode theme.
- Iconografi yang jelas untuk setiap menu.
- Profil pengguna di bagian atas sidebar.

## Wireframe Konseptual (Mobile - Contoh)

```
+------------------------------------+
| [Logo]            [Search] [Menu]  |
+------------------------------------+
| **Featured Post Title**            |
| Image                             |
| Short description...               |
| [Read More]                        |
+------------------------------------+
| **Latest Posts**                   |
|                                    |
| [Card 1: Title, Image, Desc]       |
| [Card 2: Title, Image, Desc]       |
| [Card 3: Title, Image, Desc]       |
|                                    |
+------------------------------------+
| **Categories**                     |
| [Limbah] [Konservasi] [Penghijauan]|
| [Hutan] [Transportasi] [Laut]      |
+------------------------------------+
| [Footer]                           |
+------------------------------------+
```

## Pengembangan UI/UX (Rencana)

1. **Audit UI/UX Saat Ini**: Identifikasi area yang perlu perbaikan berdasarkan prinsip desain.
2. **Implementasi Tailwind CSS**: Pastikan semua komponen menggunakan kelas Tailwind untuk konsistensi.
3. **Penyempurnaan Komponen**: Update tombol, kartu, navigasi, dan elemen form sesuai Brand Guidelines.
4. **Dark Mode Toggle**: Tambahkan opsi dark mode.
5. **Responsif**: Pastikan tampilan optimal di berbagai ukuran layar.
