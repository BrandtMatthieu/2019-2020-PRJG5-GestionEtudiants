<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder {
    public function run() {
        factory(User::class, 15)->create();
    }
}
