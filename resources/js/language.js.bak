// Minimal language switcher shim. Actual switching should call server route.
window.changeLanguage = function (locale) {
    try {
        // naive client-side set; recommend POST to server to persist
        try { localStorage.setItem('locale', locale); } catch (e) { }
        location.search = '?lang=' + encodeURIComponent(locale);
    } catch (e) { console.error(e); }
};
