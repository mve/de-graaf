<?php

use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 8)->create();

        factory(App\Table::class, 8)->create();
        factory(App\User::class, 20)->create()->each(function ($u) {
            factory(App\Reservation::class, 3)->create(['user_id'=>$u->id]);

        });
        factory(App\registration_table::class, 60)->create();

        factory(App\Receipt::class, 60)->create();


    }
}
