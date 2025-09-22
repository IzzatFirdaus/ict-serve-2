<x-layouts.admin>
    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.department.name') }}" required />
            <x-myds.form.submit>{{ __('messages.actions.save') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
