<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
{
    // return $request->all();
    // Validate the request data
    $validated = $request->validate([
        'FirstName' => 'required|string|max:255',
        'LastName' => 'required|string|max:255',
        'Email' => 'required|email|max:255',
        'PhoneNo' => 'required|max:12',
        'message' => 'required|string',
        'user_id' => 'nullable|exists:users,id',  // Only validate user_id if not 0
    ]);

    // $validated['user_id'] = Auth::check() ? Auth::id() : 0;
    // Store the contact data
    Contact::create($validated);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Your message has been sent!');
}

    
}
