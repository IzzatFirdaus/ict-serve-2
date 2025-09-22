<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.user.id') }}">
            {{ $user->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.user.name') }}">
            {{ $user->name }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.user.email') }}">
            {{ $user->email }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
