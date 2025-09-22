<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', \Spatie\Permission\Models\Permission::class);
        return view('admin.permissions.index');
    }

    public function create()
    {
        $this->authorize('create', \Spatie\Permission\Models\Permission::class);
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', \Spatie\Permission\Models\Permission::class);
        return redirect()->route('admin.permissions.index');
    }

    public function show($id)
    {
        return view('admin.permissions.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.permissions.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.permissions.show', $id);
    }

    public function destroy($id)
    {
        return redirect()->route('admin.permissions.index');
    }
}
