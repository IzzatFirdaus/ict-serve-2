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
 * Class SubCategory
 *
 * @property int $id
 * @property int $equipment_category_id
 * @property string $name
 * @property string|null $description
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read EquipmentCategory $equipmentCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|Equipment[] $equipment
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class SubCategory extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'equipment_category_id', 'name', 'description', 'is_active', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function equipmentCategory(): BelongsTo
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }

    public function equipment(): HasMany
    {
        return $this->hasMany(Equipment::class, 'sub_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
