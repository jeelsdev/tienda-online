<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Message;
use App\Models\Status;
use App\Models\Unlock;
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
        // creation of status
        Status::create(['name'=>'activo']);
        Status::create(['name'=>'inactivo']);
        Status::create(['name'=>'bloqueado']);
        Status::create(['name'=>'cerrado']);

        
        // directions
        $this->call(AddressSeeder::class);

        // roles
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'staff']);
        Role::create(['name'=>'client']);

        $userAdmin = User::factory()->create([
            'name'=>'Admin',
            'surnames'=>'admin',
            'birthday'=>'2000-01-01',
            'phone'=>'987123456',
            'address_id'=>1,
            'status_id'=>1,
            'email'=>'admin@yopmail.com',
            'profile'=>'https://via.placeholder.com/160x260.png/000033?text=profile+admin'
        ]);

        $userAdmin->assignRole('admin');

        $userStaff = User::factory(3)->create();
        foreach ($userStaff as $user) {
            $user->assignRole('staff');
        }

        $usersClient = User::factory(3)->create();
        foreach ($usersClient as $user) {
            $user->assignRole('client');
        }

        Message::factory(10)->create();

        Unlock::factory(10)->create();

        $this->call(StoreSeeder::class);

        Category::factory(10)->create();

        $this->call(ProductSeeder::class);

        $this->call(TransactionSeeder::class);






    }
}
