<?php

use Illuminate\Database\Seeder;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('user_info')->insert([
            'user_id'=>'1',
            'full_name'=>'Trần Đức Thịnh',
            'phone'=>'+84 963 980 840',
            'address'=>'Số 9 - Trần Vỹ - Nam Từ Liêm - Hà Nội',
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
    }
}
