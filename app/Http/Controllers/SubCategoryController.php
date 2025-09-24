<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', SubCategory::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('sub_categories.index');
    }

    public function create()
    {
        $this->authorize('create', SubCategory::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('sub_categories.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', SubCategory::class);

        return redirect()->route('sub-categories.index');
    }

    public function show(SubCategory $subCategory)
    {
        $this->authorize('view', $subCategory);

        /** @phpstan-return \Illuminate\View\View */
        return view('sub_categories.show', compact('subCategory'));
    }

    public function edit(SubCategory $subCategory)
    {
        $this->authorize('update', $subCategory);

        /** @phpstan-return \Illuminate\View\View */
        return view('sub_categories.edit', compact('subCategory'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $this->authorize('update', $subCategory);

        return redirect()->route('sub-categories.show', $subCategory);
    }

    public function destroy(SubCategory $subCategory)
    {
        $this->authorize('delete', $subCategory);
        $subCategory->delete();

        return redirect()->route('sub-categories.index');
    }
}
