<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LoanApplication extends Model implements AuditableContract
{
    use AuditableTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'responsible_officer_id', 'supporting_officer_id', 'purpose', 'location', 'return_location',
        'loan_start_date', 'loan_end_date', 'status', 'rejection_reason', 'applicant_confirmation_timestamp',
        'submitted_at', 'approved_by', 'approved_at', 'rejected_by', 'rejected_at', 'cancelled_by', 'cancelled_at',
        'admin_notes', 'current_approval_officer_id', 'current_approval_stage', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'loan_start_date' => 'datetime',
        'loan_end_date' => 'datetime',
        'applicant_confirmation_timestamp' => 'datetime',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function responsibleOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_officer_id');
    }

    public function supportingOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supporting_officer_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(LoanApplicationItem::class, 'loan_application_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(LoanTransaction::class, 'loan_application_id');
    }

    public function approvals(): MorphMany
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * Returns true if the application is in a state that can be approved.
     * Adjust the value to match your actual allowed status values.
     */
    public function isApprovable(): bool
    {
        // Use 'pending_support' or 'draft' as per your status enum.
        return $this->status === 'pending_support' || $this->status === 'draft';
    }

    public function isEditable(): bool
    {
        return in_array($this->status, ['draft', 'pending']);
    }
}
