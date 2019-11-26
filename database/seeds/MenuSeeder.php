<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(base_path('database/sql/main_courses.sql')));
        DB::unprepared(file_get_contents(base_path('database/sql/sub_courses.sql')));
        DB::unprepared(file_get_contents(base_path('database/sql/products.sql')));
    }
}
