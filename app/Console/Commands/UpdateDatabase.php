<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products =  Product::all();
        $productArray = [];

        foreach ($products as $product) {
            $productArray[] = [
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
            ];
        }
        $local =  Http::post('http://127.0.0.1:8000/api/product-syncDatabase', ['product' => $productArray]);
        dd($local);
    }
}
