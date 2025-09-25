<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

trait Blameable
{
    /**
     * Boot the trait and attach model events to set created_by/updated_by/deleted_by.
     */
    public static function bootBlameable(): void
    {
        // Don't apply listeners if running in the console (e.g., during seeds or tests)
        if (App::runningInConsole()) {
            return;
        }

        static::creating(function ($model) {
            if (empty($model->created_by) && Auth::check()) {
                $model->created_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });

        static::deleting(function ($model) {
            // ensure $model is an object with the expected methods/properties
            if (! is_object($model)) {
                return;
            }

            // on soft delete, set deleted_by only when not force-deleting
            if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
                if (Auth::check()) {
                    $model->deleted_by = Auth::id();

                    // Persist the change without triggering model events if possible
                    if (method_exists($model, 'saveQuietly')) {
                        $model->saveQuietly();
                    } elseif (method_exists($model, 'save')) {
                        // Fallback: save (may trigger events)
                        $model->save();
                    }
                }
            }
        });
    }

    /**
     * Relationship to the user who created the record.
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    /**
     * Relationship to the user who last updated the record.
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }

    /**
     * Relationship to the user who soft-deleted the record.
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'deleted_by');
    }
}
