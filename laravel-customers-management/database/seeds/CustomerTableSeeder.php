<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 0; $i < 20; $i++){
            array_push($data, [
                'name' => Str::random(10),
                'dob' => date("Y-m-d", mt_rand(1, time())),
                'email' => Str::random(10).'@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        DB::table('customer')->insert($data);
    }
}
