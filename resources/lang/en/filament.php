<?php

/**
 * Filament Admin Panel - English Translation
 * MYDS-compliant bilingual support for ICTServe (iServe)
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation Groups
    |--------------------------------------------------------------------------
    */
    'navigation' => [
        'users' => 'Users',
        'equipment' => 'Equipment',
        'loans' => 'Loans',
        'helpdesk' => 'Helpdesk',
        'admin' => 'Administration',
        'reports' => 'Reports',
    ],

    /*
    |--------------------------------------------------------------------------
    | Language & Theme Switchers
    |--------------------------------------------------------------------------
    */
    'language' => [
        'switch_language' => 'Switch Language',
        'switch_to' => 'Switch to :language',
        'switched_to' => 'Language switched to :language',
        'current' => 'Current Language',
    ],
    'theme' => [
        'switch_theme' => 'Switch Theme',
        'switch_to' => 'Switch to :theme theme',
        'switched_to' => 'Theme switched to :theme',
        'light' => 'Light',
        'dark' => 'Dark',
        'system' => 'System',
    ],

    /*
    |--------------------------------------------------------------------------
    | Resource Labels
    |--------------------------------------------------------------------------
    */
    'resources' => [
        'users' => [
            'label' => 'User',
            'plural' => 'Users',
            'create' => 'Create User',
            'edit' => 'Edit User',
            'view' => 'View User',
            'delete' => 'Delete User',
        ],
        'departments' => [
            'label' => 'Department',
            'plural' => 'Departments',
            'create' => 'Create Department',
            'edit' => 'Edit Department',
            'view' => 'View Department',
            'delete' => 'Delete Department',
        ],
        'equipment' => [
            'label' => 'Equipment',
            'plural' => 'Equipment',
            'create' => 'Create Equipment',
            'edit' => 'Edit Equipment',
            'view' => 'View Equipment',
            'delete' => 'Delete Equipment',
        ],
        'loan_applications' => [
            'label' => 'Loan Application',
            'plural' => 'Loan Applications',
            'create' => 'Create Loan Application',
            'edit' => 'Edit Loan Application',
            'view' => 'View Loan Application',
            'delete' => 'Delete Loan Application',
        ],
        'helpdesk_tickets' => [
            'label' => 'Helpdesk Ticket',
            'plural' => 'Helpdesk Tickets',
            'create' => 'Create Ticket',
            'edit' => 'Edit Ticket',
            'view' => 'View Ticket',
            'delete' => 'Delete Ticket',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */
    'fields' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'role' => 'Role',
        'permissions' => 'Permissions',
        'department' => 'Department',
        'title' => 'Title / Position',
        'status' => 'Status',
        'category' => 'Category',
        'description' => 'Description',
        'serial_number' => 'Serial Number',
        'brand' => 'Brand',
        'model' => 'Model',
        'asset_type' => 'Asset Type',
        'purchase_date' => 'Purchase Date',
        'warranty_expiry_date' => 'Warranty Expiry',
        'location' => 'Location',
        'priority' => 'Priority',
        'subject' => 'Subject',
        'assigned_to' => 'Assigned To',
        'reported_by' => 'Reported By',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'active' => 'Active',
        'inactive' => 'Inactive',
        'pending' => 'Pending',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ],

    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    */
    'actions' => [
        'create' => 'Create',
        'edit' => 'Edit',
        'view' => 'View',
        'delete' => 'Delete',
        'save' => 'Save Changes',
        'cancel' => 'Cancel',
        'submit' => 'Submit',
        'approve' => 'Approve',
        'reject' => 'Reject',
        'export' => 'Export',
        'import' => 'Import',
        'search' => 'Search',
        'filter' => 'Filter',
        'reset' => 'Reset',
        'confirm' => 'Confirm',
        'attach' => 'Attach',
        'detach' => 'Detach',
    ],

    /*
    |--------------------------------------------------------------------------
    | Table (List Resource)
    |--------------------------------------------------------------------------
    */
    'tables' => [
        'columns' => [
            'name' => 'Name',
            'email' => 'Email',
            'status' => 'Status',
            'roles' => 'Roles',
            'created_at' => 'Created At',
            'updated_at' => 'Last Updated',
        ],
        'filters' => [
            'status' => 'Filter by status',
            'role' => 'Filter by role',
            'created_at' => 'Filter by creation date',
        ],
        'empty' => [
            'heading' => 'No records found',
            'description' => 'No data is available to display here.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Modals
    |--------------------------------------------------------------------------
    */
    'modals' => [
        'delete' => [
            'heading' => 'Delete Record',
            'subheading' => 'Are you sure you want to delete this record? This action cannot be undone.',
            'buttons' => [
                'delete' => 'Confirm Delete',
                'cancel' => 'Cancel',
            ],
        ],
        'confirm' => [
            'heading' => 'Confirm Action',
            'subheading' => 'Are you sure you want to proceed with this action?',
            'buttons' => [
                'confirm' => 'Confirm',
                'cancel' => 'Cancel',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'created' => 'Record created successfully.',
        'updated' => 'Record updated successfully.',
        'deleted' => 'Record deleted successfully.',
        'saved' => 'Record saved successfully.',
        'error' => 'An error occurred. Please try again.',
        'success' => 'Operation completed successfully.',
        'warning' => 'Warning: Please check your input.',
        'info' => 'Information has been updated.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Dashboard & Widgets
    |--------------------------------------------------------------------------
    */
    'dashboard' => [
        'title' => 'Dashboard',
        'welcome' => 'Welcome to ICTServe',
        'overview' => 'Overview',
        'statistics' => 'Statistics',
        'recent_activities' => 'Recent Activities',
        'pending_approvals' => 'Pending Approvals',
        'active_loans' => 'Active Loans',
        'open_tickets' => 'Open Tickets',
    ],
    'widgets' => [
        'total_users' => 'Total Users',
        'total_equipment' => 'Total Equipment',
        'pending_loans' => 'Pending Loans',
        'open_tickets' => 'Open Tickets',
        'this_month' => 'This Month',
        'this_week' => 'This Week',
        'today' => 'Today',
    ],
];
