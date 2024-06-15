<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MapController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $maps = Map::with('game')->get();
        return response()->json($maps);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gameId' => 'required|exists:tblGame,gameId',
            'mapName' => 'required|string|max:255',
        ]);

        $map = Map::create($validatedData);
        return response()->json($map, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show($id)
    {
        $map = Map::with('game')->find($id);
        if (!$map) {
            return response()->json(['message' => 'Map not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($map);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $map = Map::find($id);
        if (!$map) {
            return response()->json(['message' => 'Map not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'gameId' => 'sometimes|required|exists:tblGame,gameId',
            'mapName' => 'sometimes|required|string|max:255',
        ]);

        $map->update($validatedData);
        return response()->json($map);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $map = Map::find($id);
        if (!$map) {
            return response()->json(['message' => 'Map not found'], Response::HTTP_NOT_FOUND);
        }
        $map->delete();
        return response()->json(['message' => 'Map deleted successfully']);
    }
}