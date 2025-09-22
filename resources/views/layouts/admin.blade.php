<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme', 'system') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.admin_title') }}</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    @livewireStyles
</head>
<body>
    <x-myds.skiplink />

    <header>
        <nav>
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
