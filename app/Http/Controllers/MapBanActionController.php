<?php

namespace App\Http\Controllers;

use App\Models\MapBanAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MapBanActionController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $actions = MapBanAction::all();
        return response()->json($actions);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'actionName' => 'required|string|max:255',
            'actionPastTense' => 'required|string|max:255',
        ]);

        $action = MapBanAction::create($validatedData);
        return response()->json($action, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show($id)
    {
        $action = MapBanAction::find($id);
        if (!$action) {
            return response()->json(['message' => 'MapBanAction not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($action);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $action = MapBanAction::find($id);
        if (!$action) {
            return response()->json(['message' => 'MapBanAction not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'actionName' => 'sometimes|required|string|max:255',
            'actionPastTense' => 'sometimes|required|string|max:255',
        ]);

        $action->update($validatedData);
        return response()->json($action);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $action = MapBanAction::find($id);
        if (!$action) {
            return response()->json(['message' => 'MapBanAction not found'], Response::HTTP_NOT_FOUND);
        }
        $action->delete();
        return response()->json(['message' => 'MapBanAction deleted successfully']);
    }
}