<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.equipment_category.id') }}</th>
                <th>{{ __('messages.equipment_category.name') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('equipment-categories.edit', $category) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('equipment-categories.show', $category) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
