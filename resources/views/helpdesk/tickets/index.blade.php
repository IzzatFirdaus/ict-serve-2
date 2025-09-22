<x-layouts.app>
    {{-- Helpdesk Ticket list --}}
    <h1 class="myds-heading">{{ __('messages.helpdesk.tickets.title') }}</h1>

    <div class="flex items-center justify-between mb-4">
        <x-myds.search-bar placeholder="{{ __('messages.helpdesk.tickets.search') }}" />
        <x-myds.button as="a" href="{{ route('helpdesk.tickets.create') }}">{{ __('messages.actions.create') }}</x-myds.button>
    </div>

    <x-myds.table aria-label="{{ __('messages.helpdesk.tickets.table_aria') }}">
        <x-slot:header>
            <tr>
                <th>{{ __('messages.helpdesk.tickets.id') }}</th>
                <th>{{ __('messages.helpdesk.tickets.subject') }}</th>
                <th>{{ __('messages.helpdesk.tickets.status') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>

        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->subject }}</td>
                <td><x-myds.pill>{{ __('messages.helpdesk.status.' . $ticket->status) }}</x-myds.pill></td>
                <td>
                    <a href="{{ route('helpdesk.tickets.show', $ticket) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>

    <div class="mt-4">{{ $tickets->links('components.myds.pagination') }}</div>
</x-layouts.app>
