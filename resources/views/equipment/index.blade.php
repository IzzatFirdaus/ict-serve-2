<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.equipment.id') }}</th>
                <th>{{ __('messages.equipment.name') }}</th>
                <th>{{ __('messages.equipment.category') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($equipment as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    <a href="{{ route('equipment.edit', $item) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('equipment.show', $item) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
