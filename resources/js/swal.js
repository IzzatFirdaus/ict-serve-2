// resources/js/swal.js

import Swal from 'sweetalert2';

/**
 * MYDS-compliant SweetAlert2 Helper
 * ----------------------------------
 * This helper wraps SweetAlert2 dialogs with MYDS (Malaysia Government Design System) color tokens,
 * accessible button classes, and sensible defaults for use in all destructive, confirm, and alert flows.
 *
 * Usage:
 *   import { showSwal } from './swal';
 *
 *   // Simple info dialog
 *   showSwal({
 *     title: 'Maklumat',
 *     text: 'Ini adalah dialog maklumat.',
 *     icon: 'info',
 *     variant: 'info',
 *   });
 *
 *   // Destructive confirm dialog
 *   showSwal({
 *     title: 'Padam permohonan?',
 *     text: 'Tindakan ini tidak boleh diundur.',
 *     icon: 'warning',
 *     variant: 'destructive',
 *     showCancelButton: true,
 *     confirmButtonText: 'Padam',
 *     cancelButtonText: 'Batal',
 *   }).then(result => {
 *     if (result.isConfirmed) {
 *       // Do destructive action
 *     }
 *   });
 *
 * Accessibility:
 *   - Buttons use MYDS classes for color contrast and focus rings.
 *   - Dialogs are keyboard and screen reader accessible by default (SweetAlert2).
 *   - Use clear, descriptive titles and button text for a11y.
 *
 * @param {Object} opts - SweetAlert2 options (see https://sweetalert2.github.io/)
 * @param {('success'|'error'|'warning'|'info'|'question'|'confirm'|'destructive')} opts.variant - Dialog type for MYDS color mapping
 * @returns {Promise<SweetAlertResult>}
 */
export function showSwal(opts = {}) {
    // MYDS color tokens (adjust as needed for your theme)
    const mydsColors = {
        success: '#22c55e', // green-500
        error: '#ef4444',   // red-500
        warning: '#f59e42', // orange-400
        info: '#0ea5e9',    // blue-500
        question: '#6366f1',// indigo-500
        confirm: '#6366f1', // indigo-500
        destructive: '#ef4444',
    };
    const {
        variant = 'info',
        confirmButtonText = 'OK',
        cancelButtonText = 'Batal',
        showCancelButton = false,
        ...rest
    } = opts;
    return Swal.fire({
        customClass: {
            popup: 'rounded-xl shadow-card',
            confirmButton: 'myds-btn myds-btn-primary',
            cancelButton: 'myds-btn myds-btn-secondary',
        },
        buttonsStyling: false,
        focusConfirm: true,
        allowOutsideClick: false,
        allowEscapeKey: true,
        confirmButtonColor: mydsColors[variant] || mydsColors.info,
        cancelButtonColor: mydsColors.error,
        confirmButtonText,
        cancelButtonText,
        showCancelButton,
        ...rest,
    });
}
