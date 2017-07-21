<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'name' => '3 Months',
            'length' => '3',
            'price' => '25.90',
           // 'price' => '21.95',
            'price' => '0.11',
        ]);

        DB::table('plans')->insert([
            'name' => '6 Months',
            'length' => '6',
            // 'price'=> '19.95'
            'price'=> '23.90'
            // 'price'=> '0.10'
        ]);

    }
}
