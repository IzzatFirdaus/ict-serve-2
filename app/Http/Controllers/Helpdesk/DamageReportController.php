<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\DamageReport;
use Illuminate\Http\Request;

class DamageReportController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', DamageReport::class);
        return view('helpdesk.damage_reports.index');
    }

    public function create()
    {
        $this->authorize('create', DamageReport::class);
        return view('helpdesk.damage_reports.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', DamageReport::class);
        return redirect()->route('helpdesk.damage-reports.index');
    }

    public function show(DamageReport $damageReport)
    {
        $this->authorize('view', $damageReport);
        return view('helpdesk.damage_reports.show', compact('damageReport'));
    }

    public function edit(DamageReport $damageReport)
    {
        $this->authorize('update', $damageReport);
        return view('helpdesk.damage_reports.edit', compact('damageReport'));
    }

    public function update(Request $request, DamageReport $damageReport)
    {
        $this->authorize('update', $damageReport);
        return redirect()->route('helpdesk.damage-reports.show', $damageReport);
    }

    public function destroy(DamageReport $damageReport)
    {
        $this->authorize('delete', $damageReport);
        $damageReport->delete();
        return redirect()->route('helpdesk.damage-reports.index');
    }
}
