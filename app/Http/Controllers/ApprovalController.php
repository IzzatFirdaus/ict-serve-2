<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Approval::class);
        return view('approvals.index');
    }

    public function create()
    {
        $this->authorize('create', Approval::class);
        return view('approvals.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Approval::class);
        return redirect()->route('approvals.index');
    }

    public function show(Approval $approval)
    {
        $this->authorize('view', $approval);
        return view('approvals.show', compact('approval'));
    }

    public function edit(Approval $approval)
    {
        $this->authorize('update', $approval);
        return view('approvals.edit', compact('approval'));
    }

    public function update(Request $request, Approval $approval)
    {
        $this->authorize('update', $approval);
        return redirect()->route('approvals.show', $approval);
    }

    public function destroy(Approval $approval)
    {
        $this->authorize('delete', $approval);
        $approval->delete();
        return redirect()->route('approvals.index');
    }

    public function approve(Approval $approval)
    {
        $this->authorize('approve', $approval);
        return redirect()->route('approvals.show', $approval);
    }

    public function reject(Approval $approval)
    {
        $this->authorize('reject', $approval);
        return redirect()->route('approvals.show', $approval);
    }
}
