<?php

return [
    'userManagement' => [
        'title'          => 'Gestionar usuarios',
        'title_singular' => 'Gestionar usuarios',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'cliente' => [
        'title'          => 'Clientes',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'fullname'                => 'Nombre Completo',
            'fullname_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'identificacion'          => 'Identificacion',
            'identificacion_helper'   => ' ',
            'fecha_nacimiento'        => 'Fecha Nacimiento',
            'fecha_nacimiento_helper' => ' ',
            'correo'                  => 'Correo',
            'correo_helper'           => ' ',
            'telefono'                => 'Teléfono',
            'telefono_helper'         => ' ',
            'materia'                 => 'Materia',
            'materia_helper'          => ' ',
            'horario'                 => 'Horario',
            'horario_helper'          => ' ',
            'nivel'                   => 'Nivel',
            'nivel_helper'            => ' ',
            'observaciones'           => 'Observaciones',
            'observaciones_helper'    => ' ',
            'activo'                  => 'Estado',
            'activo_helper'           => ' ',
        ],
    ],
    'pago' => [
        'title'          => 'Pagos',
        'title_singular' => 'Pago',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'estudiante'                    => 'Estudiante',
            'estudiante_helper'             => ' ',
            'concepto'                      => 'Concepto',
            'concepto_helper'               => ' ',
            'metodo'                        => 'Método de Pago',
            'metodo_helper'                 => ' ',
            'fecha'                         => 'Fecha de pago',
            'fecha_helper'                  => ' ',
            'comprobante'                   => 'Comprobante',
            'comprobante_helper'            => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
            'fecha_asignada_de_pago'        => 'Fecha Asignada De Pago',
            'fecha_asignada_de_pago_helper' => ' ',
            'monto'                         => 'Monto',
            'monto_helper'                  => ' ',
            'descripcion'                   => 'Descripcion',
            'descripcion_helper'            => ' ',
        ],
    ],
    'asistencium' => [
        'title'          => 'Asistencia',
        'title_singular' => 'Asistencia',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'estudiante'                => 'Estudiante',
            'estudiante_helper'         => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'fecha'                     => 'Fecha',
            'fecha_helper'              => ' ',
            'materia'                   => 'Materia',
            'materia_helper'            => ' ',
            'horario'                   => 'Horario',
            'horario_helper'            => ' ',
            'clase_reposicion'          => 'Clase Reposición',
            'clase_reposicion_helper'   => ' ',
            'horario_reposicion'        => 'Horario Reposicion',
            'horario_reposicion_helper' => ' ',
            'fecha_reposicion'          => 'Fecha Reposición',
            'fecha_reposicion_helper'   => ' ',
            'asistencia'                => 'Asistencia',
            'asistencia_helper'         => ' ',
        ],
    ],
    'clase' => [
        'title'          => 'Clase',
        'title_singular' => 'Clase',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'materia'           => 'Materia',
            'materia_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'horario' => [
        'title'          => 'Horario',
        'title_singular' => 'Horario',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'horario'           => 'Horario',
            'horario_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];