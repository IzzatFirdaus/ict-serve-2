<?php

namespace App\Traits;

/**
 * Compatibility trait for HasRoles.
 * This avoids a direct static reference to Spatie's trait so static analyzers
 * will not error when the package isn't present. If Spatie's trait exists at
 * runtime, we dynamically create a trait that uses it. Otherwise we provide
 * a safe no-op placeholder implementation.
 */
if (! trait_exists('App\\Traits\\HasRoles')) {
    if (trait_exists('Spatie\\Permission\\Traits\\HasRoles')) {
        // Create the trait dynamically to avoid static references that some
        // language servers (intelephense) flag when the package is not installed.
        eval('namespace App\\Traits; trait HasRoles { use \\Spatie\\Permission\\Traits\\HasRoles; }');
    } else {
        trait HasRoles
        {
            public function hasRole($role): bool
            {
                return false;
            }

            public function hasAnyRole(...$roles): bool
            {
                return false;
            }

            public function hasAllRoles(...$roles): bool
            {
                return false;
            }

            // Provide a minimal roles() helper returning an empty collection
            // to avoid call-site errors when chaining role checks in code paths
            // executed during static analysis or tests.
            public function roles()
            {
                return collect();
            }
        }
    }
}
