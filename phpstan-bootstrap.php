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
