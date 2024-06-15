<?php

namespace App\Http\Controllers;

use App\Models\LogsClient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogsClientController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $logs = LogsClient::all();
        return response()->json($logs);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'type' => 'required',
            'title' => 'required',
            'clientUsername' => 'required',
            'clientId' => 'required',
            'location' => 'required',
            'data' => 'required',
        ]);

        $log = LogsClient::create($validatedData);
        return response()->json($log, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show($id)
    {
        $log = LogsClient::find($id);
        if (!$log) {
            return response()->json(['message' => 'Log not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($log);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $log = LogsClient::find($id);
        if (!$log) {
            return response()->json(['message' => 'Log not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'status' => 'sometimes|required',
            'type' => 'sometimes|required',
            'title' => 'sometimes|required',
            'clientUsername' => 'sometimes|required',
            'clientId' => 'sometimes|required',
            'location' => 'sometimes|required',
            'data' => 'sometimes|required',
        ]);

        $log->update($validatedData);
        return response()->json($log);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $log = LogsClient::find($id);
        if (!$log) {
            return response()->json(['message' => 'Log not found'], Response::HTTP_NOT_FOUND);
        }
        $log->delete();
        return response()->json(['message' => 'Log deleted successfully']);
    }
} 