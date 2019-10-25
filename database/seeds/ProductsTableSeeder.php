<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0 ; $i < 50; $i++){
            $name=$faker->text(20);
            \DB::table('products')->insert([
                'name'  => $name,
                'slug'	=> \Illuminate\Support\Str::slug($name),
                'content'=> $faker->text(20),
                'origin_price' =>$faker->numberBetween(400000,800000),
                'sale_price' => $faker->numberBetween(400000,800000),
                'status'=>1,

                'user_id'=> $faker->numberBetween(1,20),
                'category_id'=> $faker->numberBetween(1,4),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),


            ]);
        }
    }
}
