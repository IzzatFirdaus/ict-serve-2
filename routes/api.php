<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\EquipmentController;
use App\Http\Controllers\Api\HelpdeskTicketController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API v1 routes with authentication
Route::prefix('v1')->middleware(['auth:sanctum', 'throttle:api'])->group(function () {

    // Loan management endpoints
    Route::apiResource('loans', LoanController::class);
    Route::get('loans/{id}/items', [LoanController::class, 'items']);

    // Equipment endpoints
    Route::get('equipment', [EquipmentController::class, 'index']);
    Route::get('equipment/{id}', [EquipmentController::class, 'show']);

    // Helpdesk ticket endpoints
    Route::apiResource('tickets', HelpdeskTicketController::class);
    Route::put('tickets/{id}/assign', [HelpdeskTicketController::class, 'assign']);
    Route::put('tickets/{id}/resolve', [HelpdeskTicketController::class, 'resolve']);

    // User profile endpoints
    Route::get('users/profile', [UserController::class, 'profile']);
    Route::put('users/profile', [UserController::class, 'updateProfile']);

    // Report endpoints
    Route::get('reports/{type}', [ReportController::class, 'generate']);
    Route::get('reports/{type}/export', [ReportController::class, 'export']);
});
