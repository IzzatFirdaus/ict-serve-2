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
        const cta = page.locator('a', { hasText: 'Log Masuk' });
        await expect(cta).toBeVisible();
        await cta.click();
        await expect(page).toHaveURL(/login/);
    });

    test('responsive: mobile and desktop breakpoints', async ({ page }) => {
        await page.setViewportSize({ width: 375, height: 800 });
        await expect(page.locator('main#main-content')).toBeVisible();
        await page.setViewportSize({ width: 1280, height: 800 });
        await expect(page.locator('main#main-content')).toBeVisible();
    });
});
