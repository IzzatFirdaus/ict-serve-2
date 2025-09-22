<x-layouts.admin>
    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.loan_application.id') }}">
            {{ $loanApplication->id }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.loan_application.user') }}">
            {{ $loanApplication->user->name }}
        </x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.loan_application.status') }}">
            {{ $loanApplication->status }}
        </x-myds.summary-list.item>
    </x-myds.summary-list>
</x-layouts.admin>
