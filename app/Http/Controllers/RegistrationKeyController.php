<?php

namespace App\Http\Controllers;

use App\Models\RegistrationKey;
use Illuminate\Http\Request;

class RegistrationKeyController extends Controller
{
    public function index()
    {
        $keys = RegistrationKey::all();
        return response()->json($keys);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'KeyValue' => 'required|string',
            'KeyUsed' => 'required|boolean',
            'UsedByDiscordUserId' => 'nullable|string',
            'UsedAt' => 'nullable|date',
            'TeamCreatedAt' => 'nullable|date',
            'AssociatedTournament' => 'nullable|string',
        ]);

        $key = RegistrationKey::create($validated);
        return response()->json($key, 201);
    }

    public function show($id)
    {
        $key = RegistrationKey::findOrFail($id);
        return response()->json($key);
    }

    public function update(Request $request, $id)
    {
        $key = RegistrationKey::findOrFail($id);

        $validated = $request->validate([
            'KeyValue' => 'required|string',
            'KeyUsed' => 'required|boolean',
            'UsedByDiscordUserId' => 'nullable|string',
            'UsedAt' => 'nullable|date',
            'TeamCreatedAt' => 'nullable|date',
            'AssociatedTournament' => 'nullable|string',
        ]);

        $key->update($validated);
        return response()->json($key);
    }

    public function destroy($id)
    {
        $key = RegistrationKey::findOrFail($id);
        $key->delete();
        return response()->json(null, 204);
    }
}