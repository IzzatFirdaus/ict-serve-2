<x-layouts.admin>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.user.name') }}" required />
            <x-myds.form.input name="email" label="{{ __('messages.user.email') }}" type="email" required />
            <x-myds.form.input name="password" label="{{ __('messages.user.password') }}" type="password" required />
            <x-myds.form.submit>{{ __('messages.actions.save') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
