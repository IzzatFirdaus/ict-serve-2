<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTablesTest extends TestCase
{
    public function test_audit_logs_table_exists_with_expected_columns(): void
    {
        $this->assertTrue(Schema::hasTable('audit_logs'), 'audit_logs table does not exist');

        $expectedColumns = ['id', 'auditable_type', 'auditable_id', 'event', 'old_values', 'new_values', 'user_id', 'created_at', 'updated_at'];

        foreach ($expectedColumns as $col) {
            $this->assertTrue(Schema::hasColumn('audit_logs', $col), "Column {$col} not found in audit_logs");
        }
    }
}
