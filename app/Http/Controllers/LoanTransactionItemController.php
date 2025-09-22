<?php

namespace App\Http\Controllers;

use App\Models\LoanTransaction;
use App\Models\LoanTransactionItem;
use Illuminate\Http\Request;

class LoanTransactionItemController extends Controller
{
    public function index(LoanTransaction $loan_transaction)
    {
        $this->authorize('viewAny', LoanTransactionItem::class);
        return view('loan_transaction_items.index', compact('loan_transaction'));
    }

    public function store(Request $request, LoanTransaction $loan_transaction)
    {
        $this->authorize('create', LoanTransactionItem::class);
        return redirect()->route('loan-transactions.show', $loan_transaction);
    }

    public function show(LoanTransaction $loan_transaction, LoanTransactionItem $item)
    {
        $this->authorize('view', $item);
        return view('loan_transaction_items.show', compact('loan_transaction', 'item'));
    }

    public function destroy(LoanTransaction $loan_transaction, LoanTransactionItem $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        return redirect()->route('loan-transactions.show', $loan_transaction);
    }
}
