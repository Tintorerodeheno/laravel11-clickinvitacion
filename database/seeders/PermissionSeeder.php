<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Ejecuta el seeder para la tabla permissions.
     */
    public function run()
    {
        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'view dashboard',
            'ver-graficas',
            'ver-crear-evento',
            'ver-eventos-listado',
            'ver-seguimiento-invitados',
            'ver-cuenta',
            'ver-comunicados'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
