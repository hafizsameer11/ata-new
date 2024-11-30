<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use App\Models\Tempimage;
use App\Models\Tour;
use App\Models\Tourimage;
use App\Models\Tourplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::with('images', 'country')->get();
        return view('Admin.Tour.list', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
        return view('Admin.Tour.create.detail', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:50',
            'max_member' => 'required|integer|min:1',
            'min_age' => 'required|integer|min:0',
            'tour_type' => 'required|string|max:100',
            'include' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'plan_name' => 'required|array|min:1',
            'plan_name.*' => 'required|string|max:255',
            'plan_description' => 'required|array|min:1',
            'plan_description.*' => 'required|string',
            'city_id' => 'required|array|min:1',
            'city_id.*' => 'required|exists:cities,id',
            'images' => 'nullable|array',
            'images.*' => 'required|string',
            'single_room' => 'required|string',
            'twin_room' => 'required|string',
            'child_room' => 'required|string',
        ]);

        // Create the main tour
        $tour = Tour::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'max_member' => $request->max_member,
            'min_age' => $request->min_age,
            'tour_type' => $request->tour_type,
            'include' => $request->include,
            'country_id' => $request->country_id,
            'single_room' => $request->single_room,
            'twin_room' => $request->twin_room,
            'child_room' => $request->child_room,
        ]);

        // Save the tour plans
        foreach ($request->plan_name as $index => $planName) {
            Tourplan::create([
                'tour_id' => $tour->id,
                'name' => $planName,
                'description' => $request->plan_description[$index],
                'city_id' => $request->city_id[$index],
            ]);
        }

        // Save uploaded images (if any)
        if ($request->has('images')) {
            foreach ($request->images as $imageId) {
                Tourimage::create([
                    'tour_id' => $tour->id,
                    'image' => $imageId,
                ]);
            }
        }
        Tempimage::where('status', 0)->delete();
        // Return success response
        return response()->json([
            'message' => 'Tour and plans added successfully.',
            'tour_id' => $tour->id,
        ], 201);

    }
    public function imagesUpload($id)
    {
        $tour = Tour::with('images')->find($id);
        return view('Admin.Tour.create.ImagesUpload', compact('tour'));
    }
    public function plans($id)
    {
        $tour = Tour::with('plans.cities')->find($id);
        $cities = City::where([['countryID', $tour->country_id], ['status', 1]])->get();
        return view('Admin.Tour.create.plan', compact('tour', 'cities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tour = Tour::with('images', 'plans.cities', 'country')->find($id);
        return view('Admin.Tour.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $countries = Country::where('status', 1)->get();
        return view('Admin.Tour.edit', compact('countries', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:50',
            'max_member' => 'required|integer|min:1',
            'min_age' => 'required|integer|min:0',
            'tour_type' => 'required|string|max:100',
            'include' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'single_room' => 'required|string',
            'twin_room' => 'required|string',
            'child_room' => 'required|string',
        ]);

        $tour->update([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'max_member' => $request->max_member,
            'min_age' => $request->min_age,
            'tour_type' => $request->tour_type,
            'include' => $request->include,
            'country_id' => $request->country_id,
            'single_room' => $request->single_room,
            'twin_room' => $request->twin_room,
            'child_room' => $request->child_room,
        ]);
        return response()->json([
            'message' => 'Tour and plans added successfully.',
            'tour_id' => $tour->id,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = Tour::with('images')->findOrFail($id);

        foreach ($tour->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }
        $tour->plans()->delete();
        $tour->delete();

        return response()->json([
            'message' => 'Tour and associated images and plans have been deleted successfully.',
        ], 200);
    }
}
