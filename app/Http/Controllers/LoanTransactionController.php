<?php

namespace App\Http\Controllers;

use App\Models\LoanTransaction;
use Illuminate\Http\Request;

class LoanTransactionController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', LoanTransaction::class);

        return view('loan_transactions.index');
    }

    public function create()
    {
        $this->authorize('create', LoanTransaction::class);

        return view('loan_transactions.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', LoanTransaction::class);

        return redirect()->route('loan-transactions.index');
    }

    public function show(LoanTransaction $loan_transaction)
    {
        $this->authorize('view', $loan_transaction);

        return view('loan_transactions.show', compact('loan_transaction'));
    }

    public function edit(LoanTransaction $loan_transaction)
    {
        $this->authorize('update', $loan_transaction);

        return view('loan_transactions.edit', compact('loan_transaction'));
    }

    public function update(Request $request, LoanTransaction $loan_transaction)
    {
        $this->authorize('update', $loan_transaction);

        return redirect()->route('loan-transactions.show', $loan_transaction);
    }

    public function destroy(LoanTransaction $loan_transaction)
    {
        $this->authorize('delete', $loan_transaction);
        $loan_transaction->delete();

        return redirect()->route('loan-transactions.index');
    }

    /**
     * Process issuance/return of items.
     */
    public function process(LoanTransaction $loan_transaction)
    {
        $this->authorize('process', $loan_transaction);

        return redirect()->route('loan-transactions.show', $loan_transaction);
    }
}
