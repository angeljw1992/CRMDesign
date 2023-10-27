<?php

namespace App\Http\Requests;

use App\Models\Horario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHorarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('horario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:horarios,id',
        ];
    }
}
