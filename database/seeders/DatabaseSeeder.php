<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Message;
use App\Models\Request;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name'=>'activo']);
        State::create(['name'=>'inactivo']);
        State::create(['name'=>'bloqueado']);
        State::create(['name'=>'cerrado']);


        $this->call(AddressSeeder::class);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'staff']);
        Role::create(['name'=>'client']);

        $userAdmin = User::factory()->create([
            'name'=>'Admin', 
            'surnames'=>'admin', 
            'birthday'=>'2000-01-01', 
            'phone'=>'987123456', 
            'address_id'=>1, 
            'state_id'=>1, 
            'email'=>'admin@yopmail.com'
        ]);

        $userAdmin->assignRole('admin');

        $usersSeller = User::factory(3)->create();
        foreach ($usersSeller as $user) {
            $user->assignRole('staff');
        }

        $usersClient = User::factory(10)->create();
        foreach ($usersClient as $user) {
            $user->assignRole('client');
        }

        Message::factory(10)->create();

        Request::factory(10)->create();

        $this->call(StoreSeeder::class);

        Category::factory(10)->create();

        $this->call(ProductSeeder::class);

        $this->call(TransactionSeeder::class);






    }
}
