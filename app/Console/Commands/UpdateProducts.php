<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\ProductFile;

class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update products from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->get('https://api.lemonsqueezy.com/v1/products',
        [
            'headers' =>
            [
                'Accept' => 'application/vnd.api+json',
                'Content-Type' => 'application/vnd.api+json',
                'Authorization' => 'Bearer ' . env('LEMON_SQUEEZY_API_KEY'),
            ],
        ]);

        $products = json_decode($response->getBody(), true);

        foreach ($products['data'] as $key => $product) {
            $products_data = Product::updateOrCreate(['slug' => $product['attributes']['slug']],[
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

            $variant_url = $product['links']['self'] . '/variants';
            $client = new Client();
            $response =$client->get($variant_url,[
                'headers' => [
                    'Accept' => 'application/vnd.api+json',
                    'Content-Type' => 'application/vnd.api+json',
                    'Authorization' => 'Bearer ' . env('LEMON_SQUEEZY_API_KEY'),
                ],
            ]);
            $variant = json_decode($response->getBody(), true);

            $variant_file_url = $variant['data'][0]['links']['self'] . '/files';
            $client = new Client();
            $response = $client->get($variant_file_url,[
                'headers' => [
                    'Accept' => 'application/vnd.api+json',
                    'Content-Type' => 'application/vnd.api+json',
                    'Authorization' => 'Bearer ' . env('LEMON_SQUEEZY_API_KEY'),
                ],
            ]);
            $variant_files = json_decode($response->getBody(), true);
            $ProductFile = ProductFile::where('product_id',$products_data->product_id)->get();
            if(count($ProductFile) > 0){
                foreach ($ProductFile as $key => $file) {
                    $file_1 = ProductFile::find($file->id);
                    $file_1->delete();
                }
            }
            foreach ($variant_files['data'] as $key => $variant_file) {
                ProductFile::create(['product_id' => $products_data->product_id , 'file' => $variant_file['attributes']['download_url']]);
            }

        }

        $this->info('Product processed successfully.');
    }
}
