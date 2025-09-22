<div>
    <select wire:model="theme" wire:change="switchTheme($event.target.value)" aria-label="{{ __('messages.aria.theme_switcher') }}">
        <option value="light">{{ __('messages.theme.light') }}</option>
        <option value="dark">{{ __('messages.theme.dark') }}</option>
        <option value="system">{{ __('messages.theme.system') }}</option>
    </select>
</div>
