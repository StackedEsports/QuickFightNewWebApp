<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActualBan;
use Illuminate\Http\Request;

class ActualBanController extends Controller
{
    // Fetch all actual bans
    public function index()
    {
        $actualBans = ActualBan::all();
        return response()->json($actualBans);
    }

    // Store a new actual ban
    public function store(Request $request)
    {
        $actualBan = ActualBan::create($request->all());
        return response()->json($actualBan, 201);
    }

    // Fetch a single actual ban
    public function show($id)
    {
        $actualBan = ActualBan::find($id);
        if (!$actualBan) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($actualBan);
    }

    // Update an actual ban
    public function update(Request $request, $id)
    {
        $actualBan = ActualBan::find($id);
        if (!$actualBan) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $actualBan->update($request->all());
        return response()->json($actualBan);
    }

    // Delete an actual ban
    public function destroy($id)
    {
        $actualBan = ActualBan::find($id);
        if (!$actualBan) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $actualBan->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}