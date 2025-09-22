<x-layouts.admin>
    <form method="POST" action="{{ route('loan-applications.update', $loanApplication) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.select name="user_id" label="{{ __('messages.loan_application.user') }}" :options="$users" :selected="$loanApplication->user_id" required />
            <x-myds.form.select name="status" label="{{ __('messages.loan_application.status') }}" :options="$statuses" :selected="$loanApplication->status" required />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
