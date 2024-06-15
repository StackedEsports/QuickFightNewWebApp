<?php

namespace App\Http\Controllers;

use App\Models\ProtestUpdate;
use Illuminate\Http\Request;

class ProtestUpdateController extends Controller
{
    public function index()
    {
        $updates = ProtestUpdate::all();
        return response()->json($updates);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProtestId' => 'required',
            'CurrentStatusId' => 'required',
            'AdminInCharge' => 'required',
            'UpdateTime' => 'required|date',
        ]);

        $update = ProtestUpdate::create($validated);
        return response()->json($update, 201);
    }

    public function show($id)
    {
        $update = ProtestUpdate::findOrFail($id);
        return response()->json($update);
    }

    public function update(Request $request, $id)
    {
        $update = ProtestUpdate::findOrFail($id);

        $validated = $request->validate([
            'ProtestId' => 'required',
            'CurrentStatusId' => 'required',
            'AdminInCharge' => 'required',
            'UpdateTime' => 'required|date',
        ]);

        $update->update($validated);
        return response()->json($update);
    }

    public function destroy($id)
    {
        $update = ProtestUpdate::findOrFail($id);
        $update->delete();
        return response()->json(null, 204);
    }
}
