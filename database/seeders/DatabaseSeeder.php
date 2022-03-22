<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeeder::class);
        User::create([
            'name'=>'Marlon Calla Pérez',
            'email'=>'marlon@gmail.com',
            'phone'=>'962174883',
            'role'=>1,
            'status'=>1,
            'password'=>bcrypt('123456789')

        ])->assignRole('Administrador');
  
    }
}
