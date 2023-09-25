<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the OAuth process
            return redirect('/login')->with('error', 'Google login failed. Please try again.');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // User exists, update Google data
            $existingUser->update([
                'google_id' => $user->id,
                'google_token' => $user->token,
                // 'profile_image' => $this->saveImage($user->avatar),
            ]);

            Auth::login($existingUser);
        } else {
            // User doesn't exist, create a new user with Google data
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'google_token' => $user->token,
                'password' => Hash::make(Str::random(16)),
                'profile_image' => $this->saveImage($user->avatar),
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended('/home');
    }

    private function saveImage($imageUrl)
    {
        // Get the file extension from the original URL
        $fileExtension = pathinfo($imageUrl, PATHINFO_EXTENSION);
        $validExtensions = ['jpg', 'jpeg', 'png'];

        // Check if the extension is valid, otherwise use a default one (e.g., 'jpg')
        if (!in_array($fileExtension, $validExtensions)) {
            $fileExtension = 'jpg';
        }

        $fileName = time() . '_' . Str::random(10) . '.' . $fileExtension;
        $destinationPath = public_path('profile_images');

        // Download the image and save it to the destination path
        file_put_contents($destinationPath . '/' . $fileName, file_get_contents($imageUrl));

        return $fileName;
    }

    public function redirectToApple()
    {
        return Socialite::driver('apple')->redirect();
    }

    public function handleAppleCallback()
    {
        try {
            $user = Socialite::driver('apple')->user();
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the OAuth process
            return redirect('/login')->with('error', 'Apple login failed. Please try again.');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // User exists, update Apple data
            $existingUser->update([
                'apple_id' => $user->id,
                'apple_token' => $user->token,
                // 'profile_image' => $user->avatar,
            ]);

            Auth::login($existingUser);
        } else {
            // User doesn't exist, create a new user with Apple data
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'apple_id' => $user->id,
                'apple_token' => $user->token,
                'password' => Hash::make(Str::random(16)),
                'profile_image' => $user->avatar,
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended('/home');
    }
}
