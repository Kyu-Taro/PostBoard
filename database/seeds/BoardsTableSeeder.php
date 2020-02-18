<?php

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'text' => 'テストです'
        ];

        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
        DB::table('boards')->insert($param);
    }
}
