<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', \App\Models\Setting::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('admin.settings.index');
    }

    public function edit()
    {
        $this->authorize('update', \App\Models\Setting::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('admin.settings.edit');
    }

    public function update(Request $request)
    {
        $this->authorize('update', \App\Models\Setting::class);

        return redirect()->route('admin.settings.index');
    }
}
