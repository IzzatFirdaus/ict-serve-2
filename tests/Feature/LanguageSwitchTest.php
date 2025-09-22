<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageSwitchTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_switches_language_to_ms_and_sets_session_and_flash()
    {
        $response = $this->post('/language/switch', ['lang' => 'ms']);
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'ms');
        $response->assertSessionHas('status', __('messages.language_switched', [], 'ms'));
    }

    /** @test */
    public function it_switches_language_to_en_and_sets_session_and_flash()
    {
        $response = $this->post('/language/switch', ['lang' => 'en']);
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'en');
        $response->assertSessionHas('status', __('messages.language_switched', [], 'en'));
    }

    /** @test */
    public function it_rejects_invalid_language_and_flashes_error()
    {
        $response = $this->post('/language/switch', ['lang' => 'fr']);
        $response->assertRedirect();
        $response->assertSessionMissing('locale');
        $response->assertSessionHas('status', __('messages.language_switch_invalid'));
    }
}
