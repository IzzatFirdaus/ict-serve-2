<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
            $table->timestampsTz(0);
            $table->unique(['name', 'guard_name']);
            $table->comment('Permissions used by the Spatie permission package.');
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
            $table->timestampsTz(0);
            $table->unique(['name', 'guard_name']);
            $table->comment('Roles used by the Spatie permission package.');
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->foreignId('permission_id')->constrained($tableNames['permissions'])->cascadeOnDelete();
            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');
            $table->primary(['permission_id', $columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_primary');
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->foreignId('role_id')->constrained($tableNames['roles'])->cascadeOnDelete();
            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');
            $table->primary(['role_id', $columnNames['model_morph_key'], 'model_type'], 'model_has_roles_primary');
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->foreignId('permission_id')->constrained($tableNames['permissions'])->cascadeOnDelete();
            $table->foreignId('role_id')->constrained($tableNames['roles'])->cascadeOnDelete();
            $table->primary(['permission_id', 'role_id'], 'role_has_permissions_primary');
            $table->comment('Mapping of roles to permissions for Spatie package.');
        });
    }

    public function down(): void
    {
        $tableNames = config('permission.table_names');
        Schema::dropIfExists($tableNames['role_has_permissions']);
        Schema::dropIfExists($tableNames['model_has_roles']);
        Schema::dropIfExists($tableNames['model_has_permissions']);
        Schema::dropIfExists($tableNames['roles']);
        Schema::dropIfExists($tableNames['permissions']);
    }
};
