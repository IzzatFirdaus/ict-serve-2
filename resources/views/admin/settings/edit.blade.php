<x-layouts.admin>
    {{-- Admin Settings edit form --}}
    <h1 class="myds-heading">{{ __('messages.admin.settings.edit_title') }}</h1>

    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')

        <x-myds.panel>
            <x-slot:header>{{ __('messages.admin.settings.form_header') }}</x-slot:header>

            {{-- Example setting field --}}
            <label for="app_name" class="block">{{ __('messages.admin.settings.app_name') }}</label>
            <input id="app_name" name="app_name" value="{{ old('app_name', config('app.name')) }}" class="myds-input" aria-describedby="app-name-help" />
            <p id="app-name-help" class="myds-hint">{{ __('messages.admin.settings.app_name_help') }}</p>

            {{-- ...existing code... --}}
        </x-myds.panel>

        <x-myds.button type="submit">{{ __('messages.actions.save') }}</x-myds.button>
        <x-myds.button as="a" href="{{ route('admin.dashboard') }}" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
    </form>
</x-layouts.admin>
