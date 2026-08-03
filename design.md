# Greentify - Design System

> Design system berbasis **Material Design 3 (Material You)** dengan tema *forest/nature*. Semua token berasal dari `tailwind.config.js` dan konsisten dengan komponen Blade yang sudah ada.

---

## 🎨 Color Palette (Forest Theme)

### Primary — Deep Forest (`#012d1d`)
| Token | Hex | Usage |
|-------|-----|-------|
| `primary` | `#012d1d` | Brand color, primary actions, headlines |
| `on-primary` | `#ffffff` | Text/icons on primary backgrounds |
| `primary-container` | `#1b4332` | Elevated surfaces, cards on primary |
| `on-primary-container` | `#86af99` | Text on primary-container |
| `primary-fixed` | `#c1ecd4` | Light decorative backgrounds |
| `primary-fixed-dim` | `#a5d0b9` | Hover states, borders |
| `on-primary-fixed` | `#002114` | Text on primary-fixed |
| `on-primary-fixed-variant` | `#274e3d` | Subtle text on primary-fixed |
| `inverse-primary` | `#a5d0b9` | Primary on dark surfaces |

### Secondary — Emerald Green (`#0e6c4a`)
| Token | Hex | Usage |
|-------|-----|-------|
| `secondary` | `#0e6c4a` | Secondary actions, accents |
| `on-secondary` | `#ffffff` | Text on secondary |
| `secondary-container` | `#a0f4c8` | Chips, badges, subtle fills |
| `on-secondary-container` | `#19724f` | Text on secondary-container |
| `secondary-fixed` | `#a0f4c8` | Light decorative |
| `secondary-fixed-dim` | `#85d7ad` | Hover states |
| `on-secondary-fixed` | `#002113` | Text on secondary-fixed |
| `on-secondary-fixed-variant` | `#005236` | Subtle text |

### Tertiary — Earth/Amber (`#302410`)
| Token | Hex | Usage |
|-------|-----|-------|
| `tertiary` | `#302410` | Tertiary accents, warnings |
| `on-tertiary` | `#ffffff` | Text on tertiary |
| `tertiary-container` | `#473a24` | Tertiary elevated surfaces |
| `on-tertiary-container` | `#b7a487` | Text on tertiary-container |
| `tertiary-fixed` | `#f6dfc0` | Light decorative |
| `tertiary-fixed-dim` | `#d9c4a5` | Hover states |
| `on-tertiary-fixed` | `#251a07` | Text on tertiary-fixed |
| `on-tertiary-fixed-variant` | `#53452e` | Subtle text |

### Error — Standard Red
| Token | Hex | Usage |
|-------|-----|-------|
| `error` | `#ba1a1a` | Destructive actions, errors |
| `on-error` | `#ffffff` | Text on error |
| `error-container` | `#ffdad6` | Error message backgrounds |
| `on-error-container` | `#93000a` | Text on error-container |

### Surface & Background (Neutral)
| Token | Hex | Usage |
|-------|-----|-------|
| `surface` / `background` | `#f9f9f8` | Main page background |
| `on-surface` / `on-background` | `#191c1c` | Primary body text |
| `surface-dim` | `#d9dad9` | Disabled/divider |
| `surface-bright` | `#f9f9f8` | Emphasized surfaces |
| `surface-container-lowest` | `#ffffff` | Cards, modals |
| `surface-container-low` | `#f3f4f3` | Slightly elevated |
| `surface-container` | `#edeeed` | Default card |
| `surface-container-high` | `#e7e8e7` | Higher elevation |
| `surface-container-highest` | `#e1e3e2` | Highest elevation |
| `on-surface-variant` | `#414844` | Secondary text, labels |
| `surface-variant` | `#e1e3e2` | Input borders, dividers |
| `outline` | `#717973` | Focus rings, borders |
| `outline-variant` | `#c1c8c2` | Subtle borders |
| `surface-tint` | `#3f6653` | Color overlay on surface |

### Inverse (Dark Mode Ready)
| Token | Hex | Usage |
|-------|-----|-------|
| `inverse-surface` | `#2e3131` | Dark mode surface |
| `inverse-on-surface` | `#f0f1f0` | Dark mode text |
| `inverse-primary` | `#a5d0b9` | Dark mode primary |

---

## ✒️ Typography

### Font Families
| Token | Stack | Usage |
|-------|-------|-------|
| `display-lg` | `Playfair Display`, serif | Hero headlines (48px) |
| `headline-md` | `Playfair Display`, serif | Section headlines (32px) |
| `headline-sm` | `Playfair Display`, serif | Card titles, small headlines (24px) |
| `body-lg` | `Inter`, sans-serif | Lead paragraphs (18px) |
| `body-md` | `Inter`, sans-serif | Body text (16px) |
| `label-md` | `Inter`, sans-serif | Buttons, labels (14px) |
| `label-sm` | `Inter`, sans-serif | Captions, metadata (12px) |

