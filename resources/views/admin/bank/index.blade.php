@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @can('bank_create')
            <a class="btn btn-success" href="{{route('admin.bank.create')}}">
                Add
            </a>
            @endcan
        </div>
    </div>

<div class="card">
    <div class="card-header">
       Bank Accounts
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-bank">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Bank Name</th>
                        <th>Bank Logo</th>
                        <th>Account Number</th>
                        <th>Organization Name</th>
                         <th>Edit</th>
                         <th>Delete</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($bank as $bank )
                    <tr data-entry-id="{{$bank->id }}">
                        <td></td>
                        <td>{{$bank->id}}</td>
                        <td>{{$bank->bank_name}}</td>
                        <td><img src="{{'/'.$bank->bank_logo}}" height="30px"/></td>
                        <td>{{$bank->account_number}}</td>
                        <td>{{$bank->organization_name	}}</td>
                        <td>
                            @can('bank_edit')
                            <a href="{{route('admin.bank.edit',$bank->id)}}" class="btn btn-info"><i class="fas fa-pencil-square" aria-hidden="true"></i></a>
                            @endcan
                        </td>
                         <td>
                            @can('bank_delete')
                             <form method="POST" action="{{ route('admin.bank.delete',$bank->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  @can('bank_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.bank.massDestroy')}}",
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
  let table = $('.datatable-bank:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
