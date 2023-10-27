<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClaseRequest;
use App\Http\Requests\StoreClaseRequest;
use App\Http\Requests\UpdateClaseRequest;
use App\Models\Clase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClasesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clases = Clase::all();

        return view('admin.clases.index', compact('clases'));
    }

    public function create()
    {
        abort_if(Gate::denies('clase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clases.create');
    }

    public function store(StoreClaseRequest $request)
    {
        $clase = Clase::create($request->all());

        return redirect()->route('admin.clases.index');
    }

    public function edit(Clase $clase)
    {
        abort_if(Gate::denies('clase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clases.edit', compact('clase'));
    }

    public function update(UpdateClaseRequest $request, Clase $clase)
    {
        $clase->update($request->all());

        return redirect()->route('admin.clases.index');
    }

    public function show(Clase $clase)
    {
        abort_if(Gate::denies('clase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clase->load('materiaClientes', 'materiaAsistencia');

        return view('admin.clases.show', compact('clase'));
    }

    public function destroy(Clase $clase)
    {
        abort_if(Gate::denies('clase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clase->delete();

        return back();
    }

    public function massDestroy(MassDestroyClaseRequest $request)
    {
        $clases = Clase::find(request('ids'));

        foreach ($clases as $clase) {
            $clase->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
