<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DiscordGuild;
use Illuminate\Http\Request;

class DiscordGuildController extends Controller
{
    // Display a listing of the guilds.
    public function index()
    {
        $guilds = DiscordGuild::all();
        return response()->json($guilds);
    }

    // Store a newly created guild in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Add your validation rules here
        ]);

        $guild = DiscordGuild::create($validatedData);
        return response()->json($guild, 201);
    }

    // Display the specified guild.
    public function show($id)
    {
        $guild = DiscordGuild::find($id);
        if (!$guild) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($guild);
    }

    // Update the specified guild in storage.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Add your validation rules here
        ]);

        $guild = DiscordGuild::find($id);
        if (!$guild) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $guild->update($validatedData);
        return response()->json($guild);
    }

    // Remove the specified guild from storage.
    public function destroy($id)
    {
        $guild = DiscordGuild::find($id);
        if (!$guild) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $guild->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}