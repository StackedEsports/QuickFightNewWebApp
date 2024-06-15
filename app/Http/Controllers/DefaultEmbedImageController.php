<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DefaultEmbedImage;
use Illuminate\Http\Request;

class DefaultEmbedImageController extends Controller
{
    // Display a listing of the images.
    public function index()
    {
        $images = DefaultEmbedImage::all();
        return response()->json($images);
    }

    // Store a newly created image in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'url' => 'required|unique:tblDefaultEmbedImage,url',
            'name' => 'required|unique:tblDefaultEmbedImage,name',
        ]);

        $image = DefaultEmbedImage::create($validatedData);
        return response()->json($image, 201);
    }

    // Display the specified image.
    public function show($id)
    {
        $image = DefaultEmbedImage::find($id);
        if (!$image) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return response()->json($image);
    }

    // Update the specified image in storage.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'url' => 'required|unique:tblDefaultEmbedImage,url,' . $id . ',defaultImageId',
            'name' => 'required|unique:tblDefaultEmbedImage,name,' . $id . ',defaultImageId',
        ]);

        $image = DefaultEmbedImage::find($id);
        if (!$image) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $image->update($validatedData);
        return response()->json($image);
    }

    // Remove the specified image from storage.
    public function destroy($id)
    {
        $image = DefaultEmbedImage::find($id);
        if (!$image) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $image->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}