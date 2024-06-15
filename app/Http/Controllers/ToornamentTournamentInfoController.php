<?php

namespace App\Http\Controllers;

use App\Models\ToornamentTournamentInfo;
use Illuminate\Http\Request;

class ToornamentTournamentInfoController extends Controller
{
    public function index()
    {
        $tournaments = ToornamentTournamentInfo::all();
        return response()->json($tournaments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ToornamentTournamentID' => 'required|string|unique:tblToornamentTournamentInfo,ToornamentTournamentID',
            'RostersLocked' => 'required|boolean',
            'CorePlayersSystemsUsed' => 'required|boolean',
            'NewMatchText' => 'nullable|string',
            'mapBanTemplateUsed' => 'nullable|string',
            'ChatRestrictedToCaptains' => 'required|boolean',
            'CreateTeamVC' => 'required|boolean',
        ]);

        $tournamentInfo = ToornamentTournamentInfo::create($validated);
        return response()->json($tournamentInfo, 201);
    }

    public function show($id)
    {
        $tournamentInfo = ToornamentTournamentInfo::findOrFail($id);
        return response()->json($tournamentInfo);
    }

    public function update(Request $request, $id)
    {
        $tournamentInfo = ToornamentTournamentInfo::findOrFail($id);

        $validated = $request->validate([
            'RostersLocked' => 'required|boolean',
            'CorePlayersSystemsUsed' => 'required|boolean',
            'NewMatchText' => 'nullable|string',
            'mapBanTemplateUsed' => 'nullable|string',
            'ChatRestrictedToCaptains' => 'required|boolean',
            'CreateTeamVC' => 'required|boolean',
        ]);

        $tournamentInfo->update($validated);
        return response()->json($tournamentInfo);
    }

    public function destroy($id)
    {
        $tournamentInfo = ToornamentTournamentInfo::findOrFail($id);
        $tournamentInfo->delete();
        return response()->json(null, 204);
    }
}