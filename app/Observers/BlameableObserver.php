<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    public function creating($model): void
    {
        if (empty($model->created_by) && Auth::check()) {
            $model->created_by = Auth::id();
        }
    }

    public function updating($model): void
    {
        if (Auth::check()) {
            $model->updated_by = Auth::id();
        }
    }

    public function deleting($model): void
    {
        if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
            if (Auth::check()) {
                $model->deleted_by = Auth::id();
                $model->save();
            }
        }
    }
}
