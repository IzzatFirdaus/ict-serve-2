---
applyTo: '**'
---

# Copilot Chat Agent: SAFE SQL & DATABASE OPERATIONS POLICY

This file defines **strict rules** for Copilot Chat and CLI agents in this repository, optimized for Visual Studio Code workflows.  
Its purpose is to prevent wasted effort, repeated failures, and unsafe operations in **VS Code integrated terminals**, **PowerShell**, or other shells, and to ensure correct, safe, and user-friendly database interactions.

---

## Core Database Rules

### 1. SQL Queries

- **Never** attempt to run `.md`, `.txt`, `.docx`, `.pdf`, or prose files as SQL input.
- Only `.sql` files, valid migration scripts, or code-based queries (ORM/Eloquent) are allowed.
- **Do NOT** suggest running raw `mysql`, `mysql.exe`, or `mysql -u ...` commands in the VS Code terminal.
- **DO NOT** generate or suggest any destructive SQL (DROP DATABASE, TRUNCATE, etc.) without explicit confirmation and clear context.
- **RECOMMENDED:** For all direct database queries, schema browsing, or data edits, use the **VS Code MySQL extension** ([cweijan.vscode-mysql-client2](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-mysql-client2)):
    - Guide users to use the extension’s sidebar UI, query editor, or table/data browser for all direct SQL or schema operations.
    - If a requested database operation cannot be done via the extension, explain the limitation and suggest a safe alternative.
    - Do not suggest terminal-based MySQL commands.

### 2. Laravel Database Operations

- Use only Laravel’s built-in tools for DB migrations and seeding:
    - `php artisan migrate`
    - `php artisan db:seed`
    - `php artisan migrate:fresh --seed`
    - Use Eloquent ORM for querying and data manipulation in application code.
- Do **not** run design docs or `.md` files as SQL.
- For direct queries or inspection, always recommend the VS Code MySQL extension’s GUI and query editor.

### 3. PowerShell & Shell Syntax

- Do **not** use Bash operators (`||`, `&&`) in PowerShell—they will fail.
- In PowerShell, use:
    - `;` for sequential commands.
    - `if (...) { ... } else { ... }` for conditionals.
- Always detect the current shell before generating commands.
- Do not assume cross-platform compatibility.

### 4. Failures & Safety

- Do **not** retry the same failing command repeatedly.
- If a command fails, analyze the root cause, explain, and recommend a safe next step.
- Never auto-run destructive commands (`rm -rf`, `DROP DATABASE`, `git push --force`).
- Never chain destructive commands blindly.
- Every command must be justified, safe, and suited to the environment.

---

## Visual Studio Code MySQL Extension Usage

- Use the [VS Code MySQL extension](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-mysql-client2) for:
    - Connecting to MySQL/MariaDB servers (local or remote)
    - Browsing databases, tables, and columns visually
    - Querying and editing data safely in a spreadsheet-like interface
    - Running `.sql` files, inspecting results, and exporting data
    - Managing users, privileges, and schema changes via the GUI
    - Viewing and designing ER diagrams
- **Instruct users to:**
    - Open the "Database" sidebar in VS Code
    - Use the extension’s context menu to run queries, edit data, or manage schema
    - Leverage the built-in SQL editor for safe, visual query execution

---

## Safe Patterns (PowerShell & VS Code)

**General:**

- Always explain first, run second.
- Never issue ambiguous or environment-unsafe commands.
- Prefer checks and confirmations over assumptions.

**PowerShell Examples:**

```powershell
php artisan migrate; php artisan db:seed
php artisan list
php artisan list | Select-String migrate
```

- Test preconditions (e.g., file exists, DB running) before running commands.

**VS Code Database Operations:**

- Open the VS Code MySQL extension panel for all direct DB work.
- Avoid terminal-based MySQL interaction; use GUI for browsing, editing, or querying.

---

## When to EXPLAIN Instead of EXECUTE

- If input file is not `.sql`
- If the shell is unclear
- If action is destructive or irreversible
- If the request is ambiguous, context-dependent, or cannot be done safely using the extension

---

## DO NOT Examples

**Invalid SQL input (never do this):**

```powershell
mysql -u root -p < Dokumentasi_Reka_Bentuk_ICTServe(iServe).md
```

**PowerShell misuse:**

```powershell
php artisan migrate || php artisan db:seed
```

**Manual CLI MySQL querying (always use the extension):**

```powershell
mysql -u root -p
```

**Unsafe repeated retries or destructive chains.**

---

## Summary

Copilot Chat agents must always prioritize **safety, clarity, and context awareness**:

- For all direct database tasks, use the VS Code MySQL extension ([cweijan.vscode-mysql-client2](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-mysql-client2)) and guide users accordingly.
- When in doubt, **STOP, explain, and ask** before running or suggesting any database commands.
- Never assume, never brute-force, and always prefer safe, visual, and user-friendly DB operations in VS Code.
