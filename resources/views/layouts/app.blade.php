<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme', 'system') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.app_title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <a href="#main-content" class="myds-skip-link" tabindex="0">{{ __('messages.aria.skip_to_main') }}</a>

    <header>
        <nav class="flex flex-1 items-center justify-end gap-6" aria-label="{{ __('messages.aria.main_navigation') }}">
            <livewire:language-switcher />
            <livewire:theme-switcher />
        </nav>
    </header>

    <main id="main-content">
        {{ $slot }}
    </main>

    <footer>
        <p>{{ __('messages.footer_text') }}</p>
    </footer>

    @livewireScripts
</body>
</html>
