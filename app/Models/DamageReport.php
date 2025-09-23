<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class DamageReport
 *
 * @property int $id
 * @property int $user_id
 * @property int $department_id
 * @property string|null $position_grade
 * @property string $email
 * @property string|null $phone_number
 * @property int $damage_type
 * @property string $description
 * @property bool $confirmation
 * @property string $status
 * @property int|null $assigned_to_user_id
 * @property string|null $resolution_notes
 * @property \Illuminate\Support\Carbon|null $closed_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read User $user
 * @property-read Department $department
 * @property-read User|null $assignedTo
 * @property-read HelpdeskCategory $damageCategory
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class DamageReport extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'department_id', 'position_grade', 'email', 'phone_number', 'damage_type', 'description', 'confirmation', 'status', 'assigned_to_user_id', 'resolution_notes', 'closed_at',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'confirmation' => 'boolean',
        'closed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function damageCategory(): BelongsTo
    {
        return $this->belongsTo(HelpdeskCategory::class, 'damage_type');
    }

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
     * Enum for damage report status.
     */
    public const STATUS_OPEN = 'open';

    public const STATUS_IN_PROGRESS = 'in_progress';

    public const STATUS_RESOLVED = 'resolved';

    public const STATUS_CLOSED = 'closed';

    /**
     * Scope for open reports.
     */
    public function scopeOpen($query)
    {
        return $query->where('status', self::STATUS_OPEN);
    }

    /**
     * Scope for closed reports.
     */
    public function scopeClosed($query)
    {
        return $query->where('status', self::STATUS_CLOSED);
    }

    /**
     * Returns true if the report is resolved.
     */
    public function isResolved(): bool
    {
        return $this->status === self::STATUS_RESOLVED;
    }
}
