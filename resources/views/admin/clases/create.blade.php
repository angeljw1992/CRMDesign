@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clase.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clases.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="materia">{{ trans('cruds.clase.fields.materia') }}</label>
                <input class="form-control {{ $errors->has('materia') ? 'is-invalid' : '' }}" type="text" name="materia" id="materia" value="{{ old('materia', '') }}" required>
                @if($errors->has('materia'))
                    <span class="text-danger">{{ $errors->first('materia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clase.fields.materia_helper') }}</span>
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