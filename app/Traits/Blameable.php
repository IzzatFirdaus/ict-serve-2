<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Blameable
{
    /**
     * Boot the trait and attach model events to set created_by/updated_by/deleted_by
     */
    public static function bootBlameable(): void
    {
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

            // on soft delete, set deleted_by
            if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
                if (Auth::check()) {
                    // Only set property if it exists or is dynamically allowed
                    $model->deleted_by = Auth::id();
                    // Save to persist deleted_by before soft delete
                    if (method_exists($model, 'save')) {
                        $model->save();
                    }
                }
            }
        });
    }
}
