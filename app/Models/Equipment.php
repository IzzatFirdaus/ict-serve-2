<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use App\Traits\Blameable;

/**
 * Class Equipment
 *
 * @property int $id
 * @property string $asset_type
 * @property string $brand
 * @property string $model
 * @property string $serial_number
 * @property string|null $tag_id
 * @property \Illuminate\Support\Carbon|null $purchase_date
 * @property \Illuminate\Support\Carbon|null $warranty_expiry_date
 * @property string $status
 * @property string|null $current_location
 * @property string|null $notes
 * @property string|null $condition_status
 * @property int|null $department_id
 * @property int $equipment_category_id
 * @property int|null $sub_category_id
 * @property int|null $location_id
 * @property string|null $item_code
 * @property string|null $description
 * @property float|null $purchase_price
 * @property string|null $acquisition_type
 * @property string|null $classification
 * @property string|null $funded_by
 * @property string|null $supplier_name
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read EquipmentCategory $equipmentCategory
 * @property-read SubCategory|null $subCategory
 * @property-read Location|null $location
 * @property-read Department|null $department
 * @property-read \Illuminate\Database\Eloquent\Collection|LoanTransactionItem[] $loanTransactionItems
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class Equipment extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes, Blameable;

    protected $fillable = [
        'asset_type', 'brand', 'model', 'serial_number', 'tag_id', 'purchase_date', 'warranty_expiry_date',
        'status', 'current_location', 'notes', 'condition_status', 'department_id', 'equipment_category_id',
        'sub_category_id', 'location_id', 'item_code', 'description', 'purchase_price', 'acquisition_type',
        'classification', 'funded_by', 'supplier_name', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_expiry_date' => 'date',
        'purchase_price' => 'decimal:2',
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

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeActive($query)
    {
        return $query->where('condition_status', 'baik');
    }

    public function isLoanable(): bool
    {
        return $this->status === 'available';
    }

    public function isAvailable(): bool
    {
        return $this->isLoanable() && $this->condition_status === 'baik';
    }
}
