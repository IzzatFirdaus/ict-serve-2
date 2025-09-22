<x-layouts.admin>
    <form method="POST" action="{{ route('grades.update', $grade) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.grade.name') }}" value="{{ $grade->name }}" required />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
