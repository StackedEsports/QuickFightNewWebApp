<?php

namespace App\Http\Controllers;

use App\Models\ProtestStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProtestStatusController extends Controller
{
    public function index()
    {
        $statuses = ProtestStatus::all();
        return response()->json($statuses);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'StatusName' => 'required|string|max:255',
        ]);

        $status = ProtestStatus::create($validatedData);
        return response()->json($status, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $status = ProtestStatus::findOrFail($id);
        return response()->json($status);
    }

    public function update(Request $request, $id)
    {
        $status = ProtestStatus::findOrFail($id);

        $validatedData = $request->validate([
            'StatusName' => 'required|string|max:255',
        ]);

        $status->update($validatedData);
        return response()->json($status);
    }

    public function destroy($id)
    {
        $status = ProtestStatus::findOrFail($id);
        $status->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}