@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.horario.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.horarios.update", [$horario->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="horario">{{ trans('cruds.horario.fields.horario') }}</label>
                <input class="form-control timepicker {{ $errors->has('horario') ? 'is-invalid' : '' }}" type="text" name="horario" id="horario" value="{{ old('horario', $horario->horario) }}">
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.horario_helper') }}</span>
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