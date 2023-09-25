<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductFile;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Listing Products on Main Landing Page
    public function getFrontProducts()
    {
        $client = new Client();
        $response = $client->get('https://api.lemonsqueezy.com/v1/products',
        [
            'headers' => [
                'Accept' => 'application/vnd.api+json',
                'Content-Type' => 'application/vnd.api+json',
                'Authorization' => 'Bearer '.env('LEMON_SQUEEZY_API_KEY'),
            ],
        ]);
        $products = json_decode($response->getBody(), true);

        return view('index', compact('products'));
    }

    // Listing Products in Admin Panel
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products', compact('products'));
    }

    public function create()
    {
        $client = new Client();
        $response = $client->get('https://api.lemonsqueezy.com/v1/products',
        [
            'headers' => [
                'Accept' => 'application/vnd.api+json',
                'Content-Type' => 'application/vnd.api+json',
                'Authorization' => 'Bearer '.env('LEMON_SQUEEZY_API_KEY'),
            ],
        ]);

        $products = json_decode($response->getBody(), true);

        foreach ($products['data'] as $key => $product) {
            $products_data = Product::updateOrCreate(['slug' => $product['attributes']['slug']], [
                'product_id' => $product['id'],
                'name' => $product['attributes']['name'],
                'slug' => $product['attributes']['slug'],
                'description' => $product['attributes']['description'],
                'status' => $product['attributes']['status'],
                'status_formatted' => $product['attributes']['status_formatted'],
                'thumb_url' => $product['attributes']['thumb_url'],
                'large_thumb_url' => $product['attributes']['large_thumb_url'],
                'price' => $product['attributes']['price'],
                'price_formatted' => $product['attributes']['price_formatted'],
                'from_price' => $product['attributes']['from_price'],
                'to_price' => $product['attributes']['to_price'],
                'pay_what_you_want' => $product['attributes']['pay_what_you_want'],
                'buy_now_url' => $product['attributes']['buy_now_url'],
            ]);

            $variant_url = $product['links']['self'].'/variants';
            $client = new Client();
            $response = $client->get($variant_url, [
                'headers' => [
                    'Accept' => 'application/vnd.api+json',
                    'Content-Type' => 'application/vnd.api+json',
                    'Authorization' => 'Bearer '.env('LEMON_SQUEEZY_API_KEY'),
                ],
            ]);
            $variant = json_decode($response->getBody(), true);

            $variant_file_url = $variant['data'][0]['links']['self'].'/files';
            $client = new Client();
            $response = $client->get($variant_file_url, [
                'headers' => [
                    'Accept' => 'application/vnd.api+json',
                    'Content-Type' => 'application/vnd.api+json',
                    'Authorization' => 'Bearer '.env('LEMON_SQUEEZY_API_KEY'),
                ],
            ]);
            $variant_files = json_decode($response->getBody(), true);
            $ProductFile = ProductFile::where('product_id', $products_data->product_id)->get();
            if(count($ProductFile) > 0) {
                foreach ($ProductFile as $key => $file) {
                    $file_1 = ProductFile::find($file->id);
                    $file_1->delete();
                }
            }
            foreach ($variant_files['data'] as $key => $variant_file) {
                ProductFile::create(['product_id' => $products_data->product_id, 'file' => $variant_file['attributes']['download_url']]);
            }

        }

        return redirect()->route('products.index');
    }

    public function updateGithubLink(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->github_repo_name = $request->input('github_repo_name');
        $product->save();

        return redirect()->back()->with('success', 'GitHub link updated successfully');
    }

    // Edit Github link in products section
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.productsedit', compact('product'));
    }

    // Update Github link in products section as well as in products database
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Check if a new GitHub link is provided in the request
        $newGitHubRepoName = $request->input('github_repo_name');
        if ($newGitHubRepoName !== null) {
            $product->github_repo_name = $newGitHubRepoName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'GitHub link updated successfully');
    }

    // Orders API
    private function fetchOrdersFromAPI()
    {
        $client = new Client();
        $response = $client->get('https://api.lemonsqueezy.com/v1/orders', [
            'headers' => [
                'Accept' => 'application/vnd.api+json',
                'Content-Type' => 'application/vnd.api+json',
                'Authorization' => 'Bearer ' . env('LEMON_SQUEEZY_API_KEY'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }


    public function getOrders(Request $request)
    {
        $auth_user = Auth::user();
        if($auth_user->roles->first() && $auth_user->roles->first()->name == 'admin'){
            $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        }else{
            $orders = Order::orderBy('created_at', 'desc')->where('user_email',$auth_user->email)->paginate(10);
        }

        return view('admin.orderlisting', compact('orders'));
    }

    public function getPurchase(Request $request)
    {
        $auth_user = Auth::user();
        if($auth_user->roles->first() && $auth_user->roles->first()->name == 'admin'){
            $purchaseOrders = Order::orderBy('created_at', 'desc')->paginate(10);
        }else{
            $purchaseOrders = Order::orderBy('created_at', 'desc')->where('user_email',$auth_user->email)->paginate(10);
        }

        return view('admin.purchase', compact('purchaseOrders'));
    }
}
