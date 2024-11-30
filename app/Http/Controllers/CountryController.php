<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::paginate(10);
        return view("admin.country.show", compact("countries"));
        // return $countries;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensures only valid image types and max size of 2MB
            'name' => 'required|string|max:255|unique:countries,name', // Name should be unique in the `countries` table
            'status' => 'required|boolean', // Status must be 0 or 1
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('countries', 'public'); // Store in `storage/app/public/countries`
        }

        // Create the country record
        Country::create([
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'image' => $imagePath, // Save the path of the uploaded image
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Country added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::find($id);
        return view('single', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::find($id);
        return view('admin.country.update', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required',
        ]);
        $post = Country::findOrFail($id);
        $post->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('country.index')->with('success', 'country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('country.index')->with('status', 'country deleted successfully');
    }
}
