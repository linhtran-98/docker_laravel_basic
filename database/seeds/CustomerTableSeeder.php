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
        $fake  = Faker\Factory::create();
        $limit = 10;

        for ($i = 0; $i < $limit; $i++){
            DB::table('customers')->insert([
                'name' => $fake->name,
                'address' => $fake->address,
                'phone' => $fake->phoneNumber,
                'birthday' => $fake->date("Y-m-d"),
                'created_at' => $fake->date("Y-m-d H:i:s"),
                'updated_at' => $fake->date("Y-m-d H:i:s")
            ]);
        }
    }
}
