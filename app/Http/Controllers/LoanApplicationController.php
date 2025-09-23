<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use Illuminate\Http\Request;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of loan applications.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', LoanApplication::class);

        return view('loan_applications.index');
    }

    /**
     * Show the form for creating a new loan application.
     */
    public function create()
    {
        $this->authorize('create', LoanApplication::class);

        return view('loan_applications.create');
    }

    /**
     * Store a newly created loan application.
     */
    public function store(Request $request)
    {
        $this->authorize('create', LoanApplication::class);

        return redirect()->route('loan-applications.index');
    }

    /**
     * Display the specified loan application.
     */
    public function show(LoanApplication $loan_application)
    {
        $this->authorize('view', $loan_application);

        return view('loan_applications.show', compact('loan_application'));
    }

    /**
     * Show the form for editing the specified loan application.
     */
    public function edit(LoanApplication $loan_application)
    {
        $this->authorize('update', $loan_application);

        return view('loan_applications.edit', compact('loan_application'));
    }

    /**
     * Update the specified loan application.
     */
    public function update(Request $request, LoanApplication $loan_application)
    {
        $this->authorize('update', $loan_application);

        return redirect()->route('loan-applications.show', $loan_application);
    }

    /**
     * Soft delete the specified loan application.
     */
    public function destroy(LoanApplication $loan_application)
    {
        $this->authorize('delete', $loan_application);
        $loan_application->delete();

        return redirect()->route('loan-applications.index');
    }

    /**
     * Submit the loan application (custom action).
     */
    public function submit(LoanApplication $loan_application)
    {
        $this->authorize('submit', $loan_application);

        // business logic via service
        return redirect()->route('loan-applications.show', $loan_application);
    }

    /**
     * Cancel the loan application (custom action).
     */
    public function cancel(LoanApplication $loan_application)
    {
        $this->authorize('cancel', $loan_application);

        return redirect()->route('loan-applications.index');
    }

    /**
     * Export loan application to PDF (custom action).
     */
    public function pdf(LoanApplication $loan_application)
    {
        $this->authorize('view', $loan_application);

        return response()->streamDownload(function () {
            echo 'PDF content';
        }, "loan_application_{$loan_application->id}.pdf");
    }
}