### Type Scale (from tailwind.config.js)
| Class | Size | Line Height | Weight | Letter Spacing |
|-------|------|-------------|--------|----------------|
| `text-display-lg` | 48px | 56px | 700 | -0.02em |
| `text-display-lg-mobile` | 36px | 44px | 700 | -0.01em |
| `text-headline-md` | 32px | 40px | 600 | — |
| `text-headline-sm` | 24px | 32px | 600 | — |
| `text-body-lg` | 18px | 28px | 400 | — |
| `text-body-md` | 16px | 24px | 400 | — |
| `text-label-md` | 14px | 20px | 600 | 0.05em |
| `text-label-sm` | 12px | 16px | 500 | — |

**Responsive:** `display-lg` otomatis turun ke `display-lg-mobile` di mobile via `md:text-display-lg`.

---

## ✨ Components

### 1. Layout & Spacing
| Token | Value | Usage |
|-------|-------|-------|
| `container-max-width` | 1200px | Max-width konten utama |
| `gutter` | 24px | Horizontal padding halaman |
| `unit` | 8px | Base spacing unit |
| `margin-desktop` | 64px | Vertical section spacing (desktop) |
| `margin-mobile` | 20px | Vertical section spacing (mobile) |

### 2. Border Radius
| Class | Value |
|-------|-------|
| `rounded` (DEFAULT) | 0.25rem (4px) |
| `rounded-lg` | 0.5rem (8px) |
| `rounded-xl` | 0.75rem (12px) |
| `rounded-2xl` | 1rem (16px) |

### 3. Shadows (Nature-themed)
| Class | Value |
|-------|-------|
| `shadow-nature` | `0 4px 12px rgba(27, 67, 50, 0.05)` |
| `shadow-nature-lg` | `0 12px 30px rgba(27, 67, 50, 0.08)` |
| `shadow-nature-xl` | Layered: `0 10px 30px -5px rgba(27,67,50,0.05), 0 4px 6px -2px rgba(27,67,50,0.03)` |

### 4. Buttons
| Variant | Classes | Example |
|---------|---------|---------|
| **Primary (Filled)** | `bg-primary text-on-primary` + hover `bg-primary-container` | Register, Submit |
| **Secondary (Outlined)** | `border border-outline-variant bg-white text-primary` | Explore, View All |
| **Tertiary (Text)** | `text-primary hover:bg-primary/10` | Read More, Links |
| **Destructive** | `bg-error text-on-error` | Delete |

**Common:** `font-label-md text-label-md px-6 py-2.5 rounded-lg transition-all active:scale-95`

### 5. Form Inputs
```
bg-on-primary/10 border border-on-primary/20 text-on-primary
placeholder:text-on-primary/50
focus:outline-none focus:ring-2 focus:ring-secondary-fixed
rounded-lg px-6 py-4
```

### 6. Cards / Article Grid
- **Base:** `bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10`
- **Image:** `aspect-[16/9]` or `aspect-square`, `object-cover`, hover `scale-105 transition-transform duration-700`
- **Content:** `p-8` padding
- **Category Badge:** `inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed-variant text-label-sm font-label-sm rounded-full`
- **Title:** `font-headline-sm text-headline-sm text-primary`
- **Excerpt:** `text-on-surface-variant font-body-md line-clamp-2`

### 7. Navbar (Fixed, Blur)
```blade
<header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md">
  <nav class="flex justify-between items-center w-full px-gutter py-unit max-w-container-max-width mx-auto">
    <!-- Brand: font-display-lg text-headline-sm md:text-display-lg text-primary -->
    <!-- Nav links: font-label-md text-label-md text-on-surface-variant hover:text-primary -->
    <!-- Auth buttons: Primary (Register) + Ghost (Login) -->
  </nav>
</header>
```

**Scroll behavior:** JS adds `shadow-nature` saat `scrollY > 50`.

### 8. Footer
Simple, `bg-surface-container py-12`, centered links.

### 9. Hero Section (Welcome Page)
- Full viewport height (`h-[870px] min-h-[600px]`)
- Background image + `bg-primary/20 mix-blend-multiply` overlay
- Content: `max-w-2xl`, `text-on-primary`
- CTA: Primary filled + Secondary outlined

### 10. Bento Grid (Category Cards)
CSS Grid: `grid-cols-1 md:grid-cols-12 gap-6`
- Limbah: `md:col-span-7` (landscape)
- Konservasi: `md:col-span-5` (square)
- Penghijauan: `md:col-span-5` (square)
- Hutan: `md:col-span-7` (landscape)

