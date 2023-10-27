@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.asistencium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asistencia.update", [$asistencium->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="estudiante_id">{{ trans('cruds.asistencium.fields.estudiante') }}</label>
                <select class="form-control select2 {{ $errors->has('estudiante') ? 'is-invalid' : '' }}" name="estudiante_id" id="estudiante_id" required>
                    @foreach($estudiantes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('estudiante_id') ? old('estudiante_id') : $asistencium->estudiante->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('estudiante'))
                    <span class="text-danger">{{ $errors->first('estudiante') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.estudiante_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.asistencium.fields.asistencia') }}</label>
                <select class="form-control {{ $errors->has('asistencia') ? 'is-invalid' : '' }}" name="asistencia" id="asistencia" required>
                    <option value disabled {{ old('asistencia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Asistencium::ASISTENCIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('asistencia', $asistencium->asistencia) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('asistencia'))
                    <span class="text-danger">{{ $errors->first('asistencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.asistencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.asistencium.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $asistencium->fecha) }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="materia_id">{{ trans('cruds.asistencium.fields.materia') }}</label>
                <select class="form-control select2 {{ $errors->has('materia') ? 'is-invalid' : '' }}" name="materia_id" id="materia_id">
                    @foreach($materias as $id => $entry)
                        <option value="{{ $id }}" {{ (old('materia_id') ? old('materia_id') : $asistencium->materia->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('materia'))
                    <span class="text-danger">{{ $errors->first('materia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.materia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="horario_id">{{ trans('cruds.asistencium.fields.horario') }}</label>
                <select class="form-control select2 {{ $errors->has('horario') ? 'is-invalid' : '' }}" name="horario_id" id="horario_id">
                    @foreach($horarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('horario_id') ? old('horario_id') : $asistencium->horario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.horario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_reposicion">{{ trans('cruds.asistencium.fields.fecha_reposicion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_reposicion') ? 'is-invalid' : '' }}" type="text" name="fecha_reposicion" id="fecha_reposicion" value="{{ old('fecha_reposicion', $asistencium->fecha_reposicion) }}">
                @if($errors->has('fecha_reposicion'))
                    <span class="text-danger">{{ $errors->first('fecha_reposicion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.fecha_reposicion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clase_reposicion_id">{{ trans('cruds.asistencium.fields.clase_reposicion') }}</label>
                <select class="form-control select2 {{ $errors->has('clase_reposicion') ? 'is-invalid' : '' }}" name="clase_reposicion_id" id="clase_reposicion_id">
                    @foreach($clase_reposicions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('clase_reposicion_id') ? old('clase_reposicion_id') : $asistencium->clase_reposicion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('clase_reposicion'))
                    <span class="text-danger">{{ $errors->first('clase_reposicion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.clase_reposicion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="horario_reposicion_id">{{ trans('cruds.asistencium.fields.horario_reposicion') }}</label>
                <select class="form-control select2 {{ $errors->has('horario_reposicion') ? 'is-invalid' : '' }}" name="horario_reposicion_id" id="horario_reposicion_id">
                    @foreach($horario_reposicions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('horario_reposicion_id') ? old('horario_reposicion_id') : $asistencium->horario_reposicion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario_reposicion'))
                    <span class="text-danger">{{ $errors->first('horario_reposicion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistencium.fields.horario_reposicion_helper') }}</span>
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