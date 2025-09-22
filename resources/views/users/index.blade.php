<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.user.id') }}</th>
                <th>{{ __('messages.user.name') }}</th>
                <th>{{ __('messages.user.email') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('users.show', $user) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
