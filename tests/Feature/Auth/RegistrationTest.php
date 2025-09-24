<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
<<<<<<< HEAD
use Livewire\Volt\Volt;
=======
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

<<<<<<< HEAD
        $response
            ->assertOk()
            ->assertSeeVolt('pages.auth.register');
=======
        $response->assertStatus(200);
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }

    public function test_new_users_can_register(): void
    {
<<<<<<< HEAD
        $component = Volt::test('pages.auth.register')
            ->set('name', 'Test User')
            ->set('email', 'test@example.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password');

        $component->call('register');

        $component->assertRedirect(route('dashboard', absolute: false));

        $this->assertAuthenticated();
=======
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }
}
