import './theme';
import './language';

import { showSwal } from './swal';

window.showSwal = showSwal;

document.addEventListener('DOMContentLoaded', function () {
    var yearEl = document.getElementById('year');
    if (yearEl) {
        yearEl.textContent = new Date().getFullYear();
    }
});

