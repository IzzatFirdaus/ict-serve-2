import { test, expect } from '@playwright/test';

test.describe('Language and Theme Switcher', () => {
  test('Language switch updates all UI text', async ({ page }) => {
    await page.goto('/');
    // Default: BM
    console.log('Checking default language (BM)');
    await expect(page.locator('#main-content a:has-text("Log Masuk")')).toBeVisible();

    console.log('Switching to English');
    await page.selectOption('#lang-select', 'en');
    await page.waitForSelector('#main-content a:has-text("Login")'); // Explicit wait for Login link
    console.log('Checking English language');
    await expect(page.locator('#main-content a:has-text("Login")')).toBeVisible();

    console.log('Switching back to BM');
    await page.selectOption('#lang-select', 'ms');
    await page.waitForSelector('#main-content a:has-text("Log Masuk")'); // Explicit wait for Log Masuk link
    console.log('Checking BM language again');
    await expect(page.locator('#main-content a:has-text("Log Masuk")')).toBeVisible();
  });

  test('Theme switch toggles and persists', async ({ page }) => {
    await page.goto('/');
    await page.selectOption('#theme-select', 'dark');
    await page.waitForLoadState('networkidle'); // Ensure theme is applied
    await expect(page.locator('html[data-theme="dark"]')).toBeVisible();
    await page.reload();
    await expect(page.locator('html[data-theme="dark"]')).toBeVisible();
    await page.selectOption('#theme-select', 'light');
    await page.waitForLoadState('networkidle'); // Ensure theme is applied
    await expect(page.locator('html[data-theme="light"]')).toBeVisible();
    await page.selectOption('#theme-select', 'system');
    await page.waitForLoadState('networkidle'); // Ensure theme is applied
    // System theme: can't assert color, but can check attribute
    await expect(page.locator('html[data-theme="light"], html[data-theme="dark"]')).toBeVisible();
  });

  test('Switchers are accessible', async ({ page }) => {
    await page.goto('/');
    await page.focus('#lang-select');
    await expect(page.locator('#lang-select')).toBeFocused();
    await page.focus('#theme-select');
    await expect(page.locator('#theme-select')).toBeFocused();
    await expect(page.locator('#lang-select')).toHaveAttribute('aria-label', /Dropdown pilihan bahasa|Language selection dropdown/);
    await expect(page.locator('#theme-select')).toHaveAttribute('aria-label', /messages.theme.switch|Switch theme/);
  });

  test('language and theme persist after reload', async ({ page }) => {
    const languageDropdown = page.locator('select#lang-select');
    const themeDropdown = page.locator('select#theme-select');

    console.log('Setting language to BM and theme to dark');
    await languageDropdown.selectOption('ms');
    await themeDropdown.selectOption('dark');
    await page.waitForLoadState('networkidle'); // Ensure selections are applied

    console.log('Reloading page');
    await page.reload();

    console.log('Checking language dropdown after reload');
    await page.waitForSelector('select#lang-select'); // Explicit wait for lang-select
    console.log('Checking theme dropdown after reload');
    await page.waitForSelector('select#theme-select'); // Explicit wait for theme-select

    console.log('Verifying persisted language and theme');
    await expect(languageDropdown).toHaveValue('ms');
    await expect(themeDropdown).toHaveValue('dark');
    await expect(page.locator('html')).toHaveAttribute('lang', 'ms');
    await expect(page.locator('html')).toHaveAttribute('data-theme', 'dark');
  });
});
