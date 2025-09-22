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
 * App\Models\Grade
 */
class Grade extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'level', 'min_approval_grade_id', 'is_approver_grade', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_approver_grade' => 'boolean',
    ];

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function minApprovalGrade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'min_approval_grade_id');
    }

    public function isApprover(): bool
    {
        return (bool) $this->is_approver_grade;
    }
}
