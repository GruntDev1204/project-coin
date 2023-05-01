<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SndgIntro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('introduce_sndgs')->delete();

        DB::table('introduce_sndgs')->truncate();
        DB::table('introduce_sndgs')->insert([
            ['content'=> 'Đm con mẹ nó vãi lz đm bọn con gái ai cũng lợi dụng đmmmmmm' , 'title_team'=> '#1 Coin in the World ' ,'id' => 1 ]
        ]);
    }
}
