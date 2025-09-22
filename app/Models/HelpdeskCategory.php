<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class HelpdeskCategory extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

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
}
