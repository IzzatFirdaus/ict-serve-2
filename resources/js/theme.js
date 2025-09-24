/**
 * ICTServe Theme Manager (MYDS Compliant)
 *
 * This script handles theme initialization and switching.
 * It should be included in the <head> of the document to prevent FOUC (Flash of Unstyled Content).
 */
(() => {
    // List of valid themes for validation.
    const SUPPORTED_THEMES = ['light', 'dark', 'system'];

    /**
     * Applies the selected theme to the <html> element and persists the choice.
     * @param {string} theme The theme to apply ('light', 'dark', or 'system').
     */
    const applyTheme = (theme) => {
        if (!SUPPORTED_THEMES.includes(theme)) {
            console.warn(`Unsupported theme "${theme}". Defaulting to 'system'.`);
            theme = 'system';
        }

        try {
            if (theme === 'system') {
                // If 'system', apply the OS preference and remove the local storage override.
                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.setAttribute('data-theme', systemPrefersDark ? 'dark' : 'light');
                localStorage.removeItem('theme');
            } else {
                // Otherwise, apply the specific theme and save it to local storage.
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
            }
        } catch (e) {
            console.error('Failed to apply theme:', e);
        }
    };

    // --- INITIALIZATION ---
    // On script load, immediately apply the stored theme or the system default.
    try {
        const savedTheme = localStorage.getItem('theme');
        applyTheme(savedTheme || 'system');
    } catch (e) {
        // If localStorage fails, default to system.
        applyTheme('system');
    }

    // --- EVENT LISTENERS ---
    // 1. Listen for theme changes dispatched from the Livewire component.
    window.addEventListener('theme-changed', (event) => {
        const newTheme = event.detail?.theme;
        if (newTheme) {
            applyTheme(newTheme);
        }
    });

    // 2. Listen for changes in the user's OS color scheme preference.
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        // Only re-apply the theme if the user is currently in 'system' mode.
        const currentTheme = localStorage.getItem('theme');
        if (!currentTheme || currentTheme === 'system') {
            applyTheme('system');
        }
    });
})();
