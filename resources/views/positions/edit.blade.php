<x-layouts.admin>
    <form method="POST" action="{{ route('positions.update', $position) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.position.name') }}" value="{{ $position->name }}" required />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
