<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits_between:10,13',
            'password' => 'required|min:8|confirmed',
            'address' => 'required',
        ]);

        // Create a new user instance
        $user = new User();
        $user->email = $validatedData['email'];
        $user->name = $validatedData['name']; // Add this line if you want to store the full name
        $user->phone = $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->address = $validatedData['address'];
        $user->save();

        // Redirect the user after registration
        return redirect('/login')->with('success', 'Registration successful! Please login to continue.');
    }
}