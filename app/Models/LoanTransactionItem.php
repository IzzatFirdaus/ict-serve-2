<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LoanTransactionItem extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'loan_transaction_id', 'equipment_id', 'status', 'condition_on_return', 'created_by', 'updated_by', 'deleted_by',
    ];

    public function loanTransaction(): BelongsTo
    {
        return $this->belongsTo(LoanTransaction::class, 'loan_transaction_id');
    }

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
