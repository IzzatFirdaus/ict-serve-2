<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EquipmentCategoryController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Helpdesk\DamageReportController;
use App\Http\Controllers\Helpdesk\HelpdeskCommentController;
use App\Http\Controllers\Helpdesk\TicketController as HelpdeskTicketController;
use App\Http\Controllers\HelpdeskCategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\LoanApplicationItemController;
use App\Http\Controllers\LoanTransactionController;
use App\Http\Controllers\LoanTransactionItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


// Minimal login routes for Playwright and manual login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/home');
    }
    return back()->withErrors([
        'email' => __('auth.failed'),
    ])->withInput($request->only('email', 'remember'));
})->name('login.post');

Route::get('/register', function () {
    return redirect('/');
})->name('register');

// Language Switcher
Route::post('/language/switch', [LanguageController::class, 'switch'])->name('language.switch');

// Application routes - grouped and documented
Route::get('/', function () {
    return view('welcome');
})->name('home');

// All application BREAD routes live behind auth middleware
Route::middleware(['auth'])->group(function () {
    // User & Organization
    Route::resource('users', UserController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('grades', GradeController::class);

    // Equipment & Location
    Route::resource('equipment-categories', EquipmentCategoryController::class)->parameters(['equipment-categories' => 'equipment_category']);
    Route::resource('sub-categories', SubCategoryController::class)->parameters(['sub-categories' => 'sub_category']);
    Route::resource('locations', LocationController::class);
    Route::resource('equipment', EquipmentController::class);

    // ICT Loan Module
    Route::resource('loan-applications', LoanApplicationController::class);
    Route::post('loan-applications/{loan_application}/submit', [LoanApplicationController::class, 'submit'])->name('loan-applications.submit');
    Route::post('loan-applications/{loan_application}/cancel', [LoanApplicationController::class, 'cancel'])->name('loan-applications.cancel');
    Route::get('loan-applications/{loan_application}/pdf', [LoanApplicationController::class, 'pdf'])->name('loan-applications.pdf');
    Route::resource('loan-applications.items', LoanApplicationItemController::class);

    Route::resource('loan-transactions', LoanTransactionController::class);
    Route::post('loan-transactions/{loan_transaction}/process', [LoanTransactionController::class, 'process'])->name('loan-transactions.process');
    Route::resource('loan-transactions.items', LoanTransactionItemController::class);

    // Helpdesk - prefixed
    Route::prefix('helpdesk')
        ->name('helpdesk.')
        ->group(function () {
            Route::resource('tickets', HelpdeskTicketController::class);
            Route::post('tickets/{ticket}/assign', [HelpdeskTicketController::class, 'assign'])->name('tickets.assign');
            Route::post('tickets/{ticket}/close', [HelpdeskTicketController::class, 'close'])->name('tickets.close');
            Route::post('tickets/{ticket}/reopen', [HelpdeskTicketController::class, 'reopen'])->name('tickets.reopen');

            Route::resource('damage-reports', DamageReportController::class);
            Route::resource('categories', HelpdeskCategoryController::class)->names('categories');

            // Nested comments under tickets
            Route::resource('tickets.comments', HelpdeskCommentController::class)->only(['index', 'store', 'destroy']);
        });

    // Approvals & Notifications
    Route::resource('approvals', ApprovalController::class);
    Route::post('approvals/{approval}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('approvals/{approval}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');

    Route::resource('notifications', NotificationController::class)->only(['index', 'show', 'destroy']);
    Route::post('notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    // Admin area (roles, permissions, settings)
    Route::prefix('admin')
        ->name('admin.')
        ->middleware(['can:access-admin'])
        ->group(function () {
            Route::resource('settings', SettingsController::class)->only(['index', 'edit', 'update']);
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
        });

    // Theme management
    Route::post('/set-theme', [ThemeController::class, 'setTheme'])->name('set-theme');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
