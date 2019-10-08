<?php

use Illuminate\Database\Seeder;

use App\Student;

class StudentTableSeeder extends Seeder {
    public function run() {
        factory(Student::class, 50)->create();
    }
}
