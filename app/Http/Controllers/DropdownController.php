<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempimage;
use App\Models\Tourimage;
use Illuminate\Support\Facades\Storage;

class DropdownController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }

    public function uploadImage(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //save in public directory instead of storage
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->store('tours/images', 'public'); // Save in public storage
            $tourImage = Tempimage::create([
                'image' => $path,
            ]);

            return response()->json([
                'id' => $tourImage->id,
                'image_path' => $path,
            ], 200);
        }

        return response()->json(['error' => 'Image upload failed'], 400);
    }
    public function EditImages(Request $request)
    {
        $imageCount = Tourimage::where('tour_id',$request->tour_id)->count();
        if ($imageCount >= 6) {
            return response()->json(['error' => 'Image upload limit of 6 reached'], 400);
        }

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('tours/images', 'public'); // Save in public storage

            // Save the image information in the Tourimage table
            $tourImage = Tourimage::create([
                'image' => $path,
                'tour_id' => $request->tour_id,
            ]);

            return response()->json([
                'id' => $tourImage->id,
                'image_path' => $path,
            ], 200);
        }

        return response()->json(['error' => 'Image upload failed'], 400);
    }

    // Remove image
    public function removeImage(Request $request)
    {
        $imageId = $request->input('id');
        $tourImage = Tempimage::find($imageId);

        if ($tourImage) {
            // Delete file from storage
            Storage::disk('public')->delete($tourImage->image);

            // Delete record from database
            $tourImage->delete();

            return response()->json(['success' => true], 200);
        }
        return response()->json(['error' => 'Image not found'], 404);
    }
    public function removeUploaded(Request $request)
    {
        $imageId = $request->input('id');
        $tourImage = Tourimage::find($imageId);

        if ($tourImage) {
            // Delete file from storage
            Storage::disk('public')->delete($tourImage->image);

            // Delete record from database
            $tourImage->delete();

            return response()->json(['success' => true], 200);
        }
        return response()->json(['error' => 'Image not found'], 404);
    }
}
