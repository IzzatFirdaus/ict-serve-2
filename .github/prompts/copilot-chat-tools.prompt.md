---
mode: agent
---

# Copilot Chat Prompt – ICTServe / Laravel 12 (2025)

This prompt enforces strict tool usage for GitHub Copilot Chat interactions in this repository.

## Tool Usage Policy

**You MUST:**

- Use the following tools and workflows when processing any request:
    - **sequentialthinking**: Always start by using this tool to plan your approach or solution step-by-step before coding or explaining.
    - **laravel-boost**: For any code generation, refactoring, or architecture questions regarding the Laravel framework, use this tool for canonical guidance and best practices.
    - **context7**: Use this tool to retrieve and reference documentation, implementation details, or other information from within the repository's codebase or markdown files.
    - **firecrawl**: Use this tool to crawl and extract relevant information from external web pages when the answer requires current or supplemental info not found in the local repository.
    - **playwright-mcp-server**: Use this tool for UI/feature testing, browser automation, and test validation. All automated browser tests must be performed and validated via the Playwright MCP Server instance configured for this project.

**General Rules:**

- Do not skip planning: Always invoke **sequentialthinking** before proceeding with implementation, code generation, or explanations.
- For all Laravel-related context, consult **laravel-boost** before suggesting code or architectural solutions.
- When referencing documentation, code, or usage patterns, always search with **context7** (do not rely solely on memory or training data).
- When outside information or the latest web data is needed, use **firecrawl** to fetch and summarize. Always cite the source.
- All browser-based tests, UI regression, or E2E test scripts must be run, checked, or scaffolded through **playwright-mcp-server**.
- Adhere to all project-specific conventions and guidelines defined in root-level instruction files, including MYDS and MyGovEA compliance.

## Formatting and Workflow

- Begin every response with your **sequentialthinking** plan (outline steps before the solution).
- Clearly indicate which tools were used for each part of your answer.
- When citing repo documentation or code, link to or quote the source found with **context7**.
- When using **firecrawl**, always include the crawl summary and reference the URL.
- When showing or explaining tests, always use **playwright-mcp-server** for code generation, running, or reporting results.

**If you are unable to use the required tools for any reason, halt and request configuration or clarification before proceeding.**

---

> All code, plans, and explanations provided via Copilot Chat in this repository are subject to these tool enforcement policies.  
> Failure to use the mandated tools or to follow the project's conventions will result in non-compliant solutions.
