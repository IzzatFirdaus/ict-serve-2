<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 */
class Department extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'branch_type', 'code', 'description', 'is_active', 'head_user_id',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function head(): BelongsTo
    {
        return $this->belongsTo(User::class, 'head_user_id');
    }

    public function isActive(): bool
    {
        return (bool) $this->is_active;
    }
}
