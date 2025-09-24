<?php

// Ensure composer autoload is available to phpstan when running locally
$autoload = __DIR__.'/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
}

// Provide minimal stubs for classes that may be referenced in the app
// but not present in this environment so phpstan/larastan doesn't fail.
// Only define them if they do not already exist. Use eval to define
// classes in the correct namespace without invalid inline namespace blocks.
if (! class_exists('\\Spatie\\Permission\\Models\\Permission')) {
    eval('namespace Spatie\\Permission\\Models; class Permission {}');
}

if (! class_exists('\\Spatie\\Permission\\Models\\Role')) {
    eval('namespace Spatie\\Permission\\Models; class Role {}');
}

// Stubs for Livewire/Filament interactive component methods used in the app
if (! trait_exists('\\App\\Stubs\\LivewireMethodsTrait')) {
    eval('namespace App\\Stubs; trait LivewireMethodsTrait { public function emit(string $event, ...$params) {} public function dispatchBrowserEvent(string $event, $data = null) {} public function dispatch(string $event, ...$params) {} }');
}

// Provide a minimal base Livewire component class if not present so phpstan
// recognizes instance methods called on components in the codebase.
if (! class_exists('\\Livewire\\Component')) {
    eval('namespace Livewire; class Component { use \\App\\Stubs\\LivewireMethodsTrait; }');
}

// Provide a lightweight stub for the global `view()` helper with a PHPDoc
// annotation that declares the special 'view-string' type so PHPStan/Larastan
// treats the first parameter correctly during analysis.
if (! function_exists('view')) {
    eval('namespace { /** @param view-string $view */ function view(string $view, array $data = [], array $mergeData = []) { return null; } }');
}
