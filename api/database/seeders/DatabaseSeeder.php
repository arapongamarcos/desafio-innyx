<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Utils\Uuid;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::query()->delete();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
        ]);
        Product::query()->delete();
        Category::query()->delete();
        Category::factory()->create([
            'id' => Uuid::random(),
            'name' => 'Padrão'
        ]);
    }
}
