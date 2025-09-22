'use strict';
Object.defineProperty(exports, '__esModule', { value: true });
const test_1 = require('@playwright/test');
test_1.test.describe('MYDS SweetAlert2 Dialogs', () => {
    (0, test_1.test)('should show info dialog and be accessible', async ({ page }) => {
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
        await (0, test_1.expect)(page.locator('.swal2-popup')).toBeVisible();
        await (0, test_1.expect)(page.locator('.swal2-title')).toHaveText('Maklumat');
        await (0, test_1.expect)(page.locator('.swal2-html-container')).toHaveText(
            'Ini adalah dialog maklumat.'
        );
        await (0, test_1.expect)(page.locator('.swal2-popup[role="dialog"]')).toBeVisible();
        await (0, test_1.expect)(page.locator('.swal2-confirm')).toBeFocused();
        await page.locator('.swal2-confirm').click();
        await (0, test_1.expect)(page.locator('.swal2-popup')).not.toBeVisible();
    });
    (0, test_1.test)(
        'should show destructive confirm dialog and handle confirm/cancel',
        async ({ page }) => {
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
            await (0, test_1.expect)(page.locator('.swal2-popup')).toBeVisible();
            await (0, test_1.expect)(page.locator('.swal2-title')).toHaveText('Padam permohonan?');
            await (0, test_1.expect)(page.locator('.swal2-confirm')).toHaveText('Padam');
            await (0, test_1.expect)(page.locator('.swal2-cancel')).toHaveText('Batal');
            await page.locator('.swal2-confirm').click();
            await (0, test_1.expect)(page.locator('.swal2-popup')).not.toBeVisible();
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
            await (0, test_1.expect)(page.locator('.swal2-popup')).toBeVisible();
            await page.locator('.swal2-cancel').click();
            await (0, test_1.expect)(page.locator('.swal2-popup')).not.toBeVisible();
        }
    );
});
