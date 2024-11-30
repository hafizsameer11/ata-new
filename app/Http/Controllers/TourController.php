<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Tempimage;
use App\Models\Tour;
use App\Models\Tourimage;
use App\Models\Tourplan;
use App\Models\Plantour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::with('images', 'country')->where('one_day' , 0 )->get();
        return view('Admin.Tour.list', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('Admin.Tour.create.detail', compact('countries'));
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
            'city' => 'required|array|min:1',
            'city.*' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'required|string',
            'single_room' => 'required|numeric',
            'twin_room' => 'required|numeric',
            'child_room' => 'required|numeric',
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
            'price' => $request->price,
            'child_room' => $request->child_room,
            'discount' => $request->discount,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        // Save the tour plans
        foreach ($request->plan_name as $index => $planName) {
            Tourplan::create([
                'tour_id' => $tour->id,
                'name' => $planName,
                'description' => $request->plan_description[$index],
                'city' => $request->city[$index],
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
        $tour = Tour::with(['plans', 'images'])->findOrFail($id); // Fetch tour with related plans and images
        $countries = Country::all(); // Get all countries for the dropdown

        return view('admin.tours.edit', compact('tour', 'countries'));
    }
    public function plans($id)
    {
        $tour = Tour::with('plans')->find($id);
        return view('Admin.Tour.create.plan', compact('tour'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tour = Tour::with('images', 'plans', 'country')->find($id);
        // return $tour;
        return view('Admin.Tour.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tour = Tour::with('images','plans')->find($id);
        $countries = Country::where('status', 1)->get();
        // return $tour ;
        return view('Admin.Tour.edit', compact('countries', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'plan_id' => 'nullable|array',
            'plan_name.*' => 'required|string|max:255',
            'plan_description.*' => 'required|string',
            'city.*' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'required|string',
            'single_room' => 'required|numeric',
            'twin_room' => 'required|numeric',
            'child_room' => 'required|numeric',
            'one_day' => 'nullable'
        ]);

        $tour = Tour::findOrFail($id);
        $tour->update($request->only([
            'name',
            'description',
            'duration',
            'max_member',
            'min_age',
            'tour_type',
            'include',
            'country_id',
            'single_room',
            'twin_room',
            'child_room',
            'price',
            'discount',
            'date',
            'time',
            'one_day'
        ]));

        // Update or create plans
        foreach ($request->plan_name as $index => $planName) {
            $planId = $request->plan_id[$index] ?? null;
            Tourplan::updateOrCreate(
                ['id' => $planId],
                [
                    'tour_id' => $tour->id,
                    'name' => $planName,
                    'description' => $request->plan_description[$index],
                    'city' => $request->city[$index],
                ]
            );
        }

        // Update images
        if ($request->has('images')) {
            $tour->images()->delete();
            foreach ($request->images as $imagePath) {
                Tourimage::create([
                    'tour_id' => $tour->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('tours.index')->with('success','The Tour updated successfully');

    }
    public function editSingle(string $id)
    {
        $tour = Tour::find($id);
        return view('Admin.Tour.updateSingle', compact('tour'));
    }
    public function updatesingle(Request $request, string $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
        ]);
        $tour = Tour::find($id);
        $tour->update([
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        return redirect()->route('tours.index')->with('success', 'The info updated successfully');
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



    public function One_day_index()
    {
        $tours = Tour::with('images', 'country')->where('one_day',1)->get();
        return view('Admin.Tour.list', compact('tours'));
    }
}
