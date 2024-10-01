<?php

namespace Database\Seeders;

use App\Models\Nutrition;
use App\Models\Portion;
use App\Models\User;
use App\Models\Product;
use App\Models\Tag;
use App\Models\CustomPortion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $tags = Tag::factory(5)->create();
        $products = Product::factory(50)->create();
        Nutrition::factory(50)->create();
        Portion::factory(20)->create();
        Portion::factory(20)->custom()->create();

        
        // Attach Tags to Products
        $products->each(function ($product) use ($tags) {
            $randomTags = $tags->random(rand(1, 3))->pluck('id');
            $product->tags()->attach($randomTags);
        });

    }
}
