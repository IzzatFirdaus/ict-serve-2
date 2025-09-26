<?php

namespace App\BusinessRules;

use App\Models\User;

class LoanBusinessRules
{
    // Syarat kelayakan pemohon
    public static function isEligibleApplicant(User $user): bool
    {
        return $user->status === 'active'
            && $user->department_id !== null
            && !self::hasOutstandingLoans($user);
    }

    // Matriks kelulusan berdasarkan gred
    public static function getApprovalAuthority(User $applicant): ?User
    {
        $gradeLevel = $applicant->grade->level ?? 0;

        if ($gradeLevel <= 41) {
            return $applicant->department->getOfficerWithMinGrade(41);
        }

        if ($gradeLevel <= 48) {
            return $applicant->department->getOfficerWithMinGrade(48);
        }

        return $applicant->department->head; // For JUSA grades
    }

    // Had pinjaman mengikut kategori pengguna
    public static function getMaxLoanPeriod(User $user, string $equipmentType): int
    {
        $limits = [
            'laptop' => ['standard' => 14, 'senior' => 30],
            'projector' => ['standard' => 7, 'senior' => 14],
            'tablet' => ['standard' => 30, 'senior' => 60],
        ];

        $userCategory = $user->grade->level >= 44 ? 'senior' : 'standard';

        return $limits[$equipmentType][$userCategory] ?? 7;
    }

    /**
     * Check if user has outstanding loans
     * @todo Implement actual logic to check for outstanding loans
     */
    private static function hasOutstandingLoans(User $user): bool
    {
        // @todo: Implement logic to check for outstanding loans
        // This should check if user has any active/pending loan applications
        return false;
    }
}
