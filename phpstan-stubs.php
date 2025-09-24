<?php

/**
 * Minimal stubs for PHPStan analysis.
 *
 * These are real PHP files (not eval) so PHPStan can parse their docblocks.
 */
if (! function_exists('view')) {
    /** @param view-string $view */
    function view(string $view, array $data = [], array $mergeData = [])
    {
        return null;
    }
}

if (! class_exists('Livewire\\Component')) {
    eval('namespace Livewire; class Component { public function emit(string $event, ...$params) {} public function dispatchBrowserEvent(string $event, $data = null) {} public function dispatch(string $event, ...$params) {} }');
}
