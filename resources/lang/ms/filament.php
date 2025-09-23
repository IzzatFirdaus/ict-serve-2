<?php

/**
 * Filament Admin Panel - Bahasa Melayu Translation
 * MYDS-compliant bilingual support for ICTServe (iServe)
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation Groups
    |--------------------------------------------------------------------------
    */
    'navigation' => [
        'users' => 'Pengguna',
        'equipment' => 'Peralatan',
        'loans' => 'Pinjaman',
        'helpdesk' => 'Meja Bantuan',
        'admin' => 'Pentadbiran',
        'reports' => 'Laporan',
    ],

    /*
    |--------------------------------------------------------------------------
    | Language Switcher
    |--------------------------------------------------------------------------
    */
    'language' => [
        'switch_language' => 'Tukar Bahasa',
        'switch_to' => 'Tukar ke :language',
        'switched_to' => 'Bahasa ditukar ke :language',
        'current' => 'Bahasa Semasa',
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Switcher
    |--------------------------------------------------------------------------
    */
    'theme' => [
        'switch_theme' => 'Tukar Tema',
        'switch_to' => 'Tukar ke tema :theme',
        'switched_to' => 'Tema ditukar ke :theme',
        'light' => 'Cerah',
        'dark' => 'Gelap',
        'system' => 'Sistem',
    ],

    /*
    |--------------------------------------------------------------------------
    | Resource Labels
    |--------------------------------------------------------------------------
    */
    'resources' => [
        'users' => [
            'label' => 'Pengguna',
            'plural' => 'Pengguna-pengguna',
            'create' => 'Cipta Pengguna',
            'edit' => 'Sunting Pengguna',
            'view' => 'Lihat Pengguna',
            'delete' => 'Padam Pengguna',
        ],
        'departments' => [
            'label' => 'Jabatan',
            'plural' => 'Jabatan-jabatan',
            'create' => 'Cipta Jabatan',
            'edit' => 'Sunting Jabatan',
            'view' => 'Lihat Jabatan',
            'delete' => 'Padam Jabatan',
        ],
        'equipment' => [
            'label' => 'Peralatan',
            'plural' => 'Peralatan-peralatan',
            'create' => 'Cipta Peralatan',
            'edit' => 'Sunting Peralatan',
            'view' => 'Lihat Peralatan',
            'delete' => 'Padam Peralatan',
        ],
        'loan_applications' => [
            'label' => 'Permohonan Pinjaman',
            'plural' => 'Permohonan-permohonan Pinjaman',
            'create' => 'Cipta Permohonan Pinjaman',
            'edit' => 'Sunting Permohonan Pinjaman',
            'view' => 'Lihat Permohonan Pinjaman',
            'delete' => 'Padam Permohonan Pinjaman',
        ],
        'helpdesk_tickets' => [
            'label' => 'Tiket Meja Bantuan',
            'plural' => 'Tiket-tiket Meja Bantuan',
            'create' => 'Cipta Tiket',
            'edit' => 'Sunting Tiket',
            'view' => 'Lihat Tiket',
            'delete' => 'Padam Tiket',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */
    'fields' => [
        'name' => 'Nama',
        'email' => 'E-mel',
        'password' => 'Kata Laluan',
        'status' => 'Status',
        'created_at' => 'Dicipta Pada',
        'updated_at' => 'Dikemaskini Pada',
        'description' => 'Keterangan',
        'active' => 'Aktif',
        'inactive' => 'Tidak Aktif',
        'pending' => 'Tertangguh',
        'approved' => 'Diluluskan',
        'rejected' => 'Ditolak',
    ],

    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    */
    'actions' => [
        'create' => 'Cipta',
        'edit' => 'Sunting',
        'view' => 'Lihat',
        'delete' => 'Padam',
        'save' => 'Simpan',
        'cancel' => 'Batal',
        'submit' => 'Hantar',
        'approve' => 'Luluskan',
        'reject' => 'Tolak',
        'export' => 'Eksport',
        'import' => 'Import',
        'search' => 'Cari',
        'filter' => 'Tapis',
        'reset' => 'Set Semula',
    ],

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'created' => 'Rekod berjaya dicipta.',
        'updated' => 'Rekod berjaya dikemaskini.',
        'deleted' => 'Rekod berjaya dipadam.',
        'saved' => 'Rekod berjaya disimpan.',
        'error' => 'Ralat berlaku. Sila cuba lagi.',
        'success' => 'Operasi berjaya.',
        'warning' => 'Amaran: Sila periksa input anda.',
        'info' => 'Maklumat telah dikemaskini.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    'dashboard' => [
        'title' => 'Papan Pemuka',
        'welcome' => 'Selamat datang ke ICTServe',
        'overview' => 'Gambaran Keseluruhan',
        'statistics' => 'Statistik',
        'recent_activities' => 'Aktiviti Terkini',
        'pending_approvals' => 'Kelulusan Tertangguh',
        'active_loans' => 'Pinjaman Aktif',
        'open_tickets' => 'Tiket Terbuka',
    ],

    /*
    |--------------------------------------------------------------------------
    | Widgets
    |--------------------------------------------------------------------------
    */
    'widgets' => [
        'total_users' => 'Jumlah Pengguna',
        'total_equipment' => 'Jumlah Peralatan',
        'pending_loans' => 'Pinjaman Tertangguh',
        'open_tickets' => 'Tiket Terbuka',
        'this_month' => 'Bulan Ini',
        'this_week' => 'Minggu Ini',
        'today' => 'Hari Ini',
    ],
];
