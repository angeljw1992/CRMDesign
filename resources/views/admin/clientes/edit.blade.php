@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cliente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clientes.update", [$cliente->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="fullname">{{ trans('cruds.cliente.fields.fullname') }}</label>
                <input class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" type="text" name="fullname" id="fullname" value="{{ old('fullname', $cliente->fullname) }}" required>
                @if($errors->has('fullname'))
                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.fullname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identificacion">{{ trans('cruds.cliente.fields.identificacion') }}</label>
                <input class="form-control {{ $errors->has('identificacion') ? 'is-invalid' : '' }}" type="text" name="identificacion" id="identificacion" value="{{ old('identificacion', $cliente->identificacion) }}" required>
                @if($errors->has('identificacion'))
                    <span class="text-danger">{{ $errors->first('identificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.identificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_nacimiento">{{ trans('cruds.cliente.fields.fecha_nacimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}" required>
                @if($errors->has('fecha_nacimiento'))
                    <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.fecha_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correo">{{ trans('cruds.cliente.fields.correo') }}</label>
                <input class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" type="email" name="correo" id="correo" value="{{ old('correo', $cliente->correo) }}" required>
                @if($errors->has('correo'))
                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.correo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono">{{ trans('cruds.cliente.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="number" name="telefono" id="telefono" value="{{ old('telefono', $cliente->telefono) }}" step="1" required>
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="materia_id">{{ trans('cruds.cliente.fields.materia') }}</label>
                <select class="form-control select2 {{ $errors->has('materia') ? 'is-invalid' : '' }}" name="materia_id" id="materia_id">
                    @foreach($materias as $id => $entry)
                        <option value="{{ $id }}" {{ (old('materia_id') ? old('materia_id') : $cliente->materia->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('materia'))
                    <span class="text-danger">{{ $errors->first('materia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.materia_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.cliente.fields.nivel') }}</label>
                <select class="form-control {{ $errors->has('nivel') ? 'is-invalid' : '' }}" name="nivel" id="nivel">
                    <option value disabled {{ old('nivel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Cliente::NIVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nivel', $cliente->nivel) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nivel'))
                    <span class="text-danger">{{ $errors->first('nivel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nivel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="horario_id">{{ trans('cruds.cliente.fields.horario') }}</label>
                <select class="form-control select2 {{ $errors->has('horario') ? 'is-invalid' : '' }}" name="horario_id" id="horario_id">
                    @foreach($horarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('horario_id') ? old('horario_id') : $cliente->horario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.horario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.cliente.fields.observaciones') }}</label>
                <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $cliente->observaciones) }}">
                @if($errors->has('observaciones'))
                    <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.cliente.fields.activo') }}</label>
                <select class="form-control {{ $errors->has('activo') ? 'is-invalid' : '' }}" name="activo" id="activo" required>
                    <option value disabled {{ old('activo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Cliente::ACTIVO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('activo', $cliente->activo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('activo'))
                    <span class="text-danger">{{ $errors->first('activo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.activo_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection