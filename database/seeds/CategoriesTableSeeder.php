<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Máy tính','Điện thoại','Máy ảnh','Phụ kiện'];
        foreach ($categories as $category) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>\Illuminate\Support\Str::slug($category),
                'parent_id'=>0,
                'depth'=>2,
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
    }
}
