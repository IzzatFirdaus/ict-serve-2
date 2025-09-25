<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class HelpdeskTicket
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $assigned_to_user_id
 * @property int $category_id
 * @property string $subject
 * @property string|null $description
 * @property string $status
 * @property string $priority
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property string|null $resolution_notes
 * @property \Illuminate\Support\Carbon|null $closed_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read User $user
 * @property-read User|null $assignedTo
 * @property-read HelpdeskCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|HelpdeskComment[] $comments
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class HelpdeskTicket extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'assigned_to_user_id', 'category_id', 'subject', 'description', 'status', 'priority', 'due_date', 'resolution_notes', 'closed_at',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'closed_at' => 'datetime',
    ];

    // Status constants (aligned with migration)
    public const STATUS_OPEN = 'open';

    public const STATUS_IN_PROGRESS = 'in_progress';

    public const STATUS_PENDING_FEEDBACK = 'pending_user_feedback';

    public const STATUS_RESOLVED = 'resolved';

    public const STATUS_CLOSED = 'closed';

    public const STATUS_REOPENED = 'reopened';

    // Priority constants
    public const PRIORITY_LOW = 'low';

    public const PRIORITY_MEDIUM = 'medium';

    public const PRIORITY_HIGH = 'high';

    public const PRIORITY_CRITICAL = 'critical';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(HelpdeskCategory::class, 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(HelpdeskComment::class, 'ticket_id');
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function isAssigned(): bool
    {
        return ! is_null($this->assigned_to_user_id);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_OPEN => 'Open',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_PENDING_FEEDBACK => 'Pending User Feedback',
            self::STATUS_RESOLVED => 'Resolved',
            self::STATUS_CLOSED => 'Closed',
            self::STATUS_REOPENED => 'Reopened',
            default => ucfirst($this->status),
        };
    }

    public function getPriorityLabelAttribute(): string
    {
        return match ($this->priority) {
            self::PRIORITY_LOW => 'Low',
            self::PRIORITY_MEDIUM => 'Medium',
            self::PRIORITY_HIGH => 'High',
            self::PRIORITY_CRITICAL => 'Critical',
            default => ucfirst($this->priority),
        };
    }

    public function scopeOpen($query)
    {
        return $query->where('status', self::STATUS_OPEN);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', self::STATUS_CLOSED);
    }
}
