<?php

use Illuminate\Database\Seeder;

use App\Subscription;

class SubscriptionTableSeeder extends Seeder {
    public function run() {
        factory(Subscription::class, 200)->create();
    }
}
