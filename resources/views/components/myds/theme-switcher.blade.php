{{--
    MYDS Theme Switcher Blade Component
    - Accessible, MYDS-compliant theme toggle (light/dark/system)
    - Uses translation keys and persists preference in localStorage
--}}

@php
    $currentTheme = session('theme', 'system');
@endphp

<div class="hidden md:block">
    <label for="theme-select" class="sr-only">{{ __('messages.theme.select') }}</label>
    <select
        id="theme-select"
        name="theme"
        class="focus:ring-primary-300 focus-visible:ring-primary-400 rounded bg-white px-2 py-1 text-sm font-medium text-primary-600 border border-otl-divider transition focus:ring-2 focus:outline-none focus-visible:ring-4"
        aria-label="{{ __('messages.theme.switch') }}"
        onchange="window.setTheme && window.setTheme(this.value)"
    >
        <option value="light" @if($currentTheme==='light') selected @endif>{{ __('messages.theme.light') }}</option>
        <option value="dark" @if($currentTheme==='dark') selected @endif>{{ __('messages.theme.dark') }}</option>
        <option value="system" @if($currentTheme==='system') selected @endif>{{ __('messages.theme.system') }}</option>
    </select>
</div>

<script>
window.setTheme = function(theme) {
    document.documentElement.setAttribute('data-theme', theme === 'system' ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') : theme);
    localStorage.setItem('theme', theme);
};
(function() {
    var theme = localStorage.getItem('theme') || 'system';
    window.setTheme(theme);
})();
</script>
