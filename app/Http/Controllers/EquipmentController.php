<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Equipment::class);
        return view('equipment.index');
    }

    public function create()
    {
        $this->authorize('create', Equipment::class);
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Equipment::class);
        return redirect()->route('equipment.index');
    }

    public function show(Equipment $equipment)
    {
        $this->authorize('view', $equipment);
        return view('equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        $this->authorize('update', $equipment);
        return view('equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $this->authorize('update', $equipment);
        return redirect()->route('equipment.show', $equipment);
    }

    public function destroy(Equipment $equipment)
    {
        $this->authorize('delete', $equipment);
        $equipment->delete();
        return redirect()->route('equipment.index');
    }

    /**
     * Display history for an equipment item.
     */
    public function history(Equipment $equipment)
    {
        $this->authorize('view', $equipment);
        return view('equipment.history', compact('equipment'));
    }
}
