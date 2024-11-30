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
        $countries = Country::with('cities')->paginate(10);
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
        $request->validate([
            'name'=> 'required|unique:countries,name',
            'status'=>'required',
        ]);
        $country = Country::create([
            'name'=> $request->name,
            'status'=> $request->status,
        ]);
        return redirect()->route('country.index')->with('success','Country added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::with('cities')->find($id);
        return view('single', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::find($id);
        return view('admin.country.update',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> 'required|string',
            'status'=> 'required',
        ]);
        $post = Country::findOrFail($id);
        $post->update([
        'name' => $request->name,
        'status' => $request->status,
    ]);

    return redirect()->route('country.index')->with('success','country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('country.index')->with('status','country deleted successfully');
    }
}
