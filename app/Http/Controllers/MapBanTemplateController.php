<?php

namespace App\Http\Controllers;

use App\Models\MapBanTemplate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MapBanTemplateController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $templates = MapBanTemplate::all();
        return response()->json($templates);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'templateName' => 'required|string|max:255',
        ]);

        $template = MapBanTemplate::create($validatedData);
        return response()->json($template, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show($id)
    {
        $template = MapBanTemplate::find($id);
        if (!$template) {
            return response()->json(['message' => 'MapBanTemplate not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($template);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $template = MapBanTemplate::find($id);
        if (!$template) {
            return response()->json(['message' => 'MapBanTemplate not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'templateName' => 'sometimes|required|string|max:255',
        ]);

        $template->update($validatedData);
        return response()->json($template);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $template = MapBanTemplate::find($id);
        if (!$template) {
            return response()->json(['message' => 'MapBanTemplate not found'], Response::HTTP_NOT_FOUND);
        }
        $template->delete();
        return response()->json(['message' => 'MapBanTemplate deleted successfully']);
    }
}
