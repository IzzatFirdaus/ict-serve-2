
<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('auth.dashboard') }}
        </x-nav-link>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <x-nav-link as="button" type="submit">
                {{ __('auth.logout') }}
            </x-nav-link>
        </form>
    @else
        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
            {{ __('auth.login.button') }}
        </x-nav-link>
        @if (Route::has('register'))
            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('auth.register.button') }}
            </x-nav-link>
        @endif
    @endauth
</nav>
