# Contributing

Thank you for contributing to ICTServe (iServe). This document describes the branch rules, branch purposes, pull request process, commit message guidelines, and common conventions for this repository.

## Branch rules & purposes

We use a hybrid of Gitflow and Feature Branch workflow. Branches in this repository and their purposes:

- `master`
  - Purpose: Canonical default branch. Always production-ready and stable. All hotfixes and releases ultimately land here.
  - Rules: Protected. Require PR review and passing CI before merging.

- `develop`
  - Purpose: Integration branch for ongoing development. Features are merged here and prepared for the next release.
  - Rules: PRs from `feature/*` branches should target `develop`. Require CI and at least one review.

- `production`
  - Purpose: Represents what is deployed to production (optional environment-specific branch). Use if your deployment pipeline targets a separate branch.
  - Rules: Keep in sync with `master` via merges or automated deployments. Protect if it triggers releases.

- `live`
  - Purpose: Optional branch for live/hot deployments or a separate live environment. Document and use consistently.
  - Rules: Same protection recommendations as `production`.

- `hotfix/*` (or single `hotfix` branch)
  - Purpose: Fast, targeted fixes for production. Branch from `master` to fix urgent issues and merge back into `master` and `develop`.
  - Rules: Keep hotfixes small and well-tested. Tag the master branch with a release version after merging.

- `feature/*` (e.g., `feature/initial-setup`)
  - Purpose: Short-lived branches for features, improvements, or experiments. Branch from `develop` (or `master` if not using `develop`).
  - Rules: Create PRs to `develop`. Delete branch after merging.

## Branch naming conventions

- Feature branches: `feature/<short-description>`
- Bugfix branches: `bugfix/<short-description>`
- Hotfix branches: `hotfix/<short-description>`
- Release branches: `release/<semver>` (e.g., `release/0.1.0`)

Use lowercase, hyphens to separate words, and keep names descriptive but short.

## Pull request process

1. Create a feature branch from `develop` (or `master` if working directly on main):

   ```powershell
   git checkout develop
   git checkout -b feature/your-feature-name
   ```

2. Make changes, commit frequently with meaningful messages, and push your branch:

   ```powershell
   git push -u origin feature/your-feature-name
   ```

3. Open a Pull Request targeting `develop` (or `master` for hotfixes). Provide a clear description, screenshots if applicable, and link related issues.
4. Ensure CI passes and request at least one code review. Address review comments with follow-up commits.
5. After approval, merge the PR using a merge commit or squash (team preference) and delete the branch.

## Commit message guidelines

- Use present tense: "Add login form", not "Added login form".
- Keep the subject line under 50 characters.
- Add a body with more details and linked issues when necessary.
- Example:

  ```git
  feat(auth): add login form and remember-me option

  - Add login form component
  - Add remember-me checkbox to improve UX
  - Closes #123
  ```

## Workflow variants

- Simple feature-branch:
  - Work on `feature/*`, PR to `develop` or `main` if `develop` is not used.

- Gitflow:
  - Use `develop` for integration, `release/*` for release stabilization, and `hotfix/*` for emergency fixes.

## Branch protection & CI

- Protect `master` (and `production`/`live` if used) with required status checks, required reviews, and disallowed force pushes.
- Ensure CI (tests, static analysis) runs on PRs and pushes to important branches.

## Local housekeeping

- Delete local branches after merging:

  ```powershell
  git branch -d feature/your-feature-name
  git push origin --delete feature/your-feature-name
  ```

- Rebase or merge regularly from `develop` to keep your feature branch up to date and reduce merge conflicts.

## Questions or exceptions

If you're unsure where to branch from, ask in a PR or open an issue describing your change. Exceptions to the workflow must be documented in the PR description.

---

Thanks for helping keep this repo clean and collaborative.
