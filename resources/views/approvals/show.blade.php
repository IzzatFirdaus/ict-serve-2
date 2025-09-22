<x-layouts.admin>
    {{-- Approval details and decision form --}}
    <h1 class="myds-heading">{{ __('messages.approvals.show_title') }}</h1>

    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.approvals.id') }}">{{ $approval->id }}</x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.approvals.requestor') }}">{{ $approval->user->name }}</x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.approvals.type') }}">{{ __("messages.approvals.types.{$approval->type}") }}</x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.approvals.status') }}">{{ __("messages.approvals.status.{$approval->status}") }}</x-myds.summary-list.item>
    </x-myds.summary-list>

    {{-- Decision modal trigger --}}
    <x-myds.button data-myds-toggle="modal" data-target="#decision-modal">{{ __('messages.actions.decide') }}</x-myds.button>

    @include('approvals.decision-modal')
</x-layouts.admin>
