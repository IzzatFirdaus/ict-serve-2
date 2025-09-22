<x-layouts.admin>
    {{-- Approvals list --}}
    <h1 class="myds-heading">{{ __('messages.approvals.title') }}</h1>

    <x-myds.table aria-label="{{ __('messages.approvals.table_aria') }}">
        <x-slot:header>
            <tr>
                <th>{{ __('messages.approvals.id') }}</th>
                <th>{{ __('messages.approvals.requestor') }}</th>
                <th>{{ __('messages.approvals.type') }}</th>
                <th>{{ __('messages.approvals.status') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </x-slot:header>

        @foreach ($approvals as $approval)
            <tr>
                <td>{{ $approval->id }}</td>
                <td>{{ $approval->user->name }}</td>
                <td>{{ __("messages.approvals.types.{$approval->type}") }}</td>
                <td><x-myds.pill>{{ __("messages.approvals.status.{$approval->status}") }}</x-myds.pill></td>
                <td>
                    <a href="{{ route('approvals.show', $approval) }}">{{ __('messages.actions.view') }}</a>
                </td>
            </tr>
        @endforeach
    </x-myds.table>

    {{-- Pagination --}}
    <div class="mt-4">{{ $approvals->links('components.myds.pagination') }}</div>
</x-layouts.admin>
