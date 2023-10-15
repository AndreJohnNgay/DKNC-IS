<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UnitSeeder::class,
            TypeSeeder::class,
            ItemSeeder::class,
        ]);

        User::create([
            'username' => 'e',
            'password' => Hash::make('eeeeeeee'),
            'role' => 'employee',
            'email' => 'e@e',
            'first_name' => 'andre the',
            'last_name' => 'employee',
            'address' => 'address',
            'contact_number' => '09123456789',
            'emergency_contact' => '09123456789',
        ]);

        User::create([
            'username' => 'o',
            'password' => Hash::make('oooooooo'),
            'role' => 'owner',
            'email' => 'o@o',
            'first_name' => 'andre the',
            'last_name' => 'owner',
            'address' => 'address',
            'contact_number' => '09123456789',
            'emergency_contact' => '09123456789',
        ]);
    }
}
