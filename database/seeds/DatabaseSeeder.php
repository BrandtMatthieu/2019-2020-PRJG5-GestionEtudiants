<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call(CourseTableSeeder::class);
        $this->call(LogTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
