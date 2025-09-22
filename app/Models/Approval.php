<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Approval extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

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
}
