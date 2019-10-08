<?php

use Illuminate\Database\Seeder;

use App\Log;

class LogTableSeeder extends Seeder {
    public function run() {
        factory(Log::class, 15)->create();
    }
}
