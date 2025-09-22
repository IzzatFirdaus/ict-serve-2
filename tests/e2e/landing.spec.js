"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const test_1 = require("@playwright/test");
test_1.test.describe('ICTServe landing page', () => {
    test_1.test.beforeEach(async ({ page }) => {
        await page.goto('/');
    });
    (0, test_1.test)('loads and has main landmarks', async ({ page }) => {
        await (0, test_1.expect)(page).toHaveTitle(/ICTServe/);
        const main = await page.locator('main#main-content');
        await (0, test_1.expect)(main).toBeVisible();
    });
    (0, test_1.test)('skip link works and keyboard focus lands on main', async ({ page }) => {
        await page.keyboard.press('Tab');
        // first tabbable should be skip link
        const skip = page.locator('a.skip-link');
        await (0, test_1.expect)(skip).toBeVisible();
        await skip.focus();
        await page.keyboard.press('Enter');
        const main = page.locator('#main-content');
        await (0, test_1.expect)(main).toBeFocused();
    });
    (0, test_1.test)('hero CTA navigates to login fallback', async ({ page }) => {
        const cta = page.locator('a', { hasText: 'Log Masuk' });
        await (0, test_1.expect)(cta).toBeVisible();
        await cta.click();
        await (0, test_1.expect)(page).toHaveURL(/login/);
    });
    (0, test_1.test)('responsive: mobile and desktop breakpoints', async ({ page }) => {
        await page.setViewportSize({ width: 375, height: 800 });
        await (0, test_1.expect)(page.locator('main#main-content')).toBeVisible();
        await page.setViewportSize({ width: 1280, height: 800 });
        await (0, test_1.expect)(page.locator('main#main-content')).toBeVisible();
    });
});
