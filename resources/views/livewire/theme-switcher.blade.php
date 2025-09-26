{{-- Theme Switcher Component for Filament Admin --}}
{{-- Design system-compliant theme switcher with accessibility support --}}

<div class="fi-dropdown-panel" x-data="{ open: false }">
    <button
        type="button"
        @click="open = !open"
        class="fi-dropdown-trigger flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500"
        aria-expanded="false"
        aria-haspopup="true"
        :aria-expanded="open"
        aria-label="{{ __('filament.theme.switch_theme') }}"
    >
        {{-- Theme Icon --}}

        @switch($currentTheme)
            @case('light')
                <x-icon name="bs.sun" class="h-4 w-4" aria-hidden="true" />

                @break
            @case('dark')
                <x-icon name="bs.moon" class="h-4 w-4" aria-hidden="true" />

                @break
            @default
                <x-icon name="bs.circle-half" class="h-4 w-4" aria-hidden="true" />
        @endswitch

        {{-- Current Theme --}}
        <span class="sr-only sm:not-sr-only">
            {{ __('filament.theme.' . $currentTheme) }}
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
        class="fi-dropdown-list absolute z-10 mt-2 w-40 origin-top-right rounded-lg bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        style="display: none"
    >
        @foreach ($availableThemes as $theme => $name)
            <button
                type="button"
                wire:click="switchTheme('{{ $theme }}')"
                @click="open = false"
                class="group flex w-full items-center gap-x-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none {{ $currentTheme === $theme ? 'bg-gray-50 font-medium' : '' }}"
                role="menuitem"
                aria-label="{{ __('filament.theme.switch_to', ['theme' => __('filament.theme.' . $theme)]) }}"
            >
                {{-- Theme Icon --}}

                @switch($theme)
                    @case('light')
                        <x-icon
                            name="bs.sun"
                            class="h-4 w-4 {{ $currentTheme === $theme ? 'text-primary-600' : 'text-gray-400' }}"
                            aria-hidden="true"
                        />

                        @break
                    @case('dark')
                        <x-icon
                            name="bs.moon"
                            class="h-4 w-4 {{ $currentTheme === $theme ? 'text-primary-600' : 'text-gray-400' }}"
                            aria-hidden="true"
                        />

                        @break
                    @default
                        <x-icon
                            name="bs.circle-half"
                            class="h-4 w-4 {{ $currentTheme === $theme ? 'text-primary-600' : 'text-gray-400' }}"
                            aria-hidden="true"
                        />
                @endswitch

                {{-- Theme Name --}}
                <span>{{ __('filament.theme.' . $theme) }}</span>

                {{-- Selected Indicator --}}
                @if ($currentTheme === $theme)
                    <x-icon
                        name="bs.check"
                        class="ml-auto h-4 w-4 text-primary-600"
                        aria-hidden="true"
                    />
                @endif
            </button>
        @endforeach
    </div>
</div>
