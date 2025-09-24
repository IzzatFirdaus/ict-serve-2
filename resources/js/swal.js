// resources/js/swal.js

import Swal from 'sweetalert2';

/**
 * MYDS-compliant SweetAlert2 Helper (v2)
 * --------------------------------------
 * This wrapper uses CSS classes for styling to ensure 100% compliance with
 * the project's design tokens (MYDS/Tailwind). It moves all color logic
 * out of JavaScript and into your stylesheets.
 *
 * @param {Object} opts - SweetAlert2 options.
 * @param {'success'|'error'|'warning'|'info'|'confirm'|'destructive'} [opts.variant='info'] - Determines the dialog's icon and button styles.
 * @returns {Promise<SweetAlertResult>} A promise that resolves with the SweetAlert2 result.
 */
export function showSwal(opts = {}) {
    const {
        variant = 'info',
        confirmButtonText = 'OK',
        cancelButtonText = 'Batal',
        ...rest
    } = opts;

    // --- Dynamic Class Mapping based on Variant ---
    // This logic determines the style of the confirm button.
    let confirmButtonClass = 'myds-btn myds-btn-primary'; // Default
    if (variant === 'destructive') {
        confirmButtonClass = 'myds-btn myds-btn-danger';
    } else if (variant === 'success') {
        confirmButtonClass = 'myds-btn myds-btn-success';
    }

    return Swal.fire({
        // Use custom classes for styling, controlled by your app's CSS.
        customClass: {
            popup: 'rounded-xl shadow-lg',
            confirmButton: confirmButtonClass,
            cancelButton: 'myds-btn myds-btn-secondary',
            // You can also style the title, text, etc.
            // title: 'text-2xl font-bold text-gray-800',
            // htmlContainer: 'text-gray-600',
        },
        buttonsStyling: false, // CRITICAL: This allows your custom classes to take effect.

        // Sensible defaults for accessibility and UX.
        focusConfirm: true,
        allowOutsideClick: false,
        allowEscapeKey: true,

        // Pass through the user-defined options.
        confirmButtonText,
        cancelButtonText,
        ...rest,
    });
}
