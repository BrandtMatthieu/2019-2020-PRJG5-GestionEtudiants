<?php

use Illuminate\Database\Seeder;

use App\Subscription;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subscription::class, 50)->create();
    }
}
