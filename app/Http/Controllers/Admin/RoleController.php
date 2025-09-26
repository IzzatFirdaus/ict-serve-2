<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', \Spatie\Permission\Models\Role::class);

        /** @var view-string $view */
        $view = 'admin.roles.index';

        return view($view);
    }

    public function create()
    {
        $this->authorize('create', \Spatie\Permission\Models\Role::class);

        /** @var view-string $view */
        $view = 'admin.roles.create';

        return view($view);
    }

    public function store(Request $request)
    {
        $this->authorize('create', \Spatie\Permission\Models\Role::class);

        return redirect()->route('admin.roles.index');
    }

    public function show($id)
    {
        /** @var view-string $view */
        $view = 'admin.roles.show';

        return view($view, compact('id'));
    }

    public function edit($id)
    {
        /** @var view-string $view */
        $view = 'admin.roles.edit';

        return view($view, compact('id'));
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
