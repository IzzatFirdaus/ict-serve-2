<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // Loan permissions
            'loan.create',
            'loan.view',
            'loan.edit',
            'loan.delete',
            'loan.approve',
            'loan.reject',
            'loan.manage_issuance',

            // Helpdesk permissions
            'helpdesk.create',
            'helpdesk.view',
            'helpdesk.edit',
            'helpdesk.delete',
            'helpdesk.assign',
            'helpdesk.resolve',
            'helpdesk.manage',

            // Inventory permissions
            'inventory.view',
            'inventory.manage',
            'inventory.create',
            'inventory.edit',
            'inventory.delete',

            // Reporting permissions
            'reports.view_own',
            'reports.view_department',
            'reports.view_all',
            'reports.export',

            // Administration permissions
            'admin.users',
            'admin.roles',
            'admin.settings',
            'admin.system',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $this->createUserRoles();
    }

    private function createUserRoles()
    {
        // Pengguna Biasa - Cipta, Lihat (Pinjaman ICT), Cipta, Lihat (Helpdesk), Lihat (Inventori), Lihat Sendiri (Pelaporan)
        $penggunaBiasa = Role::firstOrCreate(['name' => 'Pengguna Biasa']);
        $penggunaBiasa->givePermissionTo([
            'loan.create',
            'loan.view',
            'helpdesk.create',
            'helpdesk.view',
            'inventory.view',
            'reports.view_own',
        ]);

        // Pegawai Penyokong - Lulus/Tolak (Pinjaman ICT), Lihat (Inventori), Lihat Dept (Pelaporan)
        $pegawaiPenyokong = Role::firstOrCreate(['name' => 'Pegawai Penyokong']);
        $pegawaiPenyokong->givePermissionTo([
            'loan.approve',
            'loan.reject',
            'loan.view',
            'inventory.view',
            'reports.view_department',
        ]);

        // Staf BPM - Urus Pengeluaran (Pinjaman ICT), Penuh (Inventori), Penuh (Pelaporan)
        $stafBPM = Role::firstOrCreate(['name' => 'Staf BPM']);
        $stafBPM->givePermissionTo([
            'loan.manage_issuance',
            'loan.view',
            'inventory.manage',
            'inventory.create',
            'inventory.edit',
            'inventory.delete',
            'inventory.view',
            'reports.view_all',
            'reports.export',
        ]);

        // Agen IT - Lihat (Pinjaman ICT), Penuh (Helpdesk), Lihat (Inventori), Lihat IT (Pelaporan)
        $agenIT = Role::firstOrCreate(['name' => 'Agen IT']);
        $agenIT->givePermissionTo([
            'loan.view',
            'helpdesk.manage',
            'helpdesk.assign',
            'helpdesk.resolve',
            'helpdesk.create',
            'helpdesk.view',
            'helpdesk.edit',
            'helpdesk.delete',
            'inventory.view',
            'reports.view_all',
        ]);

        // Pentadbir Sistem - Penuh (Semua modul)
        $pentadbirSistem = Role::firstOrCreate(['name' => 'Pentadbir Sistem']);
        $pentadbirSistem->givePermissionTo(Permission::all());
    }
}
