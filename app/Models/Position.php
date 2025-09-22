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
 * App\Models\Position
 */
class Position extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'grade_id', 'description', 'is_active', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function isActive(): bool
    {
        return (bool) $this->is_active;
    }
}
