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
 * Class LoanTransaction
 *
 * @property int $id
 * @property int $loan_application_id
 * @property string $type
 * @property \Illuminate\Support\Carbon $transaction_date
 * @property int|null $issuing_officer_id
 * @property int|null $receiving_officer_id
 * @property array|null $accessories_checklist_on_issue
 * @property string|null $issue_notes
 * @property array|null $accessories_checklist_on_return
 * @property string|null $return_notes
 * @property string $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read LoanApplication $loanApplication
 * @property-read User|null $issuingOfficer
 * @property-read User|null $receivingOfficer
 * @property-read \Illuminate\Database\Eloquent\Collection|LoanTransactionItem[] $items
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class LoanTransaction extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'loan_application_id', 'type', 'transaction_date', 'issuing_officer_id', 'receiving_officer_id',
        'accessories_checklist_on_issue', 'issue_notes', 'accessories_checklist_on_return', 'return_notes', 'status',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
        'accessories_checklist_on_issue' => 'array',
        'accessories_checklist_on_return' => 'array',
    ];

    public function loanApplication(): BelongsTo
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id');
    }

    public function issuingOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'issuing_officer_id');
    }

    public function receivingOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiving_officer_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(LoanTransactionItem::class, 'loan_transaction_id');
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
     * Enum for transaction type.
     */
    public const TYPE_ISSUE = 'issue';

    public const TYPE_RETURN = 'return';

    /**
     * Enum for transaction status.
     */
    public const STATUS_COMPLETED = 'completed';

    public const STATUS_PENDING = 'pending';

    /**
     * Scope for completed transactions.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    /**
     * Scope for pending transactions.
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }
}
