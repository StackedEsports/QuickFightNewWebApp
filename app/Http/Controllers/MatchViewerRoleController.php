<?php

namespace App\Http\Controllers;

use App\Models\MatchViewerRole;
use Illuminate\Http\Request;

class MatchViewerRoleController extends Controller
{
    public function index()
    {
        $viewerRoles = MatchViewerRole::all();
        return response()->json($viewerRoles);
    }

    public function show($id)
    {
        $viewerRole = MatchViewerRole::find($id);
        if (!$viewerRole) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($viewerRole);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'DiscordGuildId' => 'required',
            'GuildRoleId' => 'required',
        ]);

        $viewerRole = MatchViewerRole::create($validatedData);
        return response()->json($viewerRole, 201);
    }

    public function update(Request $request, $id)
    {
        $viewerRole = MatchViewerRole::find($id);
        if (!$viewerRole) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate([
            'DiscordGuildId' => 'required',
            'GuildRoleId' => 'required',
        ]);

        $viewerRole->update($validatedData);
        return response()->json($viewerRole);
    }

    public function destroy($id)
    {
        $viewerRole = MatchViewerRole::find($id);
        if (!$viewerRole) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $viewerRole->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}