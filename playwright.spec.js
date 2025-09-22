import { test, expect } from '@playwright/test';

test('home page loads', async ({ page }) => {
    await page.goto('http://localhost');
    await expect(page).toHaveTitle(/Laravel/);
    await expect(page.locator('body')).toContainText(['Laravel', 'Filament', 'Livewire']);
});

test('Filament admin login page loads', async ({ page }) => {
    await page.goto('http://localhost/admin/login');
    await expect(page.locator('body')).toContainText(['Login', 'Filament']);
});

test('Livewire component renders', async ({ page }) => {
    await page.goto('http://localhost');
    await expect(page.locator('[wire\:id]')).toBeVisible();
});
