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

// Add theme persistence logic
function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}

// Load persisted theme on page load
const savedTheme = localStorage.getItem('theme') || 'light';
applyTheme(savedTheme);

// Export theme functions for use in Blade components
export { applyTheme };
