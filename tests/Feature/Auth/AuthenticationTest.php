<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
<<<<<<< HEAD
use Livewire\Volt\Volt;
=======
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

<<<<<<< HEAD
        $response
            ->assertOk()
            ->assertSeeVolt('pages.auth.login');
=======
        $response->assertStatus(200);
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

<<<<<<< HEAD
        $component = Volt::test('pages.auth.login')
            ->set('form.email', $user->email)
            ->set('form.password', 'password');

        $component->call('login');

        $component
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard', absolute: false));

        $this->assertAuthenticated();
=======
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

<<<<<<< HEAD
        $component = Volt::test('pages.auth.login')
            ->set('form.email', $user->email)
            ->set('form.password', 'wrong-password');

        $component->call('login');

        $component
            ->assertHasErrors()
            ->assertNoRedirect();
=======
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747

        $this->assertGuest();
    }

<<<<<<< HEAD
    public function test_navigation_menu_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response
            ->assertOk()
            ->assertSeeVolt('layout.navigation');
    }

=======
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

<<<<<<< HEAD
        $this->actingAs($user);

        $component = Volt::test('layout.navigation');

        $component->call('logout');

        $component
            ->assertHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
=======
        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }
}
