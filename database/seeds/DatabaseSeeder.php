<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Deze code is raar. Eerst MenuSeeder uitvoeren (ReservationTableSeeder uitcommenten) Daarna ReservationTableSeeder uitvoeren.)

        // 1. MenuSeeder uitvoeren, ReservationTableSeeder NIET.
//        $this->call(MenuSeeder::class);
        // 2. ReservationTableSeeder uitvoeren, MenuSeeder NIET.
        $this->call(ReservationTableSeeder::class);
    }
}
