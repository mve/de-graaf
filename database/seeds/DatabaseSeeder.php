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
        // Vanwegen de relaties moet eerst de MenuSeeder worden uitgevoerd (ReservationTableSeeder uitcommenten) Daarna ReservationTableSeeder uitvoeren. (MenuSeederuit commenten)

        // 1. MenuSeeder uitvoeren, ReservationTableSeeder NIET.
//        $this->call(MenuSeeder::class);
        // 2. ReservationTableSeeder uitvoeren, MenuSeeder NIET.
        $this->call(ReservationTableSeeder::class);
    }
}
