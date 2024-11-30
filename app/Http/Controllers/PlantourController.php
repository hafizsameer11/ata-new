<?php

namespace App\Http\Controllers;

use App\Models\Plantour;
use App\Models\Tour;
use Illuminate\Http\Request;

class PlantourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantours = Plantour::with('tours')->get();
        return view('Admin.plan_tour.list', compact('plantours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tours = Tour::select('id', 'name')->get();
        return view("Admin.plan_tour.create", compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i', // Adjust format as needed
        ]);

        // Create the tour plan
        $plan = Plantour::create([
            'tour_id' => $request->tour_id,
            'price' => $request->price,
            'discount' => $request->discount ?? 0, // Default to 0 if no discount
            'date' => $request->date,
            'time' => $request->time,
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Plan created successfully.',
            'plan_id' => $plan->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plantour $plantour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $plantour = Plantour::find($id);
        $tours = Tour::select('id', 'name')->get();
        return view("Admin.plan_tour.edit", compact('tours', 'plantour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request->all();
        $plantour = Plantour::find($id);
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        // Create the tour plan
        $plantour->update([
            'tour_id' => $request->tour_id,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Plan created successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plantour = Plantour::find($id);
        $plantour->delete();
        return response()->json(['message' => 'Plan deleted successfully.']);
    }
}
