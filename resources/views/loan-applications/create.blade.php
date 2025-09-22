<x-layouts.admin>
    <form method="POST" action="{{ route('loan-applications.store') }}">
        @csrf
        <x-myds.form>
            <x-myds.form.select name="user_id" label="{{ __('messages.loan_application.user') }}" :options="$users" required />
            <x-myds.form.select name="status" label="{{ __('messages.loan_application.status') }}" :options="$statuses" required />
            <x-myds.form.submit>{{ __('messages.actions.save') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
