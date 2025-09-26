<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        // @todo: Implement loan listing with pagination and filtering
        $loans = LoanApplication::with(['user', 'items.equipment'])
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $loans->items(),
            'meta' => [
                'timestamp' => now()->toISOString(),
                'version' => '1.0',
                'pagination' => [
                    'current_page' => $loans->currentPage(),
                    'per_page' => $loans->perPage(),
                    'total' => $loans->total(),
                    'total_pages' => $loans->lastPage(),
                ]
            ],
            'links' => [
                'self' => $request->url(),
                'next' => $loans->nextPageUrl(),
                'prev' => $loans->previousPageUrl(),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // @todo: Implement loan application creation
        return response()->json([
            'success' => true,
            'message' => 'Loan application created successfully',
            'data' => null
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        // @todo: Implement loan application details
        $loan = LoanApplication::with(['user', 'items.equipment'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $loan->id,
                'type' => 'loan_application',
                'attributes' => [
                    'application_number' => 'LA-' . $loan->created_at->format('Y-m-d') . '-' . str_pad($loan->id, 4, '0', STR_PAD_LEFT),
                    'status' => $loan->status,
                    'purpose' => $loan->purpose,
                    'loan_start_date' => $loan->loan_start_date?->format('Y-m-d'),
                    'loan_end_date' => $loan->loan_end_date?->format('Y-m-d')
                ],
                'relationships' => [
                    'user' => [
                        'data' => [
                            'id' => $loan->user->id,
                            'name' => $loan->user->name,
                            'department' => $loan->user->department->name ?? null
                        ]
                    ],
                    'equipment' => [
                        'data' => $loan->items->map(function ($item) {
                            return [
                                'id' => $item->equipment->id,
                                'type' => $item->equipment->asset_type,
                                'brand' => $item->equipment->brand,
                                'model' => $item->equipment->model
                            ];
                        })
                    ]
                ]
            ],
            'meta' => [
                'timestamp' => now()->toISOString(),
                'version' => '1.0'
            ],
            'links' => [
                'self' => request()->url(),
                'related' => route('api.loans.items', $loan->id)
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        // @todo: Implement loan application update
        return response()->json([
            'success' => true,
            'message' => 'Loan application updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        // @todo: Implement loan application deletion
        return response()->json([
            'success' => true,
            'message' => 'Loan application deleted successfully'
        ]);
    }

    /**
     * Get loan application items
     */
    public function items(string $id): JsonResponse
    {
        // @todo: Implement loan application items listing
        return response()->json([
            'success' => true,
            'data' => [],
            'meta' => [
                'timestamp' => now()->toISOString(),
                'version' => '1.0'
            ]
        ]);
    }
}
