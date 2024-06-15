<?php

namespace App\Http\Controllers;

use App\Models\TournamentTeam;
use Illuminate\Http\Request;

class TournamentTeamController extends Controller
{
    public function index()
    {
        $teams = TournamentTeam::all();
        return response()->json($teams);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'toornamentTeamId' => 'required|string|unique:tblTournamentTeam,toornamentTeamId',
            'toornamentTournamentId' => 'required|string',
            'discordTeamRoleId' => 'nullable|string',
            'discordTeamChannelId' => 'nullable|string',
            'discordTeamVoiceChannelId' => 'nullable|string',
            'teamLogo' => 'nullable|string',
        ]);

        $team = TournamentTeam::create($validated);
        return response()->json($team, 201);
    }

    public function show($id)
    {
        $team = TournamentTeam::findOrFail($id);
        return response()->json($team);
    }

    public function update(Request $request, $id)
    {
        $team = TournamentTeam::findOrFail($id);

        $validated = $request->validate([
            'toornamentTournamentId' => 'required|string',
            'discordTeamRoleId' => 'nullable|string',
            'discordTeamChannelId' => 'nullable|string',
            'discordTeamVoiceChannelId' => 'nullable|string',
            'teamLogo' => 'nullable|string',
        ]);

        $team->update($validated);
        return response()->json($team);
    }

    public function destroy($id)
    {
        $team = TournamentTeam::findOrFail($id);
        $team->delete();
        return response()->json(null, 204);
    }
}