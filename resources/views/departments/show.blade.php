<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.department.id') }}">
            {{ $department->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.department.name') }}">
            {{ $department->name }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
