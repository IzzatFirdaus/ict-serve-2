<x-layouts.admin>
    {{-- Admin Settings index --}}
    <h1 class="myds-heading">{{ __('messages.admin.settings.title') }}</h1>

    <x-myds.panel>
        {{-- Settings summary and quick actions --}}
        <x-slot:header>{{ __('messages.admin.settings.overview') }}</x-slot:header>

        <div class="grid grid-cols-12 gap-4">
            {{-- ...existing code... --}}
        </div>
    </x-myds.panel>

    <x-myds.button as="a" href="{{ route('admin.settings.edit') }}">{{ __('messages.actions.edit') }}</x-myds.button>
</x-layouts.admin>
