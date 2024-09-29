<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Barang;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::factory(3)->create();

        Category::Create([
            'nama' => 'Beras'
        ]);

        Category::Create([
            'nama' => 'Sayur'
        ]);

        Category::Create([
            'nama' => 'Minyak'
        ]);

        Barang::factory(12)->create();
    }
}