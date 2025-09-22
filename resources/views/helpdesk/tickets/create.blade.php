<x-layouts.app>
    {{-- Create new helpdesk ticket --}}
    <h1 class="myds-heading">{{ __('messages.helpdesk.tickets.create_title') }}</h1>

    <form method="POST" action="{{ route('helpdesk.tickets.store') }}" enctype="multipart/form-data">
        @csrf

        <x-myds.panel>
            <label for="subject">{{ __('messages.helpdesk.tickets.subject') }}</label>
            <input id="subject" name="subject" class="myds-input" value="{{ old('subject') }}" required aria-required="true" />

            <label for="description">{{ __('messages.helpdesk.tickets.description') }}</label>
            <textarea id="description" name="description" class="myds-textarea" required>{{ old('description') }}</textarea>

            <label for="attachment">{{ __('messages.helpdesk.tickets.attachment') }}</label>
            <input id="attachment" name="attachment" type="file" class="myds-input" />
        </x-myds.panel>

        <x-myds.button type="submit">{{ __('messages.actions.submit') }}</x-myds.button>
        <x-myds.button as="a" href="{{ route('helpdesk.tickets.index') }}" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
    </form>
</x-layouts.app>
