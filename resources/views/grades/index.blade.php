<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.grade.id') }}</th>
                <th>{{ __('messages.grade.name') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($grades as $grade)
            <tr>
                <td>{{ $grade->id }}</td>
                <td>{{ $grade->name }}</td>
                <td>
                    <a href="{{ route('grades.edit', $grade) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('grades.show', $grade) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
