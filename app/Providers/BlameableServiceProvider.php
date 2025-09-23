<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Observers\BlameableObserver;

class BlameableServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // no bindings
    }

    public function boot(): void
    {
        $modelPath = app_path('Models');

        if (! is_dir($modelPath)) {
            return;
        }

        $files = scandir($modelPath);

        foreach ($files as $file) {
            if (! Str::endsWith($file, '.php')) {
                continue;
            }

            $class = 'App\\Models\\' . pathinfo($file, PATHINFO_FILENAME);

            if (! class_exists($class)) {
                continue;
            }

            $traits = class_uses($class);

            if (! is_array($traits)) {
                continue;
            }

            foreach ($traits as $trait) {
                if ($trait === 'App\\Traits\\Blameable') {
                    $class::observe(BlameableObserver::class);
                    break;
                }
            }
        }
    }
}
