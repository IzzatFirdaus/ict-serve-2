import { test, expect } from '@playwright/test';

const ADMIN_EMAIL = 'filament_admin@example.test';
const ADMIN_PASSWORD = 'Password123!';
const BASE_URL = process.env.PLAYWRIGHT_BASE_URL || 'http://localhost';

// Utility: login as admin
async function login(page) {
  await page.goto(`${BASE_URL}/admin/login`);
  await page.fill('input[name="email"]', ADMIN_EMAIL);
  await page.fill('input[name="password"]', ADMIN_PASSWORD);
  await page.click('button[type="submit"]');
  await expect(page).toHaveURL(/\/admin(\/dashboard)?/);
}

test.describe('Department Resource CRUD', () => {
  test('can list, create, view, edit, and delete a Department', async ({ page }) => {
    await login(page);
    // Go to Department resource list
    await page.goto(`${BASE_URL}/admin/departments`);
    await expect(page.getByRole('heading', { name: /Department/i })).toBeVisible();

    // Create
    await page.getByRole('button', { name: /Create/ }).click();
    await page.fill('input[name="name"]', 'Playwright Test Dept');
    await page.click('button[type="submit"]');
    await expect(page.getByText('created successfully', { exact: false })).toBeVisible();

    // List
    await expect(page.getByText('Playwright Test Dept')).toBeVisible();

    // View
    await page.getByRole('row', { name: /Playwright Test Dept/ }).getByRole('link', { name: /View/ }).click();
    await expect(page.getByText('Playwright Test Dept')).toBeVisible();

    // Edit
    await page.getByRole('button', { name: /Edit/ }).click();
    await page.fill('input[name="name"]', 'Playwright Test Dept Updated');
    await page.click('button[type="submit"]');
    await expect(page.getByText('updated successfully', { exact: false })).toBeVisible();
    await expect(page.getByText('Playwright Test Dept Updated')).toBeVisible();

    // Delete
    await page.goto(`${BASE_URL}/admin/departments`);
    await page.getByRole('row', { name: /Playwright Test Dept Updated/ }).getByRole('button', { name: /Delete/ }).click();
    await page.getByRole('button', { name: /Confirm/ }).click();
    await expect(page.getByText('deleted successfully', { exact: false })).toBeVisible();
    await expect(page.getByText('Playwright Test Dept Updated')).not.toBeVisible();
  });
});
