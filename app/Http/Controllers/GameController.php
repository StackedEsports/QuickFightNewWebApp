<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $game = Game::create($request->all());
        return response()->json($game, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show($id)
    {
        $game = Game::find($id);
        if (!$game) {
            return response()->json(['message' => 'Game not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($game);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $game = Game::find($id);
        if (!$game) {
            return response()->json(['message' => 'Game not found'], Response::HTTP_NOT_FOUND);
        }
        $game->update($request->all());
        return response()->json($game);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $game = Game::find($id);
        if (!$game) {
            return response()->json(['message' => 'Game not found'], Response::HTTP_NOT_FOUND);
        }
        $game->delete();
        return response()->json(['message' => 'Game deleted successfully']);
    }
}