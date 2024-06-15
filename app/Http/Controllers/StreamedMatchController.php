<?php

namespace App\Http\Controllers;

use App\Models\StreamedMatch;
use Illuminate\Http\Request;

class StreamedMatchController extends Controller
{
    public function index()
    {
        $matches = StreamedMatch::all();
        return response()->json($matches);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ToornamentMatchId' => 'required|string|unique:tblStreamedMatch,ToornamentMatchId',
            'AverageViewers' => 'required|integer',
        ]);

        $match = StreamedMatch::create($validated);
        return response()->json($match, 201);
    }

    public function show($id)
    {
        $match = StreamedMatch::findOrFail($id);
        return response()->json($match);
    }

    public function update(Request $request, $id)
    {
        $match = StreamedMatch::findOrFail($id);

        $validated = $request->validate([
            'AverageViewers' => 'required|integer',
        ]);

        $match->update($validated);
        return response()->json($match);
    }

    public function destroy($id)
    {
        $match = StreamedMatch::findOrFail($id);
        $match->delete();
        return response()->json(null, 204);
    }
}