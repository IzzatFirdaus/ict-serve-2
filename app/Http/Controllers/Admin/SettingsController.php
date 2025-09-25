<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', \App\Models\Setting::class);

        /** @var view-string $view */
        $view = 'admin.settings.index';

        return view($view);
    }

    public function edit()
    {
        $this->authorize('update', \App\Models\Setting::class);

        /** @var view-string $view */
        $view = 'admin.settings.edit';

        return view($view);
    }

    public function update(Request $request)
    {
        $this->authorize('update', \App\Models\Setting::class);

        return redirect()->route('admin.settings.index');
    }
}
