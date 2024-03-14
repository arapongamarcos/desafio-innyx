<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Utils\Uuid;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Product::query()->delete();
        \App\Models\Category::query()->delete();
        \App\Models\Category::factory()->create([
            'id' => Uuid::random(),
            'name' => 'Padrão'
        ]);
    }
}
