<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.department.id') }}</th>
                <th>{{ __('messages.department.name') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('departments.show', $department) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
