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
 * Class Grade
 *
 * @property int $id
 * @property string $name
 * @property int|null $level
 * @property int|null $min_approval_grade_id
 * @property bool $is_approver_grade
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read Grade|null $minApprovalGrade
 * @property-read \Illuminate\Database\Eloquent\Collection|Position[] $positions
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class Grade extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'level', 'min_approval_grade_id', 'is_approver_grade', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_approver_grade' => 'boolean',
        'level' => 'integer',
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
        return $this->is_approver_grade;
    }

    public function scopeApprover($query)
    {
        return $query->where('is_approver_grade', true);
    }
}
