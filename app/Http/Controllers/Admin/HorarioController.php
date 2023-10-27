<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHorarioRequest;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Models\Horario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HorarioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarios = Horario::all();

        return view('admin.horarios.index', compact('horarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('horario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.horarios.create');
    }

    public function store(StoreHorarioRequest $request)
    {
        $horario = Horario::create($request->all());

        return redirect()->route('admin.horarios.index');
    }

    public function edit(Horario $horario)
    {
        abort_if(Gate::denies('horario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.horarios.edit', compact('horario'));
    }

    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        $horario->update($request->all());

        return redirect()->route('admin.horarios.index');
    }

    public function show(Horario $horario)
    {
        abort_if(Gate::denies('horario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->load('horarioClientes', 'horarioAsistencia');

        return view('admin.horarios.show', compact('horario'));
    }

    public function destroy(Horario $horario)
    {
        abort_if(Gate::denies('horario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->delete();

        return back();
    }

    public function massDestroy(MassDestroyHorarioRequest $request)
    {
        $horarios = Horario::find(request('ids'));

        foreach ($horarios as $horario) {
            $horario->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
