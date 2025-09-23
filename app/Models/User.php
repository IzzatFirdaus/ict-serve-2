<?php

namespace App\Models;

use App\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use App\Traits\Blameable;

/**
 * Class User
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
 * @property string|null $lang
 * @property string|null $theme
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property array|null $two_factor_recovery_codes
 * @property string|null $two_factor_secret
 * @property \Illuminate\Support\Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property-read Position|null $position
 * @property-read Grade|null $grade
 * @property-read Department|null $department
 * @property-read \Illuminate\Database\Eloquent\Collection|HelpdeskTicket[] $helpdeskTickets
 * @property-read \Illuminate\Database\Eloquent\Collection|LoanApplication[] $loanApplications
 * @property-read \Illuminate\Database\Eloquent\Collection|Approval[] $approvals
 * @property-read bool $is_active
 * @property-read bool $is_approver
 */
class User extends Authenticatable implements AuditableContract, FilamentUser
{
    use AuditableTrait, HasFactory, HasRoles, Notifiable, SoftDeletes, Blameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title', 'name', 'identification_number', 'passport_number', 'profile_photo_path',
        'position_id', 'grade_id', 'department_id', 'level', 'mobile_number', 'email', 'password',
        'lang', 'theme', 'status', 'email_verified_at', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at',
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
        'two_factor_confirmed_at' => 'datetime',
        'lang' => 'string',
        'theme' => 'string',
        'status' => 'string',
    ];
    /**
     * Audit relationships
     */
    public function createdBy(): ?BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): ?BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): ?BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /**
     * Accessor for language (bilingual/theme awareness)
     */
    public function getLangLabelAttribute(): string
    {
        return match ($this->lang) {
            'ms' => 'Bahasa Melayu',
            'en' => 'English',
            default => 'Unknown',
        };
    }

    public function getThemeLabelAttribute(): string
    {
        return match ($this->theme) {
            'light' => 'Cerah',
            'dark' => 'Gelap',
            default => 'Unknown',
        };
    }

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
    /**
     * Returns true if the user is active (status = 'aktif').
     */
    public function isActive(): bool
    {
        return $this->status === \App\Enums\UserStatus::Aktif->value;
    }

    /**
     * Returns true if the user has the 'approver' role.
     */
    public function isApprover(): bool
    {
        return (bool) $this->roles()->where('name', 'approver')->exists();
    }

    /**
     * Determine if the user can access the Filament admin panel.
     */
    /**
     * Determine if the user can access the Filament admin panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isActive() && str_ends_with($this->email, '@example.test');
    }

    /**
     * Scope for active users.
     */
    public function scopeActive($query)
    {
        return $query->where('status', \App\Enums\UserStatus::Aktif->value);
    }

    /**
     * Scope for approvers.
     */
    public function scopeApprovers($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('name', 'approver');
        });
    }


}
