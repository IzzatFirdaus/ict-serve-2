<x-layouts.app>
    {{-- Helpdesk ticket details with comments thread --}}
    <h1 class="myds-heading">{{ __('messages.helpdesk.tickets.show_title') }}</h1>

    <x-myds.summary-list>
        <x-myds.summary-list.item label="{{ __('messages.helpdesk.tickets.id') }}">{{ $ticket->id }}</x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.helpdesk.tickets.subject') }}">{{ $ticket->subject }}</x-myds.summary-list.item>
        <x-myds.summary-list.item label="{{ __('messages.helpdesk.tickets.status') }}">{{ __('messages.helpdesk.status.' . $ticket->status) }}</x-myds.summary-list.item>
    </x-myds.summary-list>

    <div class="mt-6">
        @include('helpdesk.comments._list', ['comments' => $ticket->comments])
        @include('helpdesk.comments._form', ['ticket' => $ticket])
    </div>

    <div class="mt-6">
        <x-myds.button data-myds-toggle="modal" data-target="#assign-modal">{{ __('messages.actions.assign') }}</x-myds.button>
        <x-myds.button data-myds-toggle="modal" data-target="#close-modal" variant="danger">{{ __('messages.actions.close') }}</x-myds.button>
    </div>

    @include('helpdesk.tickets.assign-modal')
    @include('helpdesk.tickets.close-modal')
    @include('helpdesk.tickets.reopen-modal')
</x-layouts.app>
