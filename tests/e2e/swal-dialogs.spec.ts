import { test, expect } from '@playwright/test';

test.describe('MYDS SweetAlert2 Dialogs', () => {
    test('should show info dialog and be accessible', async ({ page }) => {
        await page.goto('/');
        await page.evaluate(() => {
            window.showSwal &&
                window.showSwal({
                    title: 'Maklumat',
                    text: 'Ini adalah dialog maklumat.',
                    icon: 'info',
                    variant: 'info',
                });
        });
        await expect(page.locator('.swal2-popup')).toBeVisible();
        await expect(page.locator('.swal2-title')).toHaveText('Maklumat');
        await expect(page.locator('.swal2-html-container')).toHaveText(
            'Ini adalah dialog maklumat.'
        );
        await expect(page.locator('.swal2-popup[role="dialog"]')).toBeVisible();
        await expect(page.locator('.swal2-confirm')).toBeFocused();
        await page.locator('.swal2-confirm').click();
        await expect(page.locator('.swal2-popup')).not.toBeVisible();
    });

    test('should show destructive confirm dialog and handle confirm/cancel', async ({ page }) => {
        await page.goto('/');
        await page.evaluate(() => {
            window.showSwal &&
                window.showSwal({
                    title: 'Padam permohonan?',
                    text: 'Tindakan ini tidak boleh diundur.',
                    icon: 'warning',
                    variant: 'destructive',
                    showCancelButton: true,
                    confirmButtonText: 'Padam',
                    cancelButtonText: 'Batal',
                });
        });
        await expect(page.locator('.swal2-popup')).toBeVisible();
        await expect(page.locator('.swal2-title')).toHaveText('Padam permohonan?');
        await expect(page.locator('.swal2-confirm')).toHaveText('Padam');
        await expect(page.locator('.swal2-cancel')).toHaveText('Batal');
        await page.locator('.swal2-confirm').click();
        await expect(page.locator('.swal2-popup')).not.toBeVisible();
        await page.evaluate(() => {
            window.showSwal &&
                window.showSwal({
                    title: 'Padam permohonan?',
                    text: 'Tindakan ini tidak boleh diundur.',
                    icon: 'warning',
                    variant: 'destructive',
                    showCancelButton: true,
                    confirmButtonText: 'Padam',
                    cancelButtonText: 'Batal',
                });
        });
        await expect(page.locator('.swal2-popup')).toBeVisible();
        await page.locator('.swal2-cancel').click();
        await expect(page.locator('.swal2-popup')).not.toBeVisible();
    });
});
