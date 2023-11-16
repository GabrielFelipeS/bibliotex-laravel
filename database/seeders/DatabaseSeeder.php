<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LivrosSeeder::class,
            VendedoresSeeder::class,
            EnderecosSeeder::class,
            ComprasSeeder::class,
            UsersSeeder::class,    
        ]);
    }
}
