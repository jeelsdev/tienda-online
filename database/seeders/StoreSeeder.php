<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::factory(10)->create();

        foreach ($stores as $store) {
            $userId = User::role('staff')->doesntHave('store')->first()->id;
            $store->update(['user_id'=>$userId]);
        }
    }
}
