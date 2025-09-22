<x-layouts.admin>
    <form method="POST" action="{{ route('equipment-categories.update', $category) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.equipment_category.name') }}" value="{{ $category->name }}" required />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
