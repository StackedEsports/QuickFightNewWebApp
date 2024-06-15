<?php

namespace App\Http\Controllers;

use App\Models\TournamentMinCorePlayer;
use Illuminate\Http\Request;

class TournamentMinCorePlayerController extends Controller
{
    public function index()
    {
        $players = TournamentMinCorePlayer::all();
        return response()->json($players);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ToornamentTournamentID' => 'required|string|unique:tblTournamentMinCorePlayers,ToornamentTournamentID',
            'MinCorePlayers' => 'required|integer',
        ]);

        $player = TournamentMinCorePlayer::create($validated);
        return response()->json($player, 201);
    }

    public function show($id)
    {
        $player = TournamentMinCorePlayer::findOrFail($id);
        return response()->json($player);
    }

    public function update(Request $request, $id)
    {
        $player = TournamentMinCorePlayer::findOrFail($id);

        $validated = $request->validate([
            'MinCorePlayers' => 'required|integer',
        ]);

        $player->update($validated);
        return response()->json($player);
    }

    public function destroy($id)
    {
        $player = TournamentMinCorePlayer::findOrFail($id);
        $player->delete();
        return response()->json(null, 204);
    }
}