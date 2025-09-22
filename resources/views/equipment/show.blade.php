<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.equipment.id') }}">
            {{ $equipment->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.equipment.name') }}">
            {{ $equipment->name }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.equipment.category') }}">
            {{ $equipment->category->name }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
