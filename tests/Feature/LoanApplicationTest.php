<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\LoanApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_loan_application()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/loans', [
            'purpose' => 'Training session',
            'loan_start_date' => now()->addDays(1)->format('Y-m-d'),
            'loan_end_date' => now()->addDays(7)->format('Y-m-d'),
            'equipment_type' => 'laptop',
            'quantity' => 1,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('loan_applications', [
            'user_id' => $user->id,
            'purpose' => 'Training session',
            'status' => 'pending_support',
        ]);
    }

    public function test_officer_can_approve_loan_application()
    {
        $officer = User::factory()->withGrade(41)->create();
        $application = LoanApplication::factory()->create([
            'status' => 'pending_support'
        ]);

        $response = $this->actingAs($officer)->put("/loans/{$application->id}/approve", [
            'comments' => 'Approved for training purposes'
        ]);

        $response->assertSuccessful();
        $this->assertEquals('approved', $application->fresh()->status);
    }

    public function test_loan_application_requires_valid_dates()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/loans', [
            'purpose' => 'Training session',
            'loan_start_date' => now()->subDay()->format('Y-m-d'), // Past date
            'loan_end_date' => now()->addDays(7)->format('Y-m-d'),
            'equipment_type' => 'laptop',
            'quantity' => 1,
        ]);

        $response->assertSessionHasErrors(['loan_start_date']);
    }
}
