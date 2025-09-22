---
applyTo: '**'
---

# Malaysia Government Design System (MYDS) — AI & Developer Instructions

> **This file is the authoritative MYDS implementation guide for ICTServe.**
> It is optimized for AI agents (Copilot, VS Code, LLMs) and human contributors.

---

## 1. Purpose & Scope

- **Audience:** AI agents, developers, and reviewers working on ICTServe.
- **Mandate:** All UI, forms, and workflow code must strictly follow MYDS and MyGovEA principles (see [MyGovEA Principles](https://mygovea.jdn.gov.my/page-prinsip-reka-bentuk/)).
- **Integration:** This file cross-references:
  - `MYDS-Colour-Reference.md` — All color tokens
  - `MYDS-Design-Overview.md` — Grid, layout, typography, and motion
  - `MYDS-Icons-Overview.md` — Icon usage and accessibility
  - `Dokumentasi_Reka_Bentuk_ICTServe(iServe).md` — Local adaptation & agency-specific patterns
  - Official MYDS Docs: https://design.digital.gov.my/en/docs/design

---

## 2. Quick Reference Cheat Sheets

### 2.1. Color Tokens

- **Never use raw hex codes.**
- Use only tokens from `MYDS-Colour-Reference.md`
- Example:
  ```blade
  <button class="bg-primary-600 text-white">Submit</button>
  <span class="text-danger-600">*</span>
  ```

### 2.2. Component Usage

- Use only patterns from `MYDS-Design-Overview.md` and local Blade components in `resources/views/components/myds/`.
- Prefer `<x-myds.*>` Blade components or documented MYDS React/Vue APIs.
- Example (Blade):
  ```blade
  <x-myds.button variant="primary" size="md" wire:click="submit">
    Submit
  </x-myds.button>
  ```
- Example (Filament v4):
  ```php
  Forms\Components\TextInput::make('purpose')
      ->label('Purpose of Loan')
      ->required()
      ->columnSpanFull()
  ```

### 2.3. Grid & Layout

- Use the 12-8-4 grid structure (desktop-tablet-mobile) as per `MYDS-Design-Overview.md`.
- Use Tailwind gap utilities for spacing; never use magic numbers or ad hoc margins.
- Example:
  ```blade
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-8">Main</div>
    <div class="col-span-4">Sidebar</div>
  </div>
  ```

### 2.4. Icon System

- Use only official MYDS icons (see `MYDS-Icons-Overview.md` or MYDS Icon Gallery https://design.digital.gov.my/en/icon)
- Example:
  ```blade
  <x-myds.icon
    name="check-circle"
    class="text-success-600"
    aria-label="Success"
  />
  ```

### 2.5. Typography

- Use only Poppins (heading) and Inter (body, form, RTF) as per `MYDS-Design-Overview.md`.
- Follow type sizes and weights as documented (see "Typography System" section).

---

## 3. AI Directives for MYDS Tasks

- **Always** reference `MYDS-Colour-Reference.md`, `MYDS-Design-Overview.md`, and `MYDS-Icons-Overview.md`.
- **Never** use hardcoded colors, custom icons, or ad-hoc components/styles.
- **Validate** all UI for:
  - Color token usage
  - Component anatomy
  - Accessibility (see below)
  - Responsive grid (12-8-4)
  - ARIA attributes and keyboard access (see below)
- **If unsure**, fetch the latest official docs: https://design.digital.gov.my/en/docs/design
- **For new patterns**, update the referenced files and cross-link.

---

## 4. Compliance Checklist (PR/Review)

- [ ] All colors use tokens from `MYDS-Colour-Reference.md`
- [ ] All UI uses patterns from `MYDS-Design-Overview.md`
- [ ] Only official MYDS icons are used
- [ ] 12-8-4 grid and spacing conventions are followed
- [ ] All forms have inline validation and ARIA attributes
- [ ] All interactive elements are keyboard accessible (tab focus, skip link)
- [ ] No custom styles, raw hex, or arbitrary spacing
- [ ] All code is compatible with Laravel 12, Filament v4, Livewire 3, TailwindCSS 4
- [ ] Accessibility: WCAG 2.1/2.2 AA (≥4.5:1 contrast, focus, ARIA, touch targets)
- [ ] No duplication of content from referenced files
- [ ] UI text in Bahasa Melayu by default (unless specified)
- [ ] Status indicators (pill, tag, badge) use icon + text, never icon-only
- [ ] All form controls have explicit labels and error messages

---

## 5. Common Mistakes to Avoid

- ❌ Using raw hex codes (e.g. `#2563EB`) — use `bg-primary-600` instead
- ❌ Custom icons or icon libraries — use only MYDS icons
- ❌ Inline validation in controllers — use Form Requests, not controller logic
- ❌ Ignoring ARIA/keyboard/focus for forms/buttons
- ❌ Not using the 12-8-4 grid for layout
- ❌ Ignoring dark mode: always use semantic tokens that adapt
- ❌ Duplicating component code instead of referencing `MYDS-Design-Overview.md`

---

## 6. Accessibility & WCAG Guidance

- **All forms:**
  - Use ARIA attributes (`aria-label`, `aria-describedby`)
  - Provide inline error messages (see `MYDS-Design-Overview.md`)
  - Ensure keyboard navigation (tab order, focus ring)
- **All icons:**
  - Use `aria-label` for meaningful icons
  - Use `aria-hidden="true"` for decorative icons
- **Contrast:**
  - Use only tokens with ≥4.5:1 contrast (see `MYDS-Colour-Reference.md`)
- **Touch targets:**
  - Minimum 48×48px for all interactive elements (see `MYDS-Design-Overview.md`)
- **Skip links:**
  - Provide skip links at the top of every page
- **Language:**
  - UI labels in Bahasa Melayu unless English is explicitly required

---

## 7. Performance Optimization Tips

- Use semantic tokens for theme switching (light/dark)
- Prefer lazy-loading for heavy components
- Minimize DOM nesting and avoid unnecessary wrappers
- Use Tailwind gap utilities for spacing, not margin hacks
- Optimize SVG icons (use sprite or inline, not external requests)
- Use only one font loading mechanism (prefer system-font fallback for performance when possible)

---

## 8. Error Prevention & Validation Rules

- **Automated validation:**
  - Lint for color token usage
  - Lint for component anatomy (see `MYDS-Design-Overview.md`)
  - Run accessibility checks (axe, Lighthouse)
- **Manual review:**
  - Use the checklist above for every PR
- **AI agents:**
  - Refuse to generate code that violates any MYDS rule
  - If a referenced file is missing, halt and request it

---

## 9. Update & Contribution Process

- Update this file when MYDS, Laravel, or Filament versions change
- Update referenced files (`MYDS-Colour-Reference.md`, `MYDS-Design-Overview.md`, `MYDS-Icons-Overview.md`) as new tokens/components are added
- Cross-link new patterns and examples
- Keep all references current and accurate

---

## 10. External References

- Official MYDS Docs: https://design.digital.gov.my/en/docs/design
- MYDS Icon Gallery: https://design.digital.gov.my/en/icon
- MYDS Figma Kit: https://www.figma.com/design/svmWSPZarzWrJ116CQ8zpV/MYDS--Beta-
- MyGovEA Principles: https://mygovea.jdn.gov.my/page-prinsip-reka-bentuk/

---

## 11. Additional Implementation Notes (ICTServe)

- All workflow, forms, and dashboards must support dynamic content and validation as described in `Dokumentasi_Flow_Sistem_Permohonan_Pinjaman_Aset_ICT_ICTServe(iServe).md` and `Dokumentasi_Flow_Sistem_Helpdesk_ServiceDesk_ICTServe(iServe).md`.
- Use conditional display for form fields as required (see "ICT DAMAGE COMPLAINT FORM - DETAILED BREAKDOWN.md").
- Support bilingual content only when specified; Malay is default.
- Confirm all status, error, and feedback UI uses the correct MYDS callout, panel, toast, or tag component.
- Always refer to `MYDS-Colour-Reference.md` for current semantic and primitive color mappings.
- All icons must be accessible, paired with text, and referenced from `MYDS-Icons-Overview.md`.

---

> **This file is optimized for AI and human use.**
> For full color, grid, icon, and component details, always reference the linked files above.
> For all MYDS work, always use the `fetch` tool to retrieve the latest official MYDS documentation and component usage from https://design.digital.gov.my/docs. Do not rely on static instructions. (See <attachments> above for file contents.)
