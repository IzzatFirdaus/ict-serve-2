// Listen for Livewire browser events and show simple toasts using Filament notify or console fallback
window.addEventListener('notify', function (e) {
    var data = e.detail || e;
    if (window.Filament && Filament.notifications && Filament.notifications.show) {
        Filament.notifications.show({
            type: data.type || 'info',
            title: data.title || '',
            message: data.message || data.msg || '',
        });
        return;
    }

    // Fallback: simple DOM toast
    console.log('[notify]', data);
});

// When language changes, optionally reload non-Livewire parts if necessary
window.addEventListener('language-changed', function (e) {
    // If necessary, reload the page to pull translated content not managed by Livewire
    // location.reload(); // commented out to avoid forced reload
    console.log('language changed to', e.detail.lang);
});

// When theme changes, apply via theme helper if available
window.addEventListener('theme-changed', function (e) {
    var theme = (e && e.detail && e.detail.theme) ? e.detail.theme : e;
    if (window.applyTheme && typeof window.applyTheme === 'function') {
        window.applyTheme(theme === 'system' ? 'system' : theme);
        return;
    }

    // Fallback: directly set data-theme on <html>
    var html = document.documentElement;
    if (!theme || theme === 'system') {
        var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        html.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
        try { localStorage.removeItem('theme'); } catch (err) { }
    } else {
        html.setAttribute('data-theme', theme);
        try { localStorage.setItem('theme', theme); } catch (err) { }
    }
});
