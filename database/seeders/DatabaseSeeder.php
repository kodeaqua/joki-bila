<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Secretary;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Ristina',
            'email' => 'ristina@unpak.ac.id',
            'password' => Hash::make('ristina!'),
            'has_super_access' => true
        ]);

        Secretary::create([
            'name' => 'Sekretaris Kesbang',
            'nip' => 'NIP Sekretaris Kesbang'
        ]);
    }
}
