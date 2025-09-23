<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class Approval
 *
 * @property int $id
 * @property string $approvable_type
 * @property int $approvable_id
 * @property int|null $officer_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $stage
 * @property string|null $status
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $approval_timestamp
 * @property-read User|null $officer
 * @property-read Model $approvable
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read User|null $deletedBy
 */
class Approval extends Model implements AuditableContract
{
    use AuditableTrait, Blameable, HasFactory, SoftDeletes;

    protected $fillable = [
        'approvable_type', 'approvable_id', 'officer_id', 'stage', 'status', 'comments', 'approval_timestamp', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'approval_timestamp' => 'datetime',
    ];

    public function officer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'officer_id');
    }

    public function approvable(): MorphTo
    {
        return $this->morphTo();
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
}
