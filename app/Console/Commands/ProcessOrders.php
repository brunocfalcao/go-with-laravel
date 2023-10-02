<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Models\Order;
use App\Models\User;
use App\Mail\ThankYouEmail;
use App\Mail\ForgetPasswordEmail;
use GuzzleHttp\Client;

class ProcessOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and Process Orders from the API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->get('https://api.lemonsqueezy.com/v1/orders',
            [
                'headers' =>
                [
                    'Accept' => 'application/vnd.api+json',
                    'Content-Type' => 'application/vnd.api+json',
                    'Authorization' => 'Bearer ' . env('LEMON_SQUEEZY_API_KEY'),
                ],
            ]);

        $orders = json_decode($response->getBody(), true);

        $today = date('Y-m-d');

        $filteredOrders = array_filter($orders['data'], function ($orderData) use ($today) {
            return strpos($orderData['attributes']['created_at'], $today) !== false;
        });


        foreach ($filteredOrders as $orderData) {
            $order = Order::updateOrCreate([
                'store_id' => $orderData['attributes']['store_id'],
                'customer_id' => $orderData['attributes']['customer_id'],
                'identifier' => $orderData['attributes']['identifier'],
                'order_number' => $orderData['attributes']['order_number'],
                'user_name' => $orderData['attributes']['user_name'],
                'user_email' => $orderData['attributes']['user_email'],
                'currency' => $orderData['attributes']['currency'],
                'currency_rate' => $orderData['attributes']['currency_rate'],
                'tax_name' => $orderData['attributes']['tax_name'],
                'tax_rate' => $orderData['attributes']['tax_rate'],
                'status' => $orderData['attributes']['status'],
                'refunded' => $orderData['attributes']['refunded'],
                'refunded_at' => $orderData['attributes']['refunded_at'],
                'discount_total' => $orderData['attributes']['discount_total'],
                'tax' => $orderData['attributes']['tax'],
                'total' => $orderData['attributes']['total'],
                'subtotal_usd' => $orderData['attributes']['subtotal_usd'],
                'discount_total_usd' => $orderData['attributes']['discount_total_usd'],
                'tax_usd' => $orderData['attributes']['tax_usd'],
                'total_usd' => $orderData['attributes']['total_usd'],
                'subtotal_formatted' => $orderData['attributes']['subtotal_formatted'],
                'discount_total_formatted' => $orderData['attributes']['discount_total_formatted'],
                'tax_formatted' => $orderData['attributes']['tax_formatted'],
                'total_formatted' => $orderData['attributes']['total_formatted'],
                'order_id' => $orderData['attributes']['first_order_item']['order_id'],
                'product_id' => $orderData['attributes']['first_order_item']['product_id'],
                'variant_id' => $orderData['attributes']['first_order_item']['variant_id'],
                'price_id' => $orderData['attributes']['first_order_item']['price_id'],
                'product_name' => $orderData['attributes']['first_order_item']['product_name'],
                'variant_name' => $orderData['attributes']['first_order_item']['variant_name'],
                'price' => $orderData['attributes']['first_order_item']['price'],
                'receipt' => $orderData['attributes']['urls']['receipt']
            ],
            $orderData);

            // Check if the order was just created (not updated)
            if ($order->wasRecentlyCreated) {
                // Get the email ID from the API response
                $email = $orderData['attributes']['user_email'];
                $ordernumber = $orderData['attributes']['order_number'];
                $ordertotal = $orderData['attributes']['total_formatted'];

                // Check if a user with this email already exists
                $user = User::where('email', $email)->first();

                if (!$user) {
                    // User does not exist, create a new user
                    $user = User::create([
                        'email' => $email,
                        'password' => Hash::make(Str::password(16)), // Generate a random password
                    ]);

                    // Send a welcome email with a reset password link
                    // Mail::to($email)->send(new ForgetPasswordEmail($user));

                    // Assuming $email contains the user's email address
                    Password::sendResetLink(['email' => $email]);
                }

                $userdata = ['user' => $user, 'order' => $order];
                // Send a thank you email
                Mail::to($email)->send(new ThankYouEmail($user));
            }
        }
        $this->info('Orders processed successfully.');
    }
}
