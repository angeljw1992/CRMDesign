<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'cliente_create',
            ],
            [
                'id'    => 20,
                'title' => 'cliente_edit',
            ],
            [
                'id'    => 21,
                'title' => 'cliente_show',
            ],
            [
                'id'    => 22,
                'title' => 'cliente_delete',
            ],
            [
                'id'    => 23,
                'title' => 'cliente_access',
            ],
            [
                'id'    => 24,
                'title' => 'pago_create',
            ],
            [
                'id'    => 25,
                'title' => 'pago_edit',
            ],
            [
                'id'    => 26,
                'title' => 'pago_show',
            ],
            [
                'id'    => 27,
                'title' => 'pago_delete',
            ],
            [
                'id'    => 28,
                'title' => 'pago_access',
            ],
            [
                'id'    => 29,
                'title' => 'asistencium_create',
            ],
            [
                'id'    => 30,
                'title' => 'asistencium_edit',
            ],
            [
                'id'    => 31,
                'title' => 'asistencium_show',
            ],
            [
                'id'    => 32,
                'title' => 'asistencium_delete',
            ],
            [
                'id'    => 33,
                'title' => 'asistencium_access',
            ],
            [
                'id'    => 34,
                'title' => 'clase_create',
            ],
            [
                'id'    => 35,
                'title' => 'clase_edit',
            ],
            [
                'id'    => 36,
                'title' => 'clase_show',
            ],
            [
                'id'    => 37,
                'title' => 'clase_delete',
            ],
            [
                'id'    => 38,
                'title' => 'clase_access',
            ],
            [
                'id'    => 39,
                'title' => 'horario_create',
            ],
            [
                'id'    => 40,
                'title' => 'horario_edit',
            ],
            [
                'id'    => 41,
                'title' => 'horario_show',
            ],
            [
                'id'    => 42,
                'title' => 'horario_delete',
            ],
            [
                'id'    => 43,
                'title' => 'horario_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
