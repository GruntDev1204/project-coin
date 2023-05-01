<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSndg extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_managers')->delete();
        DB::table('admin_managers')->truncate();
        DB::table('admin_managers')->insert([
            [
                'id' => 1 ,
                'user_info'=> 'hotrung6935@gmail.com' ,
                'password'=> bcrypt('hotrung120401') ,
                'fullName'=> 'HO TRUNG' ,
                'ma_PIN'=> 120401 ,
                'vai_tro' =>'Develop',
                'describe_vai_tro' =>'Fstack Develop Web',
                'is_allow' =>1,
                'is_ceo' =>1,
                'avatar' =>'/photos/shares/trung.png',
                'email' =>'hotrung6935@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }
}
