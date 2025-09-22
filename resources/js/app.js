
import './bootstrap';

import { showSwal } from './swal';

// Expose showSwal globally for browser and Playwright E2E
window.showSwal = showSwal;

// Set copyright year in footer
document.addEventListener('DOMContentLoaded', function () {
    var yearEl = document.getElementById('year');
    if (yearEl) {
        yearEl.textContent = new Date().getFullYear();
    }
});
