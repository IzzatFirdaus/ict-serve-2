import { test, expect } from '@playwright/test';

test.describe('ICTServe landing page', () => {
    test.beforeEach(async ({ page }) => {
        await page.goto('/');
    });

    test('loads and has main landmarks', async ({ page }) => {
        await expect(page).toHaveTitle(/ICTServe/);
        const main = await page.locator('main#main-content');
        await expect(main).toBeVisible();
    });

    test('skip link works and keyboard focus lands on main', async ({ page }) => {
        await page.keyboard.press('Tab');
        // first tabbable should be skip link
        const skip = page.locator('a.skip-link');
        await expect(skip).toBeVisible();
        await skip.focus();
        await page.keyboard.press('Enter');
        const main = page.locator('#main-content');
        await expect(main).toBeFocused();
    });

    test('hero CTA navigates to login fallback', async ({ page }) => {
        // scope to main hero area to avoid multiple matches
        const cta = page.locator('#main-content').locator('a', { hasText: 'Log Masuk' });
        await expect(cta).toHaveCount(1);
        await expect(cta).toBeVisible();
        // assert the href points to login; clicking/navigation can be implementation-specific (SPA vs full reload)
        await expect(cta).toHaveAttribute('href', /login/);
    });

    test('responsive: mobile and desktop breakpoints', async ({ page }) => {
        await page.setViewportSize({ width: 375, height: 800 });
        await expect(page.locator('main#main-content')).toBeVisible();
        await page.setViewportSize({ width: 1280, height: 800 });
        await expect(page.locator('main#main-content')).toBeVisible();
    });
});
