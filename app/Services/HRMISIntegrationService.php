<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class HRMISIntegrationService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.hrmis.base_url');
        $this->apiKey = config('services.hrmis.api_key');
    }

    public function syncUserData(): void
    {
        $hrmisUsers = $this->fetchUsersFromHRMIS();

        foreach ($hrmisUsers as $hrmisUser) {
            $localUser = User::where('identification_number', $hrmisUser['ic'])->first();

            if ($localUser) {
                $this->updateLocalUser($localUser, $hrmisUser);
            } else {
                $this->createLocalUser($hrmisUser);
            }
        }
    }

    private function fetchUsersFromHRMIS(): array
    {
        // @todo: Implement actual HTTP call to HRMIS API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->get($this->baseUrl . '/api/employees');

        return $response->json()['data'] ?? [];
    }

    private function updateLocalUser(User $user, array $hrmisData): void
    {
        $user->update([
            'name' => $hrmisData['name'],
            'email' => $hrmisData['email'],
            'department_id' => $this->mapDepartment($hrmisData['department']),
            'grade_id' => $this->mapGrade($hrmisData['grade']),
            'position_id' => $this->mapPosition($hrmisData['position']),
        ]);
    }

    private function createLocalUser(array $hrmisData): void
    {
        // @todo: Implement user creation logic
        User::create([
            'name' => $hrmisData['name'],
            'email' => $hrmisData['email'],
            'identification_number' => $hrmisData['ic'],
            'department_id' => $this->mapDepartment($hrmisData['department']),
            'grade_id' => $this->mapGrade($hrmisData['grade']),
            'position_id' => $this->mapPosition($hrmisData['position']),
            'password' => bcrypt('temporary_password'), // @todo: Generate secure temporary password
        ]);
    }

    private function mapDepartment(string $hrmisDepartment): ?int
    {
        // @todo: Implement department mapping logic
        return null;
    }

    private function mapGrade(string $hrmisGrade): ?int
    {
        // @todo: Implement grade mapping logic
        return null;
    }

    private function mapPosition(string $hrmisPosition): ?int
    {
        // @todo: Implement position mapping logic
        return null;
    }
}
