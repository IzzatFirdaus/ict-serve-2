<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Position::class);
        return view('positions.index');
    }

    public function create()
    {
        $this->authorize('create', Position::class);
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Position::class);
        return redirect()->route('positions.index');
    }

    public function show(Position $position)
    {
        $this->authorize('view', $position);
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        $this->authorize('update', $position);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $this->authorize('update', $position);
        return redirect()->route('positions.show', $position);
    }

    public function destroy(Position $position)
    {
        $this->authorize('delete', $position);
        $position->delete();
        return redirect()->route('positions.index');
    }
}
