@extends('layouts.admin')

@push('plugin-styles')
@endpush

@section('content')
<div class="card">

    <div class="card-header">
        <h3>Client Orders</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Clientorder">
                <thead>
                    <tr>
                        <th></th>
                        <th>Order Deliver Date</th>
                        <th>Deliver Time</th>
                        <th>Number Of Guest</th>
                        <th>Notes</th>
                        <th>Order Address</th>
                        <th>Order City</th>
                        <th>Order Longitude</th>
                        <th>Order Latitude</th>
                        <th>Occation Time</th>
                        <th>Order Status</th>
                        <th>provider Name</th>
                        <th>client Name</th>
                        <th>provider_end_status</th>
                        <th>Delete</th>

                      </tr>
                </thead>
                    <tbody>

                            @foreach ($client_order as $orders)
                                <tr data-entry-id="{{$orders->id}}">
                                    <td></td>
                                    <td>{{$orders->order_deliver_date}}</td>
                                    <td>{{$orders->deliver_time}}</td>
                                    <td>{{$orders->number_of_guest}}</td>
                                    <td>{{$orders->nots}}</td>
                                    <td>{{$orders->order_address}}</td>
                                    <td>{{$orders->order_city}}</td>
                                    <td>{{$orders->order_longitude}}</td>
                                    <td>{{$orders->order_latitude}}</td>
                                    <td>{{$orders->occation_time}}</td>
                                    <td>{{$orders->orderstatus->order_status_name}}</td>
                                    @if($orders->provider)
                                    <td>{{$orders->provider->name}}</td>
                                    @else
                                    <td></td>
                                    @endif

                                    <td>{{$orders->userdetail->name}}</td>
                                    <td>{{$orders->provider_end_status}}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.client.orderdestroy',$orders->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </form>
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.client.ordermassDestroy')}}",
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


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Clientorder:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection


@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush


