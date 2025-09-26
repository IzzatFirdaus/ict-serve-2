<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class LoanApplication
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $responsible_officer_id
 * @property int|null $supporting_officer_id
 * @property string $purpose
 * @property string|null $location
 * @property string|null $return_location
 * @property \Illuminate\Support\Carbon $loan_start_date
 * @property \Illuminate\Support\Carbon $loan_end_date
 * @property string $status
 * @property string|null $rejection_reason
 * @property \Illuminate\Support\Carbon|null $applicant_confirmation_timestamp
 * @property \Illuminate\Support\Carbon|null $submitted_at
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property int|null $rejected_by
 * @property \Illuminate\Support\Carbon|null $rejected_at
 * @property int|null $cancelled_by
 * @property \Illuminate\Support\Carbon|null $cancelled_at
 * @property string|null $admin_notes
 * @property int|null $current_approval_officer_id
 * @property string|null $current_approval_stage
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read User $user
 * @property-read User|null $responsibleOfficer
 * @property-read User|null $supportingOfficer
 * @property-read \Illuminate\Database\Eloquent\Collection|LoanApplicationItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|LoanTransaction[] $transactions
 * @property-read \Illuminate\Database\Eloquent\Collection|Approval[] $approvals
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class LoanApplication extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $auditInclude = [
        'status',
        'approved_by',
        'rejection_reason',
        'loan_start_date',
        'loan_end_date'
    ];

    protected $auditEvents = [
        'created',
        'updated',
        'deleted',
        'restored'
    ];

    protected $fillable = [
        'user_id', 'responsible_officer_id', 'supporting_officer_id', 'purpose', 'location', 'return_location',
        'loan_start_date', 'loan_end_date', 'status', 'rejection_reason', 'applicant_confirmation_timestamp',
        'submitted_at', 'approved_by', 'approved_at', 'rejected_by', 'rejected_at', 'cancelled_by', 'cancelled_at',
        'admin_notes', 'current_approval_officer_id', 'current_approval_stage', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'loan_start_date' => 'datetime',
        'loan_end_date' => 'datetime',
        'applicant_confirmation_timestamp' => 'datetime',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    // Status constants (aligned with migration)
    public const STATUS_DRAFT = 'draft';

    public const STATUS_PENDING_SUPPORT = 'pending_support';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_REJECTED = 'rejected';

    public const STATUS_ISSUED = 'issued';

    public const STATUS_RETURNED = 'returned';

    public const STATUS_COMPLETED = 'completed';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function responsibleOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_officer_id');
    }

    public function supportingOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supporting_officer_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(LoanApplicationItem::class, 'loan_application_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(LoanTransaction::class, 'loan_application_id');
    }

    public function approvals(): MorphMany
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    public function isEditable(): bool
    {
        return in_array($this->status, [self::STATUS_DRAFT, self::STATUS_PENDING_SUPPORT]);
    }
}
