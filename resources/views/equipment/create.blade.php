<x-layouts.admin>
    <form method="POST" action="{{ route('equipment.store') }}">
        @csrf
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.equipment.name') }}" required />
            <x-myds.form.select name="category_id" label="{{ __('messages.equipment.category') }}" :options="$categories" required />
            <x-myds.form.submit>{{ __('messages.actions.save') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
