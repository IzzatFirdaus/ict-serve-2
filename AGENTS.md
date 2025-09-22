# AGENTS.md

## Purpose

This document defines the workflow, tools, and rules for autonomous agents working on **Laravel 12 + Filament v4 projects**.  
It ensures consistent, safe, and efficient execution without requiring user confirmations.

---

## Core Principles

- **Autonomous Mode**: Run without interactive confirmation prompts.  
- **Continuous Execution**: Avoid unnecessary intermediate messages (only report completion or critical errors).  
- **Auto-Approval**: All safe commands and tool invocations are pre-approved.  
- **Error Handling**: Retry failures automatically (up to 3 times).  
- **Multi-File Operations**: Apply changes across related files in sequence.  
- **Context Awareness**: Always load project context before execution.  

---

## Supported Tools

- **`sequentialthinking`** — stepwise planning & execution  
- **`laravel-boost`** — Laravel framework utilities, artisan, database, app context  
- **`context7`** — repo-wide code/documentation search  
- **`firecrawl`** — external web crawling & data gathering  

**Rules:**

- Always use the most specific tool for the task.  
- Auto-approve Laravel dev/test commands.  
- Require explicit confirmation for destructive operations (`rm`, `git push --force`, production DB changes).  

---

## Workflow

### 1. Planning

- Analyze requirements and project context.  
- Search for related code/docs (via `context7`).  
- Draft detailed stepwise implementation plan.  
- Verify against **Laravel 12 standards + MYDS design system**.  

### 2. Execution

- Use **`laravel-boost`** for Laravel-specific operations.  
- Use `php artisan make:` for scaffolding.  
- Run validation tests after significant changes.  
- Retry transient errors automatically (up to 3x).  

### 3. Validation

- Run full **PHPUnit & Pest test suites**.  
- Validate compliance with **MYDS + accessibility (WCAG AA)**.  
- Check for regressions and performance issues.  
- Update documentation & mark tasks complete.  

---

## Laravel Guidelines

- **Artisan**: Always use `php artisan make:` for generating code.  
- **Database**: Use Eloquent + migrations; avoid raw queries.  
- **Validation**: Always via **Form Request classes** (not inline).  
- **Authentication**: Use **Sanctum** + Gates/Policies.  
- **Project Structure**: Follow strict directory structure; no new root folders without approval.  
- **UI**: Use **MYDS tokens** for styling (colors, spacing, typography).  
- **Grid System**: Follow **12-8-4 responsive grid convention**.  

---

## Filament v4 Guidelines

- Generate resources with `php artisan make:filament-resource --generate`.  
- Use **unified schema architecture** for forms, tables, infolists.  
- Optimize performance with **partial rendering + semantic CSS**.  
- Follow new **resource directory structure with separated schema classes**.  

---

## Error Handling & Recovery

- Retry transient errors (3 attempts, 2s delay).  
- Log permanent errors & continue next task.  
- Pause if system resource usage > 80%.  
- Use **checkpoints/snapshots** for safe rollback.  

---

## Security Boundaries

- Auto-approve **safe dev/test commands**.  
- Require confirmation for destructive operations.  
- Never commit secrets; use `.env` + `.env.example`.  
- Run automated security scans & dependency checks.  
- Ensure access control via **Laravel Policies & Gates**.  

---

## Communication

- Notify **only on completion or critical errors**.  
- Use clear, structured markdown in reports.  
- Maintain accurate changelogs in PR descriptions.  
- Include recovery steps with error messages.  

---

## Integration

- Combine with `copilot-instructions.md` for unified guidance.  
- Enforce all project-specific rules and standards.  
- All agent changes must pass **CI/CD tests** before completion.  
- Ensure changes are **production-ready**.  

---

## Contribution Guidelines

This repository follows **Git and GitHub best practices** for branching, commits, and pull requests.  
All contributions (including automated agent commits) must follow these rules.

### Branching Strategy

- **Main branches**:
  - `master`: Always production-ready.  
  - `develop`: Integration branch for active development.  
- **Feature branches**: `feature/<name>` → new features or refactors (branched from `develop`).  
- **Bugfix branches**: `bugfix/<name>` → small fixes (branched from `develop`).  
- **Hotfix branches**: `hotfix/<name>` → urgent production fixes (branched from `master`).  
- **Release branches**: `release/vX.Y.Z` → release prep (branched from `develop`).  *SEMANTIC VERSIONING

### Commit Messages

- Use **present tense** (e.g., "Add login form").  
- Keep subject ≤ 50 chars.  
- Add details in body after a blank line.  
- Reference issues (e.g., `Closes #42`).  
- Make **small, atomic commits**.  

### Pull Requests (PRs)

- All merges into `master` or `develop` require a PR.  
- PRs must have a clear title & summary.  
- Reference issues/tickets in description.  
- Assign at least one reviewer.  
- CI checks must pass before merging.  
- **No direct pushes to `master`**.  

### Merge Policy

- Use **Squash & Merge** or **Rebase & Merge** for clean history.  
- Resolve conflicts before merge.  
- Delete source branch after merge (if no longer needed).  

### Example Workflow

```bash
git checkout develop
git pull origin develop
git checkout -b feature/your-feature
# make changes, commit
git push origin feature/your-feature
# open PR → develop
```

### Additional Rules

- Always pull/rebase before pushing.
- No force pushes to shared branches.
- Keep `master` stable and deployable.
- Use `.gitignore` to avoid tracking unnecessary files.
- Regularly clean up merged or stale branches.

See `_reference/Git and GitHub Core Concepts and Best Practices.md` for more details.

---

## References

- [MCP Agent Documentation](https://github.com/lastmile-ai/mcp-agent)
- [Laravel Boost](https://github.com/laravel-boost/documentation)
- [MYDS Design System](https://design.digital.gov.my/en)
- [Filament v4 Docs](https://filamentphp.com/docs)
- [Copilot Instructions Format](https://docs.github.com/en/copilot/github-copilot-chat/using-github-copilot-chat#using-custom-instructions)

---

**Version**: 2.0
**Last Updated**: 2024
**Compatibility**: Laravel 12, Filament v4, PHP 8.2+
**Status**: Active
