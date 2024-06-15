<?php

namespace App\Http\Controllers;

use App\Models\MapBanSession;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MapBanSessionController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $sessions = MapBanSession::with('template')->get();
        return response()->json($sessions);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'templateId' => 'required|exists:tblMapBanTemplate,templateId',
            'discordChannelId' => 'required|string|max:255',
            'discordMessageId' => 'required|string|max:255',
        ]);

        $session = MapBanSession::create($validatedData);
        return response()->json($session, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show($id)
    {
        $session = MapBanSession::with('template')->find($id);
        if (!$session) {
            return response()->json(['message' => 'MapBanSession not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($session);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $session = MapBanSession::find($id);
        if (!$session) {
            return response()->json(['message' => 'MapBanSession not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'templateId' => 'sometimes|required|exists:tblMapBanTemplate,templateId',
            'discordChannelId' => 'sometimes|required|string|max:255',
            'discordMessageId' => 'sometimes|required|string|max:255',
        ]);

        $session->update($validatedData);
        return response()->json($session);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $session = MapBanSession::find($id);
        if (!$session) {
            return response()->json(['message' => 'MapBanSession not found'], Response::HTTP_NOT_FOUND);
        }
        $session->delete();
        return response()->json(['message' => 'MapBanSession deleted successfully']);
    }
}