<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to send a message.');
        }

        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255',
            'nomorhp' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'note' => 'nullable|string',
        ], [
            'username.required' => 'Masukkan nama Anda.',
            'nomorhp.required' => 'Masukkan nomor HP Anda.',
            'email.required' => 'Masukkan email Anda.',
            'email.email' => 'Masukkan email Anda dengan benar.',
        ]);

        // Create a new contact record
        Contact::create([
            'user_id' => Auth::id(), // Storing the user_id of the authenticated user
            'username' => $request->username,
            'nomorhp' => $request->nomorhp,
            'email' => $request->email,
            'note' => $request->note,
        ]);

        // Redirect back with success message or perform any other action
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}
