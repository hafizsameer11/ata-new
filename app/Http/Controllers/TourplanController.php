<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Tourplan;
use Illuminate\Http\Request;

class TourplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string',
            'tour_id' => 'required|exists:tours,id'
        ]);
        Tourplan::create($validated);
        return response()->json([
            'message' => 'Tour plan created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tourplan $tourplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tourplan = Tourplan::find($id);
        $tour = Tour::find($tourplan->tour_id);
        return view('Admin.Tour.create.planEdit', compact('tourplan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tourplan $tourplan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string',
            'tour_id' => 'required|exists:tours,id'
        ]);
        $tourplan->update($validated);
        return response()->json([
            'message' => 'Tour plan created successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tourplan $tourplan)
    {
        $tourplan->delete();
        return response()->json([
            'message' => 'Tour plan deleted successfully!',
        ]);
    }
}
