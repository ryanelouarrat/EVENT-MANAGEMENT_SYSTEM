<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register()
    {
        return view('signup');
    }
    public function viewupdateProfile()
    {
        return view('editProfile');
    }



    public function updateProfile(Request $request, $user)
    {   
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'ClubName' => 'nullable|string|max:255',
            'Categorie' => 'nullable|string|in:club,directions,professeur,autre',
            'Description' => 'nullable|string',
            'email' => 'required|email|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other fields as needed
        ]);

        // Find the user by ID
        $user = User::findOrFail($user);

        // Update user data
        $user->nom = $validatedData['nom'];
        $user->prenom = $validatedData['prenom'];
        $user->ClubName = $validatedData['ClubName'];
        $user->Categorie = $validatedData['Categorie'];
        $user->Description = $validatedData['Description'];
        $user->email = $validatedData['email'];

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Store the uploaded file and update the user's logo
            $logoPath = $request->file('logo')->store('logos', 'public');
            $user->logo = $logoPath;
        }

        // Save changes
        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

    public function store(Request $request)
    {
        // Validate the request data 
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ClubName' => 'required|string|max:255', // Assuming it matches the database and model
            'Categorie' => 'required|string|max:255',
            'Description' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Create user
        $user = User::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'ClubName' => $validatedData['ClubName'], // Make sure 'ClubName' is in the validated data
            'Categorie' => $validatedData['Categorie'],
            'Description' => $validatedData['Description'],
            'logo' => $validatedData['logo'] ?? null,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect or return response
        auth()->login($user);
        return redirect('/')->with('success', 'User created and logged in');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Logged in');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
