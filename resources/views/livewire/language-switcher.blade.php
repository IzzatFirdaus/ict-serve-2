<div>
    <select wire:model="language" wire:change="switchLanguage($event.target.value)" aria-label="{{ __('messages.aria.language_switcher') }}">
        <option value="ms">{{ __('messages.language.ms') }}</option>
        <option value="en">{{ __('messages.language.en') }}</option>
    </select>
</div>
