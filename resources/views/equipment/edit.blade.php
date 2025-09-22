<x-layouts.admin>
    <form method="POST" action="{{ route('equipment.update', $equipment) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.equipment.name') }}" value="{{ $equipment->name }}" required />
            <x-myds.form.select name="category_id" label="{{ __('messages.equipment.category') }}" :options="$categories" :selected="$equipment->category_id" required />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
