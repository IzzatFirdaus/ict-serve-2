<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.grade.id') }}">
            {{ $grade->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.grade.name') }}">
            {{ $grade->name }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
