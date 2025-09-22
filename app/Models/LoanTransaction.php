<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LoanTransaction extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

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
}
