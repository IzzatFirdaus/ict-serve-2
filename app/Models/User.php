<?php

namespace App\Models;

use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $title
 * @property string $name
 * @property string|null $identification_number
 * @property string|null $passport_number
 * @property string|null $profile_photo_path
 * @property int|null $position_id
 * @property int|null $grade_id
 * @property int|null $department_id
 * @property string|null $level
 * @property string|null $mobile_number
 * @property string $email
 * @property string $password
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 */
class User extends Authenticatable implements AuditableContract
{
    use AuditableTrait, HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title', 'name', 'identification_number', 'passport_number', 'profile_photo_path',
        'position_id', 'grade_id', 'department_id', 'level', 'mobile_number', 'email', 'password',
        'status', 'email_verified_at', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at',
        'remember_token', 'created_by', 'updated_by', 'deleted_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_recovery_codes' => 'array',
    ];

    /**
     * Relationships
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function helpdeskTickets(): HasMany
    {
        return $this->hasMany(HelpdeskTicket::class, 'user_id');
    }

    public function loanApplications(): HasMany
    {
        return $this->hasMany(LoanApplication::class, 'user_id');
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(Approval::class, 'officer_id');
    }

    /**
     * Helpers
     */
    public function isActive(): bool
    {
        return $this->status === 'active' || $this->status === 'enabled';
    }

    public function isApprover(): bool
    {
        return (bool) $this->roles()->where('name', 'approver')->exists();
    }
}
