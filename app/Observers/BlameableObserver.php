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
     */
    public function creating(Model $model): void
    {
        // Only set created_by if it hasn't been set manually, and if the action
        // is performed by an authenticated user in a web context.
        if (empty($model->created_by) && Auth::check() && ! App::runningInConsole()) {
            $model->created_by = Auth::id();
        }
    }

    /**
     * Handle the Model "updating" event.
     */
    public function updating(Model $model): void
    {
        // Always set updated_by if the action is performed by an authenticated user.
        if (Auth::check() && ! App::runningInConsole()) {
            $model->updated_by = Auth::id();
        }
    }

    /**
     * Handle the Model "deleting" event for soft deletes.
     */
    public function deleting(Model $model): void
    {
        // Ensure $model is an object (defensive) and we're not in a console context
        if (! is_object($model) || App::runningInConsole()) {
            return;
        }

        // Only act on soft-delete (not force-delete)
        if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
            if (Auth::check()) {
                $model->deleted_by = Auth::id();

                if (method_exists($model, 'saveQuietly')) {
                    $model->saveQuietly();
                } elseif (method_exists($model, 'save')) {
                    $model->save();
                }
            }
        }
    }
}
