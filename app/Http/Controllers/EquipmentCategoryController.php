<?php

namespace App\Http\Controllers;

use App\Models\EquipmentCategory;
use Illuminate\Http\Request;

class EquipmentCategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', EquipmentCategory::class);

        return view('equipment_categories.index');
    }

    public function create()
    {
        $this->authorize('create', EquipmentCategory::class);

        return view('equipment_categories.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', EquipmentCategory::class);

        return redirect()->route('equipment-categories.index');
    }

    public function show(EquipmentCategory $equipmentCategory)
    {
        $this->authorize('view', $equipmentCategory);

        return view('equipment_categories.show', compact('equipmentCategory'));
    }

    public function edit(EquipmentCategory $equipmentCategory)
    {
        $this->authorize('update', $equipmentCategory);

        return view('equipment_categories.edit', compact('equipmentCategory'));
    }

    public function update(Request $request, EquipmentCategory $equipmentCategory)
    {
        $this->authorize('update', $equipmentCategory);

        return redirect()->route('equipment-categories.show', $equipmentCategory);
    }

    public function destroy(EquipmentCategory $equipmentCategory)
    {
        $this->authorize('delete', $equipmentCategory);
        $equipmentCategory->delete();

        return redirect()->route('equipment-categories.index');
    }
}
