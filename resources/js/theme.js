// Minimal theme toggle shim for MYDS integration
window.applyTheme = function (theme) {
    try {
        document.documentElement.setAttribute('data-theme', theme);
        try { localStorage.setItem('theme', theme); } catch (e) { }
    } catch (e) { console.error(e); }
};

// Initialize from localStorage if present
document.addEventListener('DOMContentLoaded', function () {
    try {
        var t = localStorage.getItem('theme');
        if (t) { window.applyTheme(t); }
    } catch (e) { }
});
// Theme helper: apply saved theme or system preference to <html data-theme>
(function () {
    function applyTheme(theme) {
        var html = document.documentElement;
        try {
            if (!theme || theme === 'system') {
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                html.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
                try { localStorage.removeItem('theme'); } catch (err) { }
            } else {
                html.setAttribute('data-theme', theme);
                try { localStorage.setItem('theme', theme); } catch (err) { }
            }
        } catch (err) {
            // Defensive: if anything fails, don't throw in the boot path
            console.error('applyTheme error', err);
        }
    }

    var html = document.documentElement;
    var hasServerTheme = html.hasAttribute('data-theme');

    // Only override the server-injected theme if the user has a saved preference.
    var saved = null;
    try { saved = localStorage.getItem('theme'); } catch (err) { saved = null; }

    if (saved) {
        applyTheme(saved);
    } else if (!hasServerTheme) {
        // If the server didn't set a theme, fall back to system preference.
        applyTheme('system');
    }

    // Listen for events from Livewire (single listener)
    window.addEventListener('theme-changed', function (e) {
        var theme = e && e.detail && e.detail.theme ? e.detail.theme : e;
        applyTheme(theme);
    });

    // Expose for console/testing
    window.applyTheme = applyTheme;
})();
