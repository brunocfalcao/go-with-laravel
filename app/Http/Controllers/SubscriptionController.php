<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouEmail;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'plan_id' => 'required',
        ]);

        $planId = $validatedData['plan_id'];

        $response = Http::post('https://api.lemonsqueezy.com/subscription', [
            'plan_id' => $planId,
        ], [
            'Authorization' => 'Bearer '.env('LEMON_SQUEEZY_API_KEY'),
        ]);

        // Handle API response
        if ($response->successful()) {
            // Successful API response
            return redirect()->route('success.route');
            // Redirect to success page
        } else {
            // Failed API response
            return redirect()->route('error.route');
            // Redirect to error page
        }
    }

    public function redirectToLemonSqueezy($plan)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            // If not authenticated, create a new user
            $user = User::create([
                'name' => 'Guest User', // You can set a default name
                'email' => 'guest@example.com', // You can set a default email
                'password' => bcrypt('guest_password'), // You can set a default password
            ]);
        }

        // Store subscription plan details in user's session
        session(['selected_plan' => $plan]);

        // Redirect to LemonSqueezy payment page
        $paymentUrl = "https://api.lemonsqueezy.com/payment?plan_id=$plan&user_id={$user->id}&redirect_url=".route('subscribe.callback');

        return redirect($paymentUrl);
    }

    public function handleCallback(Request $request)
    {
        // Assuming you've already decoded the LemonSqueezy response in $response variable
        $response = json_decode($responseBody);

        $subscriptionStatus = $response->subscription_status;
        $userName = $response->user_name;
        $userEmail = $response->user_email;

        // Check if user exists
        $existingUser = User::where('email', $userEmail)->first();
        $userExists = $existingUser !== null;

        if (! $userExists) {
            // Create a new user based on LemonSqueezy response
            $newUser = User::create([
                'name' => $userName, // Use $userName instead of $response->name
                'email' => $userEmail, // Use $userEmail instead of $response->email
                'password' => bcrypt('temporary_password'), // Set a temporary password
                // Other fields...
            ]);

            // Send welcome email
            Mail::to($newUser->email)->send(new WelcomeEmail());

            // Send reset password email
            $token = Password::createToken($newUser);
            $this->sendResetLinkEmail($newUser, $token); // Use the sendResetLinkEmail method
        } else {
            // Send thank you email
            Mail::to($existingUser->email)->send(new ThankYouEmail());
        }

        // Show success or fail message to the user
        if ($response->success) {
            return redirect()->route('subscribe')->with('success', 'Subscription successful!');
        } else {
            return redirect()->route('subscribe')->with('error', 'Subscription failed. Please try again.');
        }
    }
}
