@props(['asButton' => false])

<div class="myds-theme-switcher" role="group" aria-label="{{ __('messages.aria.theme_dropdown') }}">
    @if($asButton)
        <button type="button" class="myds-button" aria-haspopup="listbox" aria-expanded="false" id="theme-toggle">
            {{ __('messages.theme.' . ($theme ?? 'system')) }}
        </button>
        <ul role="listbox" aria-labelledby="theme-toggle" class="myds-popover" style="display:none;" id="theme-options">
            <li role="option"><button type="button" wire:click="switchTheme('system')">{{ __('messages.theme.system') }}</button></li>
            <li role="option"><button type="button" wire:click="switchTheme('light')">{{ __('messages.theme.light') }}</button></li>
            <li role="option"><button type="button" wire:click="switchTheme('dark')">{{ __('messages.theme.dark') }}</button></li>
        </ul>
    @else
        <label for="theme-select" class="sr-only">{{ __('messages.theme.select') }}</label>
        <select id="theme-select" wire:change="switchTheme($event.target.value)" wire:model="theme" class="myds-select" aria-label="{{ __('messages.aria.theme_select') }}">
            <option value="system">{{ __('messages.theme.system') }}</option>
            <option value="light">{{ __('messages.theme.light') }}</option>
            <option value="dark">{{ __('messages.theme.dark') }}</option>
        </select>
    @endif
</div>
