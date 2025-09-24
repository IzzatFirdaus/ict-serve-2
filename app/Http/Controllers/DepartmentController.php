<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Department::class);

        return \view('departments.index');
    }

    public function create()
    {
        $this->authorize('create', Department::class);

        return \view('departments.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Department::class);

        return redirect()->route('departments.index');
    }

    public function show(Department $department)
    {
        $this->authorize('view', $department);

        return \view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        $this->authorize('update', $department);

        return \view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $this->authorize('update', $department);

        return redirect()->route('departments.show', $department);
    }

    public function destroy(Department $department)
    {
        $this->authorize('delete', $department);
        $department->delete();

        return redirect()->route('departments.index');
    }
}
