<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Blog::paginate(10);
        return view('Admin.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare the data to store
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // stores in storage/app/public/images
            $data['image'] = $imagePath;
        }

        // Store the data in the database
        Blog::create($data); // Replace YourModel with your actual model

        // Redirect with success message
        return redirect()->route('news.index') // Replace with your actual route name
            ->with('success', 'Tour added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $descode = base64_decode($id);
        $new = Blog::find($descode);
        return view('Website.News.show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tour = Blog::findOrFail($id);
        return view('Admin.news.update', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the existing record
        $tour = Blog::findOrFail($id);

        // Update the record with the new data
        $tour->title = $request->input('title');
        $tour->description = $request->input('description');

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            if ($tour->image && \Storage::disk('public')->exists($tour->image)) {
                \Storage::disk('public')->delete($tour->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $tour->image = $imagePath;
        }

        // Save the changes
        $tour->save();

        // Redirect with success message
        return redirect()->route('news.index')->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = Blog::findOrFail($id);

        // Delete the image if it exists
        if ($news->image && \Storage::disk('public')->exists($news->image)) {
            \Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Tour deleted successfully.');
    }
    public function filterForm(Request $request){
        $data = $request->all();
        $news = Blog::where('title', 'like', '%' . $data['search']
        . '%')->paginate(10);
        return view('Admin.news.list', compact('news'));
    }
}
