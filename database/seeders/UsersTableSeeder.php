<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating dummy admin
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => 'password'
        ]);

    }
}
