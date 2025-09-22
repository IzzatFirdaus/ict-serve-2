<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\LoanApplicationItem;
use Illuminate\Http\Request;

class LoanApplicationItemController extends Controller
{
    public function index(LoanApplication $loan_application)
    {
        $this->authorize('viewAny', LoanApplicationItem::class);
        return view('loan_application_items.index', compact('loan_application'));
    }

    public function store(Request $request, LoanApplication $loan_application)
    {
        $this->authorize('create', LoanApplicationItem::class);
        return redirect()->route('loan-applications.show', $loan_application);
    }

    public function show(LoanApplication $loan_application, LoanApplicationItem $item)
    {
        $this->authorize('view', $item);
        return view('loan_application_items.show', compact('loan_application', 'item'));
    }

    public function destroy(LoanApplication $loan_application, LoanApplicationItem $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        return redirect()->route('loan-applications.show', $loan_application);
    }
}
