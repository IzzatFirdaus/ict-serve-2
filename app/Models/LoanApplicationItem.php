<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LoanApplicationItem extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'loan_application_id', 'equipment_type', 'quantity_requested', 'quantity_approved', 'quantity_issued', 'quantity_returned',
        'created_by', 'updated_by', 'deleted_by',
    ];

    public function loanApplication(): BelongsTo
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id');
    }
}
