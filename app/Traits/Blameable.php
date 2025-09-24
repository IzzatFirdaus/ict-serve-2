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
<<<<<<< HEAD
            // ensure $model is an object with the expected methods/properties
            if (! is_object($model)) {
                return;
            }

            // on soft delete, set deleted_by
            if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
=======
            // Check if the model is being soft-deleted, not force-deleted.
            if (method_exists($model, 'isForceDeleting') && !$model->isForceDeleting()) {
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
                if (Auth::check()) {
                    // Only set property if it exists or is dynamically allowed
                    $model->deleted_by = Auth::id();
<<<<<<< HEAD
                    // Save to persist deleted_by before soft delete
                    if (method_exists($model, 'save')) {
                        $model->save();
                    }
=======

                    // CRITICAL: Use saveQuietly() to persist the change without
                    // triggering the 'updating' event, which would cause an infinite loop.
                    $model->saveQuietly();
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
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
