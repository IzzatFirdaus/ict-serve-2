<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/**
 * BlameableObserver automatically populates created_by, updated_by, and deleted_by
 * fields on Eloquent models to maintain an audit trail of user actions.
 *
 * --------------------------------------------------------------------------
 * HOW TO USE:
 * --------------------------------------------------------------------------
 * 1. Ensure your models use a `Blameable` trait that defines the relationships
 * (createdBy, updatedBy, deletedBy).
 *
 * 2. Register this observer for each model in a service provider, typically
 * in the `boot()` method of `app/Providers/EventServiceProvider.php`:
 *
 * User::observe(BlameableObserver::class);
 * Department::observe(BlameableObserver::class);
 * // ... register for all other blameable models.
 * --------------------------------------------------------------------------
 */
class BlameableObserver
{
    /**
     * Handle the Model "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model): void
    {
        // Only set created_by if it hasn't been set manually, and if the action
        // is performed by an authenticated user in a web context.
        if (empty($model->created_by) && Auth::check() && !App::runningInConsole()) {
            $model->created_by = Auth::id();
        }
    }

    /**
     * Handle the Model "updating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function updating(Model $model): void
    {
        // Always set updated_by if the action is performed by an authenticated user.
        if (Auth::check() && !App::runningInConsole()) {
            $model->updated_by = Auth::id();
        }
    }

    /**
     * Handle the Model "deleting" event for soft deletes.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleting(Model $model): void
    {
        // First, check if the model is actually being soft-deleted.
        if (method_exists($model, 'isForceDeleting') && !$model->isForceDeleting()) {
            if (Auth::check() && !App::runningInConsole()) {
                // Set the deleted_by attribute on the model.
                $model->deleted_by = Auth::id();

                // CRITICAL: We call saveQuietly() to persist the deleted_by change
                // without triggering the 'updating' event, thus avoiding an infinite loop.
                $model->saveQuietly();
            }
        }
    }
}
