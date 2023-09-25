<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profileview');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profileedit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->mobile_number = $request->input('mobile_number');
        // Check if a new profile image is uploaded
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            // // Delete the old profile image if it exists
            if ($user->profile_image) {
                $oldImagePath = public_path('profile_images/' . $user->profile_image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Store the new profile image
            $image->move(public_path('profile_images'), $fileName);
            $user->profile_image = $fileName;
        }
        $user->githubusername = $request->input('githubusername');
        $user->save();

        return redirect()->route('profileview')->with('status', 'Profile updated successfully.');
    }
}
