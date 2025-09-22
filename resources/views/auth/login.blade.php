<x-layouts.guest>
    {{-- Login form --}}
    <h1 class="myds-heading">{{ __('messages.auth.login.title') }}</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">{{ __('messages.auth.email') }}</label>
        <input id="email" name="email" type="email" class="myds-input" required />

        <label for="password">{{ __('messages.auth.password') }}</label>
        <input id="password" name="password" type="password" class="myds-input" required />

        <x-myds.button type="submit">{{ __('messages.actions.login') }}</x-myds.button>
        <x-myds.button as="a" href="{{ route('register') }}" variant="secondary">{{ __('messages.auth.register') }}</x-myds.button>
    </form>
</x-layouts.guest>
