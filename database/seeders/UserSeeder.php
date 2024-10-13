<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        User::create([
            'name' => '{ JEBC-DeV }',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'role' => 0,
        ]);

        // user
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'role' => 1,
        ]);

        // guest
        User::create([
            'name' => 'Guest',
            'email' => 'guest@guest.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'role' => 2,
        ]);
    }

                /* ROLES
                0 => admin 'Administrador'
                1 => user 'Usuario'
                2 => guest 'Invitado'
             */
}
