{{-- Filament Topbar Theme Switcher (MYDS-compliant) --}}
<div class="theme-switcher" role="group" aria-label="{{ __('messages.aria.theme_switcher') }}">
    <select id="theme-select" onchange="applyTheme(this.value)" class="form-select" aria-label="{{ __('messages.aria.theme_select') }}">
        <option value="light" {{ $currentTheme === 'light' ? 'selected' : '' }}>{{ __('Light') }}</option>
        <option value="dark" {{ $currentTheme === 'dark' ? 'selected' : '' }}>{{ __('Dark') }}</option>
        <option value="system" {{ $currentTheme === 'system' ? 'selected' : '' }}>{{ __('System') }}</option>
    </select>
</div>
