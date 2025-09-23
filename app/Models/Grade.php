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
 * Class Grade
 *
 * @property int $id
 * @property string $name
 * @property string|null $level
 * @property int|null $min_approval_grade_id
 * @property bool $is_approver_grade
 * @property-read Grade|null $minApprovalGrade
 * @property-read \Illuminate\Database\Eloquent\Collection|Position[] $positions
 */
class Grade extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes, Blameable;
    /**
     * Audit relationships
     */
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

    /**
     * Returns true if this grade is an approver grade.
     */
    public function isApprover(): bool
    {
        return (bool) $this->is_approver_grade;
    }

    /**
     * Scope for approver grades.
     */
    public function scopeApprover($query)
    {
        return $query->where('is_approver_grade', true);
    }
}
