@extends('layouts.admin')
@section('content')
@can('ads_create')
    <div style="margin-bottom: 10px;" class="row">

    </div>
@endcan
<div class="card">
    <div class="card-header">
      <a class="btn btn-success" href="{{route('admin.ads.create')}}">
        Add
    </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ads">
                <thead>
                  <tr>
                    <th></th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Anouncement Text</th>
                    <th>Url</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $ads)
                    <tr data-entry-id="{{$ads->id}}">
                        <td></td>
                        <td>
                            @can('ads_delete')
                            <a href="{{route('admin.ads.destroy',$ads->id)}}" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>
                            @endcan

                        </td>
                        <td>
                            @can('ads_edit')
                            <a href="{{route('admin.ads.edit',$ads->id)}}" class="btn btn-info"><i class="fas fa-pencil-square" aria-hidden="true"></i></a>
                        @endcan
                        </td>
                        <td>{{$ads->text}}</td>
                        <td>{{$ads->url}}</td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  @can('ads_delete')

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.ads.massDestroy')}}",
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
  let table = $('.datatable-Ads:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
