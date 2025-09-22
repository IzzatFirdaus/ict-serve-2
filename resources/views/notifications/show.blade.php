<x-layouts.app>
    {{-- Notification details --}}
    <h1 class="myds-heading">{{ __('messages.notifications.show_title') }}</h1>

    <x-myds.panel>
        <x-slot:header>{{ $notification->data['subject'] ?? __('messages.notifications.no_subject') }}</x-slot:header>

        <div class="prose">
            {!! $notification->data['body'] ?? __('messages.notifications.no_body') !!}
        </div>
    </x-myds.panel>

    <x-myds.button as="a" href="{{ route('notifications.index') }}">{{ __('messages.actions.back') }}</x-myds.button>
</x-layouts.app>
