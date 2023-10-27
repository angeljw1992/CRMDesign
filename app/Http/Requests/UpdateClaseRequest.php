<?php

namespace App\Http\Requests;

use App\Models\Clase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clase_edit');
    }

    public function rules()
    {
        return [
            'materia' => [
                'string',
                'required',
            ],
        ];
    }
}
