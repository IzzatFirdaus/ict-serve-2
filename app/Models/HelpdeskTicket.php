<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class HelpdeskTicket extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'assigned_to_user_id', 'category_id', 'subject', 'description', 'status', 'priority', 'due_date', 'resolution_notes', 'closed_at',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(HelpdeskCategory::class, 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(HelpdeskComment::class, 'ticket_id');
    }

    public function isClosed(): bool
    {
        return $this->status === 'closed';
    }

    public function isAssigned(): bool
    {
        return ! is_null($this->assigned_to_user_id);
    }
}
