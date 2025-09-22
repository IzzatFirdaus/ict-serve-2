/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
        './vendor/filament/**/*.blade.php',
        './vendor/livewire/livewire/src/**/*.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
