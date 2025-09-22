<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class DamageReport extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'department_id', 'position_grade', 'email', 'phone_number', 'damage_type', 'description', 'confirmation', 'status', 'assigned_to_user_id', 'resolution_notes', 'closed_at',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'confirmation' => 'boolean',
        'closed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function damageCategory(): BelongsTo
    {
        return $this->belongsTo(HelpdeskCategory::class, 'damage_type');
    }
}
