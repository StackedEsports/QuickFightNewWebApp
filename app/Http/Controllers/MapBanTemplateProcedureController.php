<?php

namespace App\Http\Controllers;

use App\Models\MapBanTemplateProcedure;
use Illuminate\Http\Request;

class MapBanTemplateProcedureController extends Controller
{
    public function index()
    {
        $procedures = MapBanTemplateProcedure::all();
        return response()->json($procedures);
    }

    public function show($id)
    {
        $procedure = MapBanTemplateProcedure::find($id);
        if (!$procedure) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($procedure);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'templateId' => 'required',
            'procedureStep' => 'required',
            'actionId' => 'required',
            'actionOn' => 'required',
            'actionBy' => 'required',
        ]);

        $procedure = MapBanTemplateProcedure::create($validatedData);
        return response()->json($procedure, 201);
    }

    public function update(Request $request, $id)
    {
        $procedure = MapBanTemplateProcedure::find($id);
        if (!$procedure) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate([
            'templateId' => 'required',
            'procedureStep' => 'required',
            'actionId' => 'required',
            'actionOn' => 'required',
            'actionBy' => 'required',
        ]);

        $procedure->update($validatedData);
        return response()->json($procedure);
    }

    public function destroy($id)
    {
        $procedure = MapBanTemplateProcedure::find($id);
        if (!$procedure) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $procedure->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}