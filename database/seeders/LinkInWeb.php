<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkInWeb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->delete();

        DB::table('links')->truncate();
        DB::table('links')->insert([
            [
                'id' => 1 ,
                'Swaps'=> 'https://gitlab.com/hotrung6935' ,
                'Contract'=> 'https://gitlab.com/hotrung6935' ,
                'LinkAddress'=> '12354345835493745837487593' ,
                'TeleGram'=> 'https://t.me/snopedoge00' ,
                'GitLab'=> 'https://gitlab.com/hotrung6935' ,
                'Market'=> 'https://gitlab.com/hotrung6935' ,
                'GitHub'=> 'https://gitlab.com/hotrung6935' ,
                'Twitter'=> 'https://twitter.com/Snope_Doge' ,
                'Facebook'=> 'https://gitlab.com/hotrung6935' ,
                'Tiktok'=> 'https://gitlab.com/hotrung6935' ,
             ]
        ]);
    }
}
