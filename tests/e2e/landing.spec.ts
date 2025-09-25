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
    // (removed stray skip link test code outside of test block)
    test('skip link works and keyboard focus lands on main', async ({ page }) => {
        await page.waitForLoadState('domcontentloaded');
        // Use JS to directly query the skip link (design system selector)
        const skipHtml = await page.evaluate(() => {
            const el = document.querySelector('.ds-skip-link');
            return el ? el.outerHTML : null;
        });
        if (!skipHtml) throw new Error('Skip link not found in DOM');
        // Now use locator to interact if present
    const skip = page.locator('.ds-skip-link');
        await skip.waitFor({ state: 'attached', timeout: 3000 });
        await skip.focus();
        await expect(skip).toBeVisible();
        await page.keyboard.press('Enter');
        const main = page.locator('#main-content');
        await expect(main).toBeFocused();
    });

    test('hero CTA navigates to login fallback', async ({ page }) => {
        const cta = page.locator('#main-content a[href="/login"]');
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
