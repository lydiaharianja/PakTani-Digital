<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => '99',
            'email_verified_at' => now(),
            'pass' => Hash::make('admin')
        ]);

        User::create([
            'nama' => 'petani',
            'email' => 'petani@gmail.com',
            'role_id' => '90',
            'email_verified_at' => now(),
            'pass' => Hash::make('petani')
        ]);
    }
}
