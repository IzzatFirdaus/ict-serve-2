<x-layouts.admin>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <x-myds.form>
            <x-myds.form.input name="name" label="{{ __('messages.user.name') }}" value="{{ $user->name }}" required />
            <x-myds.form.input name="email" label="{{ __('messages.user.email') }}" value="{{ $user->email }}" type="email" required />
            <x-myds.form.input name="password" label="{{ __('messages.user.password') }}" type="password" />
            <x-myds.form.submit>{{ __('messages.actions.update') }}</x-myds.form.submit>
        </x-myds.form>
    </form>
</x-layouts.admin>
