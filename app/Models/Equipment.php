<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Equipment extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'asset_type', 'brand', 'model', 'serial_number', 'tag_id', 'purchase_date', 'warranty_expiry_date',
        'status', 'current_location', 'notes', 'condition_status', 'department_id', 'equipment_category_id',
        'sub_category_id', 'location_id', 'item_code', 'description', 'purchase_price', 'acquisition_type',
        'classification', 'funded_by', 'supplier_name', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_expiry_date' => 'date',
    ];

    public function equipmentCategory(): BelongsTo
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function loanTransactionItems(): HasMany
    {
        return $this->hasMany(LoanTransactionItem::class, 'equipment_id');
    }

    /**
     * Returns true if equipment is loanable (status is 'available').
     * Adjust the value to match your actual allowed status values.
     */
    public function isLoanable(): bool
    {
        // If your allowed status values are 'available', keep as is. Otherwise, update accordingly.
        return $this->status === 'available';
    }

    /**
     * Returns true if equipment is available (loanable and condition is 'baik').
     * 'baik' is the Malay for 'good'.
     */
    public function isAvailable(): bool
    {
        return $this->isLoanable() && $this->condition_status === 'baik';
    }
}
