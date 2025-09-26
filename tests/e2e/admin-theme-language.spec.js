import { test, expect } from '@playwright/test';

test.describe('Filament admin theme & language', () => {
  test('loads admin and toggles theme', async ({ page }) => {
    await page.goto('http://localhost/admin');
    await expect(page).toHaveTitle(/Filament|Dashboard/);

    // Open topbar and select theme
    const themeSelect = page.locator('#theme-select');
    await expect(themeSelect).toBeVisible();
    await themeSelect.selectOption('dark');
    // verify data-theme set
    await expect(page.locator('html')).toHaveAttribute('data-theme', /dark|system/);
  });

  test('switches language to Bahasa Melayu', async ({ page }) => {
    await page.goto('http://localhost/admin');
    const langSelect = page.locator('#lang-select');
    await expect(langSelect).toBeVisible();
    await langSelect.selectOption('ms');
    // page should reload; check dashboard heading in MS
    await expect(page.locator('text=Papan Pemuka')).toBeVisible();
  });
});
