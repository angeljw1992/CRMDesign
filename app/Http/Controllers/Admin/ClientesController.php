<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Clase;
use App\Models\Cliente;
use App\Models\Horario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::with(['materia', 'horario'])->get();

        $clases = Clase::get();

        $horarios = Horario::get();

        return view('admin.clientes.index', compact('clases', 'clientes', 'horarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materias = Clase::pluck('materia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarios = Horario::pluck('horario', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientes.create', compact('horarios', 'materias'));
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());

        return redirect()->route('admin.clientes.index');
    }

    public function edit(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materias = Clase::pluck('materia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarios = Horario::pluck('horario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cliente->load('materia', 'horario');

        return view('admin.clientes.edit', compact('cliente', 'horarios', 'materias'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('admin.clientes.index');
    }

    public function show(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->load('materia', 'horario', 'estudiantePagos', 'estudianteAsistencia');

        return view('admin.clientes.show', compact('cliente'));
    }

    public function destroy(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->delete();

        return back();
    }

    public function massDestroy(MassDestroyClienteRequest $request)
    {
        $clientes = Cliente::find(request('ids'));

        foreach ($clientes as $cliente) {
            $cliente->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
