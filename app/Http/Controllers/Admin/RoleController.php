<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', \Spatie\Permission\Models\Role::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('admin.roles.index');
    }

    public function create()
    {
        $this->authorize('create', \Spatie\Permission\Models\Role::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', \Spatie\Permission\Models\Role::class);

        return redirect()->route('admin.roles.index');
    }

    public function show($id)
    {
        /** @phpstan-return \Illuminate\View\View */
        return view('admin.roles.show', compact('id'));
    }

    public function edit($id)
    {
        /** @phpstan-return \Illuminate\View\View */
        return view('admin.roles.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.roles.show', $id);
    }

    public function destroy($id)
    {
        return redirect()->route('admin.roles.index');
    }
}
