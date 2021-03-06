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
        $this->call(StudentTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
    }
}
