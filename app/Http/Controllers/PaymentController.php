<?php

namespace App\Http\Controllers;

use App\Models\LemonSqueezyCustomers;
use App\Models\LemonSqueezySubscriptions;
use App\Models\Orders;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handlePaymentAndWebhook(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'variant_id' => 'required|string',
            'user_id' => 'required|integer',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|array',
            'shipping_address.street' => 'required|string',
            'shipping_address.city' => 'required|string',
            'shipping_address.state' => 'required|string',
            'shipping_address.zip' => 'required|string',
            'billing_address' => 'required|array',
            'billing_address.street' => 'required|string',
            'billing_address.city' => 'required|string',
            'billing_address.state' => 'required|string',
            'billing_address.zip' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|integer',
            'items.*.variant_id' => 'required|integer',
            'items.*.quantity' => 'required|integer|min:1',
            'promo_code' => 'nullable|string',
            'notes' => 'nullable|string',
            'currency' => 'required|string',
            'currency_rate' => 'required|numeric',
            'discount_total' => 'required|numeric',
            'tax_name' => 'required|string',
            'tax_rate' => 'required|numeric',
            'status' => 'required|string',
            'status_formatted' => 'required|string',
            'refunded' => 'nullable|string',
            'refunded_at' => 'nullable|date',
            'tax' => 'required|numeric',
            'total' => 'required|numeric',
            'subtotal_usd' => 'required|numeric',
            'discount_total_usd' => 'required|numeric',
            'tax_usd' => 'required|numeric',
            'total_usd' => 'required|numeric',
            'subtotal_formatted' => 'required|string',
            'discount_total_formatted' => 'required|string',
            'tax_formatted' => 'required|string',
            'total_formatted' => 'required|string',
            'first_order_item' => 'required|array',
            'first_order_item.id' => 'required|integer',
            'first_order_item.order_id' => 'required|integer',
            'first_order_item.product_id' => 'required|integer',
            'first_order_item.variant_id' => 'required|integer',
            'first_order_item.price_id' => 'required|integer',
            'first_order_item.product_name' => 'required|string',
            'first_order_item.variant_name' => 'required|string',
            'first_order_item.price' => 'required|numeric',
            'first_order_item.created_at' => 'required|date',
            'first_order_item.updated_at' => 'required|date',
            'first_order_item.test_mode' => 'required|boolean',
            'urls' => 'required|array',
            'urls.receipt' => 'required|string',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'test_mode' => 'required|boolean',
        ]);

        $client = new Client([
            'base_uri' => 'https://api.lemonsqueezy.com/v1/orders',
            'headers' => [
                'Accept' => 'application/vnd.api+json',
                'Content-Type' => 'application/vnd.api+json',
                'Authorization' => 'Bearer '.env('LEMON_SQUEEZY_API_KEY'),
            ],
        ]);

        try {
            // Process payment
            $response = $client->post('checkouts', [
                'json' => $validatedData,
            ]);

            $responseData = json_decode($response->getBody(), true);

            if (!isset($responseData['url'])) {
                return response()->json(['error' => 'Unable to create checkout'], 500);
            }

            // Get the JSON data from the request
            $webhookData = $request->json()->all();

            // Save order data
            $order = new Orders();
            $order->fill($webhookData['data']['attributes']);
            $order->save();
            dd($order);

            // Save customer data
            $customerData = $webhookData['data']['relationships']['customer']['data'][0];
            $customer = new LemonSqueezyCustomers();
            $customer->fill($customerData['attributes']);
            $customer->save();

            // Save subscription data
            $subscriptionData = $webhookData['data']['relationships']['subscriptions']['data'][0];
            $subscription = new LemonSqueezySubscriptions();
            $subscription->fill($subscriptionData['attributes']);
            $subscription->save();

            // Check if the user exists in your database based on email
            // (Note: You'll need to have your User model and migration set up)
            $user = User::where('email', $webhookData['data']['attributes']['user_email'])->first();

            if (!$user) {
                // User does not exist, create a new user and send welcome email
                $newUser = new User();
                $newUser->lemon_squeezy_customer_id = $customer->id;
                $newUser->email = $webhookData['data']['attributes']['user_email'];
                $newUser->save();

                // Send welcome email and forget password link
                Mail::to($newUser->email)->send(new WelcomeEmail(['user' => $newUser]));
                Mail::to($newUser->email)->send(new ForgetPasswordEmail($newUser));
            } else {
                // User exists, send thank you email
                Mail::to($user->email)->send(new ThankYouEmail(['user' => $user]));
            }

            // Return the checkout URL
            return response()->json(['checkout_url' => $responseData['url']]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
