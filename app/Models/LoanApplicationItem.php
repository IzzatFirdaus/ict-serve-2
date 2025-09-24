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
 * Class LoanApplicationItem
 *
 * @property int $id
 * @property int $loan_application_id
 * @property string $equipment_type
 * @property int $quantity_requested
 * @property int|null $quantity_approved
 * @property int|null $quantity_issued
 * @property int|null $quantity_returned
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read LoanApplication $loanApplication
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class LoanApplicationItem extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'loan_application_id', 'equipment_type', 'quantity_requested', 'quantity_approved', 'quantity_issued', 'quantity_returned',
        'created_by', 'updated_by', 'deleted_by',
    ];

    public function loanApplication(): BelongsTo
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id');
    }
}
