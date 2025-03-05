<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Person;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'username' => 'operator',
            'password' => Hash::make('password'),
            'role' => 'operator',
        ]);

        // Barang::factory(100)->create();

        // Person::factory()->create([
        //     'name' => 'AHMAD HAKIM MAKARIM',
        //     'rfid' => '0453248145',
        //     'nip' => '1234567890',
        //     'no_wa' => '081234567890',
        // ]);
    }
}
