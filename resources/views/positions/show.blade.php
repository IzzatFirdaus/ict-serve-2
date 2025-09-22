<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.position.id') }}">
            {{ $position->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.position.name') }}">
            {{ $position->name }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
