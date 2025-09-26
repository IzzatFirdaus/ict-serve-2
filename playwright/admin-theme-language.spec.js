const { test, expect } = require('@playwright/test');

/**
 * E2E tests for essential user preferences in the Filament Admin Panel.
 *
 * These tests cover:
 * 1. Theme switching (Light/Dark) and verifying the UI attribute.
 * 2. Language switching (EN/MS) and verifying the UI text updates.
 *
 * It assumes a programmatic login is handled before tests run.
 */
test.describe('Admin Panel: Theme & Language Switching', () => {
    /**
     * This hook runs before each test. It handles logging in and navigating
     * to the dashboard, ensuring a clean state for each test case.
     */
    test.beforeEach(async ({ page }) => {
        // NOTE: For a real test suite, you would use a programmatic login helper here
        // to speed up tests and improve reliability, rather than logging in via the UI.
        // Example: await loginAsAdmin(page);

        // Navigate to the admin dashboard before each test.
        await page.goto('/admin');

        // A baseline assertion to ensure we have successfully loaded the dashboard.
        await expect(page.getByRole('heading', { name: /Dashboard|Papan Pemuka/ })).toBeVisible();
    });

    test('allows a user to switch themes and verifies the change', async ({ page }) => {
        // Arrange: Locate the theme switcher using its accessible name.
        // This is more robust than relying on an ID.
        const themeSwitcher = page.getByLabel(/Pilih Tema|Select Theme/);
        await expect(themeSwitcher).toBeVisible();

        // Act: Switch to Dark mode.
        await themeSwitcher.selectOption('dark');

        // Assert: The <html> tag's data-theme attribute should be 'dark'.
        await expect(page.locator('html')).toHaveAttribute('data-theme', 'dark');

        // Act: Switch back to Light mode.
        await themeSwitcher.selectOption('light');

        // Assert: The <html> tag's data-theme attribute should now be 'light'.
        await expect(page.locator('html')).toHaveAttribute('data-theme', 'light');
    });

    test('allows a user to switch the language and verifies the UI updates', async ({ page }) => {
        // Arrange: Locate the language switcher.
        const languageSwitcher = page.getByLabel(/Pilih Bahasa|Select Language/);
        await expect(languageSwitcher).toBeVisible();

        // Act: Switch the language to Bahasa Melayu.
        await languageSwitcher.selectOption('ms');

        // The Livewire component should trigger a page redirect. Playwright's
        // auto-waiting handles this before the next assertion.

        // Assert: Check for a key UI element that is translated, like the main heading.
        // The text 'Papan Pemuka' is defined in the Malay language file.
        const malayHeading = page.getByRole('heading', { name: 'Papan Pemuka' });
        await expect(malayHeading).toBeVisible();
    });
});
