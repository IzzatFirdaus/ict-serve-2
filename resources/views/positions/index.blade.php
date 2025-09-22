<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.position.id') }}</th>
                <th>{{ __('messages.position.name') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($positions as $position)
            <tr>
                <td>{{ $position->id }}</td>
                <td>{{ $position->name }}</td>
                <td>
                    <a href="{{ route('positions.edit', $position) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('positions.show', $position) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
