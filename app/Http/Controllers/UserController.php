<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:20|regex:/(.+)@(.+)\.(.+)/i',
            'mobile_number' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8|max:16|regex:/[a-z]/regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            // must be at least 8 characters in length
            // must contain at least one lowercase letter
            // must contain at least one uppercase letter
            // must contain at least one digit
            // must contain a special character
        ]);

        // Create a new user using validated data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'mobile_number' => $validatedData['mobile_number'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect or do something else after successful submission
        return redirect()->route('index');
    }

    public function index()
    {
        // Check if the authenticated user has the "admin" role
        if (auth()->user()->hasRole('admin')) {
            // Allow access to admin-only functionality
            return view('admin.dashboard');
        } else {
            // Allow access to user-specific functionality
            return view('admin.dashboard');
        }
    }
}
