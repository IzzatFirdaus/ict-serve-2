<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.equipment_category.id') }}">
            {{ $category->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.equipment_category.name') }}">
            {{ $category->name }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
