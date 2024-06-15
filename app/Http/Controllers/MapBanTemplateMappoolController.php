<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MapBanTemplateMappool;
use Illuminate\Http\Request;

class MapBanTemplateMappoolController extends Controller
{
    public function index()
    {
        $mappools = MapBanTemplateMappool::all();
        return response()->json($mappools);
    }

    public function show($id)
    {
        $mappool = MapBanTemplateMappool::find($id);
        if (!$mappool) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($mappool);
    }

    public function store(Request $request)
    {
        $mappool = MapBanTemplateMappool::create($request->all());
        return response()->json($mappool, 201);
    }

    public function update(Request $request, $id)
    {
        $mappool = MapBanTemplateMappool::find($id);
        if (!$mappool) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $mappool->update($request->all());
        return response()->json($mappool);
    }

    public function destroy($id)
    {
        $mappool = MapBanTemplateMappool::find($id);
        if (!$mappool) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        $mappool->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}