### 11. Newsletter Section
`bg-primary rounded-2xl p-8 md:p-16`, centered form with email input + primary button.

### 12. Scroll Reveal Animation
```js
// IntersectionObserver threshold: 0.1
// Elements with .nature-shadow get: transition-all duration-700 opacity-0 translate-y-8
// On intersect: opacity-100 translate-y-0
```

---

## 📐 Responsive Breakpoints
| Breakpoint | Tailwind | Usage |
|------------|----------|-------|
| Mobile | `< 768px` | Stack layouts, smaller type, hidden nav labels |
| Tablet | `md: (768px+)` | 2-col grids, full nav, display-lg |
| Desktop | `lg: (1024px+)` | Full bento grid, sidebar space |

---

## ♿ Accessibility Notes
- **Color contrast:** Primary/on-primary = 15.3:1 (AAA), Secondary/on-secondary = 7.2:1 (AAA)
- **Focus states:** `focus:ring-2 focus:ring-secondary-fixed` pada semua interactive elements
- **Semantic HTML:** `<header>`, `<main>`, `<section>`, `<nav>`, `<footer>`
- **ARIA:** Buttons have accessible labels, images have descriptive `alt`
- **Reduced motion:** `transition-all` respects `prefers-reduced-motion` via Tailwind

---

## 🌙 Dark Mode (Ready, Not Yet Enabled)
Semua token `inverse-*` dan `surface-*` sudah siap. Untuk mengaktifkan:
1. Tambahkan `darkMode: 'class'` di `tailwind.config.js`
2. Tambahkan toggle di navbar yang menambahkan class `dark` ke `<html>`
3. Ganti `bg-surface` → `dark:bg-inverse-surface`, `text-on-surface` → `dark:text-inverse-on-surface`, dll.

---

## 📁 File Structure (Design-Relevant)
```
resources/
├── css/
│   └── app.css          # @tailwind base/components/utilities + custom
├── js/
│   └── app.js           # Alpine/vanilla JS (navbar scroll, scroll reveal)
├── views/
│   ├── layouts/
│   │   ├── app.blade.php      # Main layout (navbar, main, footer, scroll reveal)
│   │   └── blog.blade.php     # Blog layout with sidebar
│   ├── components/
│   │   ├── navbar.blade.php   # Fixed top nav with auth state
│   │   ├── footer.blade.php
│   │   ├── head.blade.php
│   │   ├── blog-sidebar.blade.php
│   │   ├── content.blade.php
│   │   └── sidebar.blade.php
│   ├── welcome.blade.php      # Landing page (hero, mission, bento, newsletter)
│   ├── blogspot.blade.php     # Article listing with filters
│   ├── articles/
│   │   ├── create.blade.php   # Rich text editor (TinyMCE/Quill placeholder)
│   │   ├── edit.blade.php
│   │   ├── show.blade.php     # Article detail with comments
│   │   └── my-articles.blade.php
│   ├── profile/
│   │   └── show.blade.php
│   ├── auth/
│   │   ├── login.blade.php
│   │   └── register.blade.php
│   └── contact.blade.php
```

---

## 🔧 Utility Classes (Custom)
| Class | Definition |
|-------|------------|
| `.nature-shadow` | `box-shadow: var(--shadow-nature)` + scroll reveal |
| `.editorial-border` | `border: 1px solid var(--color-outline-variant)` |
| `.bg-surface` | `background-color: var(--color-surface)` |
| `.text-primary` | `color: var(--color-primary)` |
| `.font-display-lg` | `font-family: var(--font-display-lg)` |
| `.font-headline-md` | `font-family: var(--font-headline-md)` |
| `.font-body-md` | `font-family: var(--font-body-md)` |
| `.text-label-md` | `font-size: var(--text-label-md)` |

---

## 📝 Implementation Checklist
- [x] Color tokens defined in Tailwind config
- [x] Typography scale implemented
- [x] Spacing & container system
- [x] Border radius scale
- [x] Nature shadows
- [x] Button variants (primary, secondary, tertiary, destructive)
- [x] Form input styling
- [x] Card/article grid component
- [x] Navbar with blur + scroll shadow
- [x] Bento grid layout
- [x] Hero section pattern
- [x] Newsletter section
- [x] Scroll reveal animation
- [x] Footer
- [ ] Dark mode toggle
- [ ] Focus-visible polish
- [ ] Loading/skeleton states
- [ ] Toast/notification component
- [ ] Modal/dialog component
- [ ] Pagination component
- [ ] Dropdown/select component
- [ ] Avatar component
- [ ] Badge/chip component
- [ ] Tooltip component

---

*Last updated: 2026-08-03 — Based on `tailwind.config.js` commit dfbb9ce*