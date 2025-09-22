<x-layouts.admin>
    <form method="POST" action="{{ route('departments.update', $department) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.department.name') }}" value="{{ $department->name }}" required />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
