<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AuditLog
 *
 * @property int $id
 * @property string $auditable_type
 * @property int $auditable_id
 * @property string $event
 * @property array|null $old_values
 * @property array|null $new_values
 * @property string|null $url
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property int|null $user_id
 * @property string|null $user_type
 * @property string|null $tags
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read Model $auditable
 * @property-read User|null $user
 */
class AuditLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'audit_logs';

    protected $fillable = [
        'auditable_type',
        'auditable_id',
        'event',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'user_agent',
        'user_id',
        'user_type',
        'tags',
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the parent auditable model (morph).
     */
    public function auditable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user who performed the action.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get a summary of changes.
     */
    public function getChangeSummaryAttribute(): string
    {
        $old = $this->old_values ?? [];
        $new = $this->new_values ?? [];
        $diff = [];
        foreach ($new as $key => $value) {
            $oldValue = $old[$key] ?? null;
            if ($oldValue !== $value) {
                $diff[] = "$key: '$oldValue' → '$value'";
            }
        }
        return implode(", ", $diff);
    }
}
