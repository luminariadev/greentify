---
name: Greentify
colors:
  surface: '#f9f9f8'
  surface-dim: '#d9dad9'
  surface-bright: '#f9f9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f3f4f3'
  surface-container: '#edeeed'
  surface-container-high: '#e7e8e7'
  surface-container-highest: '#e1e3e2'
  on-surface: '#191c1c'
  on-surface-variant: '#414844'
  inverse-surface: '#2e3131'
  inverse-on-surface: '#f0f1f0'
  outline: '#717973'
  outline-variant: '#c1c8c2'
  surface-tint: '#3f6653'
  primary: '#012d1d'
  on-primary: '#ffffff'
  primary-container: '#1b4332'
  on-primary-container: '#86af99'
  inverse-primary: '#a5d0b9'
  secondary: '#0e6c4a'
  on-secondary: '#ffffff'
  secondary-container: '#a0f4c8'
  on-secondary-container: '#19724f'
  tertiary: '#302410'
  on-tertiary: '#ffffff'
  tertiary-container: '#473a24'
  on-tertiary-container: '#b7a487'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#c1ecd4'
  primary-fixed-dim: '#a5d0b9'
  on-primary-fixed: '#002114'
  on-primary-fixed-variant: '#274e3d'
  secondary-fixed: '#a0f4c8'
  secondary-fixed-dim: '#85d7ad'
  on-secondary-fixed: '#002113'
  on-secondary-fixed-variant: '#005236'
  tertiary-fixed: '#f6dfc0'
  tertiary-fixed-dim: '#d9c4a5'
  on-tertiary-fixed: '#251a07'
  on-tertiary-fixed-variant: '#53452e'
  background: '#f9f9f8'
  on-background: '#191c1c'
  surface-variant: '#e1e3e2'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 36px
    fontWeight: '700'
    lineHeight: 44px
    letterSpacing: -0.01em
  headline-md:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  headline-sm:
    fontFamily: Playfair Display
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-md:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '600'
    lineHeight: 20px
    letterSpacing: 0.05em
  label-sm:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  container-max-width: 1200px
  gutter: 24px
  margin-desktop: 64px
  margin-mobile: 20px
---

## Brand & Style
The design system is rooted in **Modern Editorial Minimalism** with a **Tactile/Organic** influence. It seeks to bridge the gap between high-end digital publishing and grassroots community activism. The visual language evokes the serenity of a forest and the reliability of an academic journal, yet remains accessible through soft geometry and generous breathing room.

The aesthetic prioritizes clarity and environmental consciousness. It avoids the "tech-heavy" look of typical social platforms in favor of a sophisticated, slow-content experience that encourages deep reading and thoughtful community interaction.

## Colors
The palette is derived from the natural transition of forest layers.
- **Primary (Forest Green):** Used for authoritative text, primary brand moments, and high-importance UI elements. It represents the deep canopy.
- **Secondary (Sage/Mint):** Used for interactive elements, success states, and accents that require a "fresh" feel.
- **Tertiary (Sand/Clay):** An earth-tone used for subtle background shifts, secondary containers, and dividers to break the monotony of pure white.
- **Neutral (Off-White/Pebble):** The base surface color, chosen to reduce eye strain compared to pure #FFFFFF, providing a paper-like quality for the editorial content.

## Typography
This design system employs a classic "Serif for Story, Sans for Function" pairing. 
- **Playfair Display** provides the editorial authority needed for environmental journalism and long-form headers. It should be used with tighter letter spacing in larger sizes.
- **Inter** handles the functional UI, ensuring high legibility for community discussions, data points, and navigation. 
Vertical rhythm is maintained through a strict adherence to the defined line heights, ensuring that even dense community threads feel organized and airy.

## Layout & Spacing
The layout follows a **Fluid Grid** model with an emphasis on "negative space as a feature." 
- **Desktop:** 12-column grid with a 1200px max-width to keep line lengths for articles within a readable range.
- **Tablet:** 8-column grid with 32px side margins.
- **Mobile:** 4-column grid with 20px side margins.

Horizontal spacing between cards and sections should be generous (using the 24px gutter as a minimum). Vertical rhythm follows an 8px base unit, with section headers typically utilizing 64px to 80px of top padding to signify a transition in content.

## Elevation & Depth
Depth is communicated through **Tonal Layering** and **Ambient Shadows**. 
Instead of harsh black shadows, this design system uses "Nature Shadows"—diffused blurs with a tiny hint of Forest Green (#1B4332) in the shadow color at very low opacity (3-5%). 

- **Level 0 (Base):** Neutral Pebble (#F8F9F8).
- **Level 1 (Cards/Lists):** Pure White (#FFFFFF) with a soft 1px border in Clay (#D8C3A5 at 20% opacity).
- **Level 2 (Hover/Active):** Moderate shadow depth (12px blur, 4px Y-offset) to indicate interactivity.
- **Level 3 (Modals):** High blur (30px) with a subtle backdrop blur (8px) to keep the user grounded in the "nature" background.

## Shapes
The shape language is "Organic Geometric." While the core UI uses the `rounded-lg` (1rem) standard for most containers to maintain a friendly feel, specific "Organic Containers" (like image masks or featured hero sections) should use asymmetrical border radii or blob-like SVG masks to mimic natural forms like leaves or stones.

## Components
- **Buttons:** Primary buttons use the Forest Green background with White text. They feature a generous 16px horizontal padding and 12px vertical padding. Use `rounded-lg` for a soft but professional look.
- **Cards:** Content cards should have a White background, a very thin earth-tone border, and large `rounded-xl` corners. Images within cards should always have a 1:1 or 4:5 aspect ratio with matching top corner radii.
- **Chips/Tags:** Used for "Topic" categorization (e.g., #Renewable, #Wildlife). These use the Sage background (#74C69D) with Forest Green text at 0.75rem.
- **Input Fields:** Search and comment fields use a subtle Sand tint (#D8C3A5) at 10% opacity for the background to differentiate them from the card surfaces.
- **Progress Bars:** For community goals or fundraising, use a thick 8px bar with a Sage fill and a Clay background track.
- **Lists:** Community feed items are separated by subtle "Hairline" dividers in Clay (#D8C3A5 at 30% opacity) rather than heavy borders.