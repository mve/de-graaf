<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        factory(App\MainCourse::class, 5)->create();
//        factory(App\SubCourse::class, 8)->create();
//        factory(App\Product::class, 8)->create();

        factory(App\Table::class, 8)->create();

        factory(App\User::class, 20)->create()->each(function ($u) {
            factory(App\Reservation::class, 3)->create(['user_id' => $u->id]);
        });

        factory(App\Reservation_table::class, 60)->create();

        factory(App\Receipt::class, 60)->create()->each(function ($r) {
            factory(App\Order::class, 3)->create(['receipt_id' => $r->id]);
        });

    }
}
