<?php

use Illuminate\Database\Seeder;

class AuthGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
		DB::table('auth_group')->insert([
            'id' => 1,
            'name' => '超级管理员',
			'status' => 1,
			'auth' => ' 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,100,101,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72',
			'created_at' => date('Y-m-d h:i:s'),
        ]);
		DB::table('auth_group')->insert([
            'id' => 2,
            'name' => '访客',
			'status' => 1,
			'auth' => ' 1,2,4,6,7,8,10,13,14,15,17,20,21,22,23,25,28,29,30,32,35,36,37,39,42,43,45,48,49,51,54,55,56,58,61,62,64,67,68,70,100',
			'created_at' => date('Y-m-d h:i:s'),
        ]);
    }
}
