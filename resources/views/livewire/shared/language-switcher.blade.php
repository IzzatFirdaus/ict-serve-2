@props(['asButton' => false])

<div class="myds-language-switcher" role="group" aria-label="{{ __('messages.aria.language_dropdown') }}">
    @if($asButton)
        <button type="button" class="myds-button" aria-haspopup="listbox" aria-expanded="false" id="lang-toggle">
            {{ __('messages.language.' . ($lang ?? 'ms')) }}
        </button>
        <ul role="listbox" aria-labelledby="lang-toggle" class="myds-popover" style="display:none;" id="lang-options">
            <li role="option"><button type="button" wire:click="switchLanguage('ms')">{{ __('messages.language.ms') }}</button></li>
            <li role="option"><button type="button" wire:click="switchLanguage('en')">{{ __('messages.language.en') }}</button></li>
        </ul>
    @else
        <label for="lang-select" class="sr-only">{{ __('messages.language.select') }}</label>
        <select id="lang-select" wire:change="switchLanguage($event.target.value)" wire:model="lang" class="myds-select" aria-label="{{ __('messages.aria.language_dropdown') }}">
            <option value="ms">{{ __('messages.language.ms') }}</option>
            <option value="en">{{ __('messages.language.en') }}</option>
        </select>
    @endif
</div>
