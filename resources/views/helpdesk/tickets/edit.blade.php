<x-layouts.app>
    {{-- Edit helpdesk ticket --}}
    <h1 class="myds-heading">{{ __('messages.helpdesk.tickets.edit_title') }}</h1>

    <form method="POST" action="{{ route('helpdesk.tickets.update', $ticket) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-myds.panel>
            <label for="subject">{{ __('messages.helpdesk.tickets.subject') }}</label>
            <input id="subject" name="subject" class="myds-input" value="{{ old('subject', $ticket->subject) }}" required />

            <label for="description">{{ __('messages.helpdesk.tickets.description') }}</label>
            <textarea id="description" name="description" class="myds-textarea" required>{{ old('description', $ticket->description) }}</textarea>
        </x-myds.panel>

        <x-myds.button type="submit">{{ __('messages.actions.update') }}</x-myds.button>
        <x-myds.button as="a" href="{{ route('helpdesk.tickets.show', $ticket) }}" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
    </form>
</x-layouts.app>
