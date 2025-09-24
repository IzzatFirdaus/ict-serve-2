<?php

namespace App\Providers;

use App\Observers\BlameableObserver;
use App\Traits\Blameable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use ReflectionClass;

class BlameableServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->discoverAndObserveModels();
    }

    /**
     * Discover models in the App\Models directory and apply the
     * BlameableObserver to those using the Blameable trait.
     */
    protected function discoverAndObserveModels(): void
    {
        $modelsPath = app_path('Models');

        if (!File::isDirectory($modelsPath)) {
            return;
        }

        collect(File::files($modelsPath))
            ->map(function (\Symfony\Component\Finder\SplFileInfo $file) {
                return 'App\\Models\\' . $file->getFilenameWithoutExtension();
            })
            ->filter(function (string $class) {
                return class_exists($class);
            })
            ->filter(function (string $class) {
                // Use reflection to safely check for trait usage
                $reflection = new ReflectionClass($class);
                return in_array(Blameable::class, $reflection->getTraitNames());
            })
            ->each(function (string $class) {
                $class::observe(BlameableObserver::class);
            });
    }
}
