<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Location::class);

        return view('locations.index');
    }

    public function create()
    {
        $this->authorize('create', Location::class);

        return view('locations.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Location::class);

        return redirect()->route('locations.index');
    }

    public function show(Location $location)
    {
        $this->authorize('view', $location);

        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        $this->authorize('update', $location);

        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $this->authorize('update', $location);

        return redirect()->route('locations.show', $location);
    }

    public function destroy(Location $location)
    {
        $this->authorize('delete', $location);
        $location->delete();

        return redirect()->route('locations.index');
    }
}
