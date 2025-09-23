<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Grade::class);

        return view('grades.index');
    }

    public function create()
    {
        $this->authorize('create', Grade::class);

        return view('grades.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Grade::class);

        return redirect()->route('grades.index');
    }

    public function show(Grade $grade)
    {
        $this->authorize('view', $grade);

        return view('grades.show', compact('grade'));
    }

    public function edit(Grade $grade)
    {
        $this->authorize('update', $grade);

        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $this->authorize('update', $grade);

        return redirect()->route('grades.show', $grade);
    }

    public function destroy(Grade $grade)
    {
        $this->authorize('delete', $grade);
        $grade->delete();

        return redirect()->route('grades.index');
    }
}
