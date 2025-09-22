<x-layouts.admin>
    <x-myds.table>
        <x-slot:header>
            <tr>
                <th>{{ __('messages.loan_application.id') }}</th>
                <th>{{ __('messages.loan_application.user') }}</th>
                <th>{{ __('messages.loan_application.status') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>
        @foreach ($loanApplications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->user->name }}</td>
                <td>{{ $application->status }}</td>
                <td>
                    <a href="{{ route('loan-applications.edit', $application) }}">{{ __('messages.actions.edit') }}</a>
                    <a href="{{ route('loan-applications.show', $application) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>
</x-layouts.admin>
