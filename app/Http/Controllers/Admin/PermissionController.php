<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Permission::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('admin.permissions.index');
    }

    public function create()
    {
        $this->authorize('create', Permission::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);

        return redirect()->route('admin.permissions.index');
    }

    public function show($id)
    {
        /** @phpstan-return \Illuminate\View\View */
        return view('admin.permissions.show', compact('id'));
    }

    public function edit($id)
    {
        /** @phpstan-return \Illuminate\View\View */
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
