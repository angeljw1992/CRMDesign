@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clase.fields.materia') }}
                        </th>
                        <td>
                            {{ $clase->materia }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#materia_clientes" role="tab" data-toggle="tab">
                {{ trans('cruds.cliente.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#materia_asistencia" role="tab" data-toggle="tab">
                {{ trans('cruds.asistencium.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="materia_clientes">
            @includeIf('admin.clases.relationships.materiaClientes', ['clientes' => $clase->materiaClientes])
        </div>
        <div class="tab-pane" role="tabpanel" id="materia_asistencia">
            @includeIf('admin.clases.relationships.materiaAsistencia', ['asistencia' => $clase->materiaAsistencia])
        </div>
    </div>
</div>

@endsection