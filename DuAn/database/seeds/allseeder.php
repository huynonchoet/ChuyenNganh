<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class allseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // for($i=0;$i<=10;$i++){
        //     DB::table("product")->insert([
        //         'name' =>  $faker->text(20),
        //         'image' =>  $faker->text(5)."img",
        //         'price' =>  rand(1,99)*10000,
        //         'brand' =>  rand(1,5),
        //         'category' =>  rand(1,5),
        //         'sale' =>  rand(0,1),
        //         'profile' =>  $faker->text(20),
        //         'detail' =>  $faker->text(20),
        //         'id_user' =>  1,
        //     ]);
        // }
        for($i=1;$i<=5;$i++){
            DB::table("order")->insert([
                'id_user' =>  rand(2,5),
                'address' => $faker->text(20),
                'phone' => rand(1234567890,9876543210),
                'day' => '2021-06-06',
                'approved' => 1,
            ]);
        }
        for($i=0;$i<=50;$i++){
            DB::table("detail_order")->insert([
                'id_product' =>  rand(6,29),
                'id_order' => 135,
                'amount' => rand(1,5),
            ]);
        }
    }
}