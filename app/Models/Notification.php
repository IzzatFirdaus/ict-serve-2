<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable as NotifiableTrait;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Notification extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, NotifiableTrait, SoftDeletes;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id', 'type', 'notifiable_type', 'notifiable_id', 'data', 'read_at', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
