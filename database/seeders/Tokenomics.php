<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tokenomics extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokens')->delete();
        DB::table('tokens')->truncate();
        DB::table('tokens')->insert([
            [
                'id' => 1 ,
                'IDO' => 20 ,
                'Farming' => 60 ,
                'TeamWork' => 10 ,
                'AirDrop' => 2 ,
                'mkt_and_comunity'=> 8
            ]
        ]);
    }
}
