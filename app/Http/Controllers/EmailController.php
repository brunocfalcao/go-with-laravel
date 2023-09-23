<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendTestEmail(Request $request)
    {
        $name = 'John Doe'; // Replace with the actual name you want to use
        $email = new WelcomeEmail($name);

        Mail::send($email);

        return response()->json(['message' => 'Welcome email sent']);
    }
}
