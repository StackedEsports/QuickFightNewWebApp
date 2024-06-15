<?php

namespace App\Http\Controllers;

use App\Models\ProtestTeam;
use Illuminate\Http\Request;

class ProtestTeamController extends Controller
{
    public function index()
    {
        $teams = ProtestTeam::all();
        return response()->json($teams);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'TeamId' => 'required',
            'ProtestId' => 'required',
        ]);

        $team = ProtestTeam::create($validated);
        return response()->json($team, 201);
    }

    public function show($id)
    {
        $team = ProtestTeam::findOrFail($id);
        return response()->json($team);
    }

    public function update(Request $request, $id)
    {
        $team = ProtestTeam::findOrFail($id);

        $validated = $request->validate([
            'TeamId' => 'required',
            'ProtestId' => 'required',
        ]);

        $team->update($validated);
        return response()->json($team);
    }

    public function destroy($id)
    {
        $team = ProtestTeam::findOrFail($id);
        $team->delete();
        return response()->json(null, 204);
    }
}