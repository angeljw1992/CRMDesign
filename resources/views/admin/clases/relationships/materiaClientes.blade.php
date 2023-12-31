<div class="m-3">
    @can('cliente_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.clientes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.cliente.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.cliente.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-materiaClientes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.cliente.fields.fullname') }}
                            </th>
                            <th>
                                {{ trans('cruds.cliente.fields.identificacion') }}
                            </th>
                            <th>
                                {{ trans('cruds.cliente.fields.materia') }}
                            </th>
                            <th>
                                {{ trans('cruds.cliente.fields.horario') }}
                            </th>
                            <th>
                                {{ trans('cruds.cliente.fields.activo') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $key => $cliente)
                            <tr data-entry-id="{{ $cliente->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $cliente->fullname ?? '' }}
                                </td>
                                <td>
                                    {{ $cliente->identificacion ?? '' }}
                                </td>
                                <td>
                                    {{ $cliente->materia->materia ?? '' }}
                                </td>
                                <td>
                                    {{ $cliente->horario->horario ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Cliente::ACTIVO_SELECT[$cliente->activo] ?? '' }}
                                </td>
                                <td>
                                    @can('cliente_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.clientes.show', $cliente->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('cliente_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.clientes.edit', $cliente->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('cliente_delete')
                                        <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cliente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clientes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-materiaClientes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection