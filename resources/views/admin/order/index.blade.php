@extends('layouts.admin')
@section('content')


        <div class="card">
            <div class="card-body">
              <form method="get" action="{{route('admin.order.index')}}">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label class="required" for="service_name">Order Status*</label>
                      <select class="form-control form-control-lg"  id="user_type" name="id" required>
                          <option>Select</option>
                          <option value="1">Pending</option>
                         <option value="2">Accepted</option>
                         <option value="4">Completed</option>
                      </select>
                </div>
                 <div class="form-group">
                      <button class="btn btn-danger" type="submit">
                      Search
                      </button>
                  </div>
              </form>
            </div>
        </div>
   <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
   </div>

<div class="card">
    <div class="card-header">
        <div>
           @if(!empty($order_status->orderstatus))
             <strong>{{$order_status->orderstatus->order_status_name}}</strong>
            @endif
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Applicent Name</th>
                        <th>Number Of Services</th>
                        <th>Order Place</th>
                        <th>Order insertion Date</th>
                        <th>Order Deliver Date</th>
                        <th>See Details</th>
                        <th>delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                       @if($order->userdetail)
                    <tr data-entry-id="{{$order->id }}">
                          <td></td>
                        <td>{{$order->id}}</td>
                        <td>{{$order->userdetail->name}}</td>
                        <td>{{$order->orderservices_count}}</td>
                        <td>{{$order->order_address}} {{$order->order_city}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->order_deliver_date}}</td>
                        <td>
                            @can('order_detail')
                             <a href="{{route('admin.order.detail',$order->id)}}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            @endcan
                        </td>
                        <td>
                            @can('order_delete')
                             <section class="ml-1">
                                <form method="POST" action="{{route('admin.order.destroy',$order->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </section>
                            @endcan
                        </td>
                    </tr>
                    @endif
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
  @can('order_delete')

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.order.massDestroy')}}",
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
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
