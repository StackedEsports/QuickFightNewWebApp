<?php

namespace App\Http\Controllers;

use App\Models\PlayerOperatorCount;
use Illuminate\Http\Request;

class PlayerOperatorCountController extends Controller
{
    public function index()
    {
        $operatorCounts = PlayerOperatorCount::all();
        return response()->json($operatorCounts);
    }

    public function show($id)
    {
        $operatorCount = PlayerOperatorCount::find($id);
        if (!$operatorCount) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($operatorCount);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'playerId' => 'required',
            'operatorName' => 'required',
            'operatorRole' => 'required',
            'tournamentTeamId' => 'required',
            'ubisoftMatchId' => 'required',
            'tournamentMatchId' => 'required',
            'operatorPickCount' => 'required|integer',
        ]);

        $operatorCount = PlayerOperatorCount::create($validatedData);
        return response()->json($operatorCount, 201);
    }

    public function update(Request $request, $id)
    {
        $operatorCount = PlayerOperatorCount::find($id);
        if (!$operatorCount) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate([
            'playerId' => 'required',
            'operatorName' => 'required',
            'operatorRole' => 'required',
            'tournamentTeamId' => 'required',
            'ubisoftMatchId' => 'required',
            'tournamentMatchId' => 'required',
            'operatorPickCount' => 'required|integer',
        ]);

        $operatorCount->update($validatedData);
        return response()->json($operatorCount);
    }

    public function destroy($id)
    {
        $operatorCount = PlayerOperatorCount::find($id);
        if (!$operatorCount) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $operatorCount->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}