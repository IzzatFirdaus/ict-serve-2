<x-layouts.guest>
    {{-- Register form --}}
    <h1 class="myds-heading">{{ __('messages.auth.register.title') }}</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">{{ __('messages.auth.name') }}</label>
        <input id="name" name="name" class="myds-input" required />

        <label for="email">{{ __('messages.auth.email') }}</label>
        <input id="email" name="email" type="email" class="myds-input" required />

        <label for="password">{{ __('messages.auth.password') }}</label>
        <input id="password" name="password" type="password" class="myds-input" required />

        <x-myds.button type="submit">{{ __('messages.actions.register') }}</x-myds.button>
    </form>
</x-layouts.guest>
