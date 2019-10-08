<?php

use Illuminate\Database\Seeder;

use App\Course;

class CourseTableSeeder extends Seeder {
    public function run() {
        factory(Course::class, 15)->create();
    }
}
