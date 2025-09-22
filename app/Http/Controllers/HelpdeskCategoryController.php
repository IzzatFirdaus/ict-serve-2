<?php

namespace App\Http\Controllers;

use App\Models\HelpdeskCategory;
use Illuminate\Http\Request;

class HelpdeskCategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', HelpdeskCategory::class);
        return view('helpdesk.categories.index');
    }

    public function create()
    {
        $this->authorize('create', HelpdeskCategory::class);
        return view('helpdesk.categories.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', HelpdeskCategory::class);
        return redirect()->route('helpdesk.categories.index');
    }

    public function show(HelpdeskCategory $helpdeskCategory)
    {
        $this->authorize('view', $helpdeskCategory);
        return view('helpdesk.categories.show', compact('helpdeskCategory'));
    }

    public function edit(HelpdeskCategory $helpdeskCategory)
    {
        $this->authorize('update', $helpdeskCategory);
        return view('helpdesk.categories.edit', compact('helpdeskCategory'));
    }

    public function update(Request $request, HelpdeskCategory $helpdeskCategory)
    {
        $this->authorize('update', $helpdeskCategory);
        return redirect()->route('helpdesk.categories.show', $helpdeskCategory);
    }

    public function destroy(HelpdeskCategory $helpdeskCategory)
    {
        $this->authorize('delete', $helpdeskCategory);
        $helpdeskCategory->delete();
        return redirect()->route('helpdesk.categories.index');
    }
}
