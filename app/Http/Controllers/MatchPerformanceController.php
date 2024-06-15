<?php

namespace App\Http\Controllers;

use App\Models\MatchPerformance;
use Illuminate\Http\Request;

class MatchPerformanceController extends Controller
{
    public function index()
    {
        $performances = MatchPerformance::all();
        return response()->json($performances);
    }

    public function show($id)
    {
        $performance = MatchPerformance::find($id);
        if (!$performance) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($performance);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Add your validation rules here
            'username' => 'required',
            // Continue for other fields as necessary
        ]);

        $performance = MatchPerformance::create($validatedData);
        return response()->json($performance, 201);
    }

    public function update(Request $request, $id)
    {
        $performance = MatchPerformance::find($id);
        if (!$performance) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate([
            // Add your validation rules here
            'username' => 'required',
            // Continue for other fields as necessary
        ]);

        $performance->update($validatedData);
        return response()->json($performance);
    }

    public function destroy($id)
    {
        $performance = MatchPerformance::find($id);
        if (!$performance) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $performance->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}