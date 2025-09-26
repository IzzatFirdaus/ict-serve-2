{{-- Language Switcher Component for Filament Admin --}}
{{-- Design system-compliant bilingual switcher with accessibility support --}}

<div class="fi-dropdown-panel" x-data="{ open: false }">
    <button
        type="button"
        @click="open = !open"
        class="fi-dropdown-trigger flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus:bg-gray-800"
        aria-expanded="false"
        aria-haspopup="true"
        :aria-expanded="open"
        aria-label="{{ __('filament.language.switch_language') }}"
    >
        {{-- Language Icon --}}
        <x-icon name="bs.translate" class="h-4 w-4" aria-hidden="true" />

        {{-- Current Language --}}
        <span class="sr-only sm:not-sr-only">
            {{ $available[$lang] ?? ($lang ?? __('Unknown')) }}
        </span>
        {{-- Dropdown Arrow --}}
        <x-icon
            name="bs.chevron-down"
            class="h-3 w-3 transition-transform"
            ::class="{ 'rotate-180': open }"
            aria-hidden="true"
        />
    </button>

    {{-- Dropdown Menu --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        @click.away="open = false"
        @keydown.escape="open = false"
        class="fi-dropdown-list absolute z-10 mt-2 w-40 origin-top-right rounded-lg bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700"
        role="menu"
        aria-orientation="vertical"
        style="display: none"
    >
        @foreach ($available as $code => $name)
            <button
                type="button"
                wire:click="switchLanguage('{{ $code }}')"
                @click="open = false"
                class="group flex w-full items-center gap-x-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:bg-gray-700 {{ $lang === $code ? 'bg-gray-50 font-medium dark:bg-gray-700' : '' }}"
                role="menuitem"
                aria-label="{{ __('filament.language.switch_to', ['language' => $name]) }}"
            >
                {{-- Selected Indicator --}}
                @if ($lang === $code)
                    <x-icon
                        name="bs.check"
                        class="h-4 w-4 text-primary-600 dark:text-primary-400"
                        aria-hidden="true"
                    />
                @else
                    <span class="w-4"></span>
                @endif

                {{-- Language Name --}}
                <span>{{ $name }}</span>

                {{-- Language Code --}}
                <span class="ml-auto text-xs text-gray-500 dark:text-gray-400">
                    {{ strtoupper($code) }}
                </span>
            </button>
        @endforeach
    </div>
</div>

@props(['asButton' => false])

<div
    class="ds-language-switcher"
    role="group"
    aria-label="{{ __('messages.aria.language_dropdown') }}"
>
    @if ($asButton)
        <button
            type="button"
            class="ds-button"
            aria-haspopup="listbox"
            aria-expanded="false"
            id="lang-toggle"
        >
            {{ __('messages.language.' . ($lang ?? 'ms')) }}
        </button>
        <ul
            role="listbox"
            aria-labelledby="lang-toggle"
            class="ds-popover"
            style="display: none"
            id="lang-options"
        >
            <li role="option">
                <button type="button" wire:click="switchLanguage('ms')">
                    {{ __('messages.language.ms') }}
                </button>
            </li>
            <li role="option">
                <button type="button" wire:click="switchLanguage('en')">
                    {{ __('messages.language.en') }}
                </button>
            </li>
        </ul>
    @else
        <label for="lang-select" class="sr-only">{{ __('messages.language.select') }}</label>
        <select
            id="lang-select"
            wire:change="switchLanguage($event.target.value)"
            wire:model="lang"
            class="ds-select"
            aria-label="{{ __('messages.aria.language_dropdown') }}"
        >
            <option value="ms">{{ __('messages.language.ms') }}</option>
            <option value="en">{{ __('messages.language.en') }}</option>
        </select>
    @endif
</div>
