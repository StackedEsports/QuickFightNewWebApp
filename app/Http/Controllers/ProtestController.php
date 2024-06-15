<?php

namespace App\Http\Controllers;

use App\Models\Protest;
use Illuminate\Http\Request;

class ProtestController extends Controller
{
    public function index()
    {
        $protests = Protest::all();
        return response()->json($protests);
    }

    public function show($id)
    {
        $protest = Protest::find($id);
        if (!$protest) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($protest);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'DiscordGuildId' => 'required',
            'DiscordChannelId' => 'required',
            'MessageID' => 'required',
            'OpenedBy' => 'required',
            'Reason' => 'required',
            'admin_in_charge' => 'sometimes',
            'status' => 'required',
        ]);

        $protest = Protest::create($validatedData);
        return response()->json($protest, 201);
    }

    public function update(Request $request, $id)
    {
        $protest = Protest::find($id);
        if (!$protest) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate([
            'DiscordGuildId' => 'required',
            'DiscordChannelId' => 'required',
            'MessageID' => 'required',
            'OpenedBy' => 'required',
            'Reason' => 'required',
            'admin_in_charge' => 'sometimes',
            'status' => 'required',
        ]);

        $protest->update($validatedData);
        return response()->json($protest);
    }

    public function destroy($id)
    {
        $protest = Protest::find($id);
        if (!$protest) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $protest->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}