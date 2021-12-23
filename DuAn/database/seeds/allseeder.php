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
        for($i=0;$i<=10;$i++){
            DB::table("product")->insert([
                'name' =>  $faker->text(20),
                'image' =>  $faker->text(5)."img",
                'price' =>  rand(1,99)*10000,
                'brand' =>  rand(1,5),
                'category' =>  rand(1,5),
                'sale' =>  rand(0,1),
                'profile' =>  $faker->text(20),
                'detail' =>  $faker->text(20),
                'id_user' =>  1,
            ]);
        }
        for($i=0;$i<=29;$i++){
            DB::table("order")->insert([
                'id_user' =>  rand(2,5),
                'address' => $faker->text(20),
                'phone' => rand(1000000000,9999999999),
                'day' => Carbon::today()->subDays(rand(-365, 5)),
                'approved' => 1,
            ]);
        }
        for($i=0;$i<=50;$i++){
            DB::table("detail_order")->insert([
                'id_product' =>  rand(1,22),
                'id_order' => rand(1,40),
                'amount' => rand(1,5),
            ]);
        }
    }
}
