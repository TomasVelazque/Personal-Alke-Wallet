<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # USUARIO QUE ES ADMINISTRADOR
        User::factory()->create([
            'name' => 'administrador',
            'email' => 'admintest@gmail.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
        ]);

        # USUARIO NORMAL
        User::factory()->create([
            'name' => 'testuser',
            'email' => 'testuser@gmail.com',
            'password' => 'password',
            'role_id' => 2,
        ]);
    }
}
