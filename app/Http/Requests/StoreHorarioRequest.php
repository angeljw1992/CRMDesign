<?php

namespace App\Http\Requests;

use App\Models\Horario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHorarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('horario_create');
    }

    public function rules()
    {
        return [
            'horario' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
