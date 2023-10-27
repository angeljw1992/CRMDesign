@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Agregar Asistencia
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia.index') }}">
                    Asistencia
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.estudiante') }}
                        </th>
                        <td>
                            {{ $asistencium->estudiante->fullname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.asistencia') }}
                        </th>
                        <td>
                            {{ App\Models\Asistencium::ASISTENCIA_SELECT[$asistencium->asistencia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.fecha') }}
                        </th>
                        <td>
                            {{ $asistencium->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.materia') }}
                        </th>
                        <td>
                            {{ $asistencium->materia->materia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.horario') }}
                        </th>
                        <td>
                            {{ $asistencium->horario->horario ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.fecha_reposicion') }}
                        </th>
                        <td>
                            {{ $asistencium->fecha_reposicion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.clase_reposicion') }}
                        </th>
                        <td>
                            {{ $asistencium->clase_reposicion->materia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistencium.fields.horario_reposicion') }}
                        </th>
                        <td>
                            {{ $asistencium->horario_reposicion->horario ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection