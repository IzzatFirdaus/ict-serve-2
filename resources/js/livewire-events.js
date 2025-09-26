/**
 * This file handles global browser events dispatched from Livewire components.
 * It's primarily used for showing toast notifications.
 */

/**
 * Listen for the 'notify' event from the backend to show a toast notification.
 * Integrates with Filament's notification system if available.
 */
window.addEventListener('notify', (event) => {
    const data = event.detail[0] || event.detail; // Handle different event structures

    if (!data.message) {
        return;
    }

    // Use Filament's native notification system if it's available on the page
    if (window.Filament && typeof Filament.notifications?.show === 'function') {
        Filament.notifications.show({
            status: data.status || 'info',
            title: data.title,
            body: data.message,
        });
    } else {
        // Fallback for non-Filament pages (e.g., a simple console log)
        console.log(`[Notification] Status: ${data.status || 'info'}, Message: ${data.message}`);
        // You could replace this with a custom toast library for non-admin pages.
    }
});
