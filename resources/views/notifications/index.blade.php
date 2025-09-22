<x-layouts.app>
    {{-- Notifications inbox --}}
    <h1 class="myds-heading">{{ __('messages.notifications.title') }}</h1>

    <x-myds.table aria-label="{{ __('messages.notifications.table_aria') }}">
        <x-slot:header>
            <tr>
                <th>{{ __('messages.notifications.id') }}</th>
                <th>{{ __('messages.notifications.subject') }}</th>
                <th>{{ __('messages.notifications.date') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>

        @foreach ($notifications as $note)
            <tr>
                <td>{{ $note->id }}</td>
                <td>{{ $note->data['subject'] ?? __('messages.notifications.no_subject') }}</td>
                <td>{{ $note->created_at->format('Y-m-d H:i') }}</td>
                <td><a href="{{ route('notifications.show', $note) }}">{{ __('messages.actions.view') }}</a></td>
            </tr>
        @endforeach
    </x-myds.table>

    <div class="mt-4">{{ $notifications->links('components.myds.pagination') }}</div>
</x-layouts.app>
