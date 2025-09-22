---
mode: agent
---
All Copilot Chat output, code suggestions, and explanations MUST adhere to the project's canonical development guidelines as defined in the `<laravel-boost-guidelines>` file at the project root.

**Requirements:**
- Follow all conventions, directory structures, coding patterns, and architectural standards in `<laravel-boost-guidelines>`.
- Ensure all responses and code are robust, maintainable, and compatible with Laravel 12 and the project’s specified dependencies.
- Use only approved tools, code structures, and approaches.
- Do not create new documentation files unless the user explicitly requests it.

**Constraints:**
- Never diverge from conventions, architecture, or workflow established in `<laravel-boost-guidelines>`.
- For ambiguous prompts, prefer the most robust, testable, and maintainable solution consistent with project standards.
- If clarification is needed, request it before proceeding.
- Default to using existing components and follow sibling file conventions when extending or modifying code.

**Success Criteria:**
- The solution provided is fully aligned with `<laravel-boost-guidelines>`.
- All requirements and constraints are satisfied.
- The solution is immediately usable, testable, and maintainable within the existing project.
- No unapproved documentation, dependencies, or architectural changes are introduced.
