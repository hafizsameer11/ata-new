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
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional for updates
            'name' => 'required|string|max:255|unique:countries,name,' . $id, // Unique name, excluding the current record
            'status' => 'required|boolean', // Status must be 0 or 1
        ]);

        // Find the country by its ID
        $country = Country::findOrFail($id);

        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($country->image && \Storage::disk('public')->exists($country->image)) {
                \Storage::disk('public')->delete($country->image);
            }

            // Upload the new image
            $imagePath = $request->file('image')->store('countries', 'public');
            $country->image = $imagePath;
        }

        // Update other fields
        $country->name = $validatedData['name'];
        $country->status = $validatedData['status'];
        $country->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Country updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);

        // Delete the associated image file if it exists
        if ($country->image && \Storage::disk('public')->exists($country->image)) {
            \Storage::disk('public')->delete($country->image);
        }

        // Delete the country record from the database
        $country->delete();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Country deleted successfully!');
    }

    public function filterForm(Request $request){
        $countries = Country::where('name', 'like', '%' . $request->search .
        '%')->paginate(10);
        return view('Admin.country.show', compact('countries'));
    }
}
