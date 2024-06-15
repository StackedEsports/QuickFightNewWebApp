<?php

namespace App\Http\Controllers;

use App\Models\MatchChannel;
use Illuminate\Http\Request;

class MatchChannelController extends Controller
{
    public function index()
    {
        $channels = MatchChannel::all();
        return response()->json($channels);
    }

    public function show($id)
    {
        $channel = MatchChannel::find($id);
        if (!$channel) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($channel);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'DiscordChannelId' => 'required|unique:tblMatchChannel,DiscordChannelId',
            'ToornamentMatchId' => 'required',
            'ChatArchive' => 'sometimes',
        ]);

        $channel = MatchChannel::create($validatedData);
        return response()->json($channel, 201);
    }

    public function update(Request $request, $id)
    {
        $channel = MatchChannel::find($id);
        if (!$channel) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate([
            'ToornamentMatchId' => 'required',
            'ChatArchive' => 'sometimes',
        ]);

        $channel->update($validatedData);
        return response()->json($channel);
    }

    public function destroy($id)
    {
        $channel = MatchChannel::find($id);
        if (!$channel) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $channel->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}