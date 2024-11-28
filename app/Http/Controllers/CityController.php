<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with('country')->paginate('10');
        return view("admin.city.show", compact("cities"));
        // return $cities;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = Country::all();
        return view('admin.city.add' , compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'countryID'=> 'required',
            'name' => 'required|unique:cities,name',
            'status' => 'required',
        ]);
        $country = City::create([
            'countryID' => $request->countryID,
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect()->route('city.index')->with('success', 'city added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);
        return view('single', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        $countries = Country::all();
        return view('admin.city.update', compact('city','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'countryID'=> 'required',
            'name' => 'required|unique:cities,name',
            'status' => 'required',
        ]);
        $post = City::findOrFail($id);
        $post->update([
            'countryID' => $request->countryID,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('city.index')->with('status', 'city updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('city.index')->with('status', 'city deleted successfully');
    }
}
