<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bouli;
use App\Models\Role;
use App\Models\User;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Brand::factory(10)->create();
        Bouli::factory(10)->create();

        $role = new Role([
            'name' => 'admin',
            'key_value' => 'admin',
        ]);
        $role->save();


        $user = new User([
            'name' => 'Administrador',
            'email' => 'admin@user.com',
            'phone' => '631631631',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
        ]);


        $user->save();
        $user->roles()->attach($role, ['created_at' => Carbon::now()]);

    }
}
