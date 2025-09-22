<x-layouts.admin>
    <form method="POST" action="{{ route('positions.store') }}">
        @csrf
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.position.name') }}" required />
            <x-myds.form.submit>{{ __('messages.actions.save') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
