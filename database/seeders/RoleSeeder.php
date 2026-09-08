<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\RoleFactory;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # ROL DE UN ADMINISTRADOR
        Role::factory()->create([
            'nombre_rol' => 'Administrador',
            'descripcion_rol' => 'Rol exclusivo para administradores de la API.'
        ]);

        # ROL DE UN USUARIO NORMAL
        Role::factory()->create([
            'nombre_rol' => 'Usuario',
            'descripcion_rol' => 'Rol para usuarios normales de la API.'
        ]);
    }
}
