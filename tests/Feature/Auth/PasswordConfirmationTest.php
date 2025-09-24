<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
<<<<<<< HEAD
use Livewire\Volt\Volt;
=======
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');

<<<<<<< HEAD
        $response
            ->assertSeeVolt('pages.auth.confirm-password')
            ->assertStatus(200);
=======
        $response->assertStatus(200);
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }

    public function test_password_can_be_confirmed(): void
    {
        $user = User::factory()->create();

<<<<<<< HEAD
        $this->actingAs($user);

        $component = Volt::test('pages.auth.confirm-password')
            ->set('password', 'password');

        $component->call('confirmPassword');

        $component
            ->assertRedirect('/dashboard')
            ->assertHasNoErrors();
=======
        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create();

<<<<<<< HEAD
        $this->actingAs($user);

        $component = Volt::test('pages.auth.confirm-password')
            ->set('password', 'wrong-password');

        $component->call('confirmPassword');

        $component
            ->assertNoRedirect()
            ->assertHasErrors('password');
=======
        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    }
}
