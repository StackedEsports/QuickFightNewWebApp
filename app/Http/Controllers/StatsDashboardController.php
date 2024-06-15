<?php

namespace App\Http\Controllers;

use App\Models\StatsDashboard;
use Illuminate\Http\Request;

class StatsDashboardController extends Controller
{
    public function index()
    {
        $stats = StatsDashboard::all();
        return response()->json($stats);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PlayerTag' => 'required|string|unique:tblStatsDashboard,PlayerTag',
            'TeamId' => 'required|integer',
            'PlayerUplay' => 'nullable|string',
            'PlayerVisible' => 'required|boolean',
            'PlayerUplayLogo' => 'nullable|string',
        ]);

        $stat = StatsDashboard::create($validated);
        return response()->json($stat, 201);
    }

    public function show($id)
    {
        $stat = StatsDashboard::findOrFail($id);
        return response()->json($stat);
    }

    public function update(Request $request, $id)
    {
        $stat = StatsDashboard::findOrFail($id);

        $validated = $request->validate([
            'TeamId' => 'required|integer',
            'PlayerUplay' => 'nullable|string',
            'PlayerVisible' => 'required|boolean',
            'PlayerUplayLogo' => 'nullable|string',
        ]);

        $stat->update($validated);
        return response()->json($stat);
    }

    public function destroy($id)
    {
        $stat = StatsDashboard::findOrFail($id);
        $stat->delete();
        return response()->json(null, 204);
    }
}
