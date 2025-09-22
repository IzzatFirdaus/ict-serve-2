<x-layouts.app>
    {{-- Simple language switch page (fallback) --}}
    <h1 class="myds-heading">{{ __('messages.language.switch_page_title') }}</h1>

    <p>{{ __('messages.language.switch_instructions') }}</p>

    <x-myds.language-switcher />
</x-layouts.app>
