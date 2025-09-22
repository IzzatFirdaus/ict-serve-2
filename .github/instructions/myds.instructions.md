---
applyTo: '**'
---

# Malaysia Government Design System (MYDS) LLM Coding & UI Instructions (2025)

_Last updated: September 2025_

- Always reference project documentation for MYDS usage, implementation, and best practices:
    - `MYDS-Design-Overview.md`
    - `MYDS-Colour-Reference.md`
    - `MYDS-Icons-Overview.md`
    - Any relevant repo files in `resources/views/components/myds/`
- Do not rely on prior knowledge or training data for MYDS components, tokens, or UI patterns; always follow the current project documentation and implementation.
- For any component, pattern, or MYDS-related question, consult the above documentation and existing project usage first. Default to the most accessible and MYDS-compliant solution.

**Core Principles:**

- MYDS is mandatory for all UI/UX work: all code and design must use only MYDS components, design tokens, and layout/grid patterns.
- Use only approved semantic tokens for colour (`bg-*`, `txt-*`, `otl-*`, `fr-*`), spacing, radius, and shadow.  
  **Never** use hardcoded HEX, custom classes, or unapproved styles.
- Follow the 12-8-4 responsive grid, accessibility standards (WCAG 2.1 AA or newer), and ensure all UI is keyboard-navigable, with appropriate ARIA attributes.
- Always pair icons with text; never use icon-only buttons for actions or status.
- Use Bahasa Melayu for UI labels unless English is explicitly required.

**Coding Guidelines:**

- Use only established MYDS Blade components from `resources/views/components/myds/` or as documented. Reuse components and patterns already present in the project.
- When adding new UI, ensure it fits the 12-8-4 grid and uses spacing, radius, and shadow tokens as documented.
- For dark mode, rely exclusively on semantic tokens that adapt to theme—do not add custom dark mode classes or styles.
- Include ARIA labels, explicit form labels, and alt text for all interactive or visual elements.
- If updating backend code that renders UI, ensure data returned is shaped for the MYDS components, including accessibility hints and helper text.
- Add or update feature/accessibility tests when introducing or modifying UI, following repo conventions for test structure and factories.
- Document design or accessibility assumptions clearly, and reference the relevant section of MYDS docs or repo design files.
- Always use official MYDS icon names and variants from `MYDS-Icons-Overview.md`. Never use icons that are not referenced in the official documentation.
- Validation and error states must use MYDS callout or panel components as specified.
- Use only Poppins (heading) and Inter (body, forms, RTF) as documented in the typography guidelines.
- Status indicators (pill, tag, badge) must use icon + text, not icon-only or text-only.
- All form controls must have explicit labels, error messages, and appropriate ARIA support.
- All workflow, dashboard, and notification UI must follow MYDS patterns for tables, summary lists, and toasts.

**Summary:**

> All AI-generated code, UI, and documentation MUST strictly comply with the Malaysia Government Design System (MYDS) and project documentation.  
> Never suggest, generate, or review code that uses non-MYDS components, custom tokens, or unapproved patterns.  
> If unsure, consult the referenced documentation or ask for clarification.
