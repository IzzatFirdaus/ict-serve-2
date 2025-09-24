<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class HelpdeskCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|HelpdeskTicket[] $tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|DamageReport[] $damageReports
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $deletedBy
 */
class HelpdeskCategory extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'is_active', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(HelpdeskTicket::class, 'category_id');
    }

    public function damageReports(): HasMany
    {
        return $this->hasMany(DamageReport::class, 'damage_type');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
