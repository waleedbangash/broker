@extends('layouts.admin')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form method="get" action="{{route('admin.total_invoices.index')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="date">From Date</label>
                    <input class="form-control" id="date" name="from_date" placeholder="MM/DD/YYY" type="date"/>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="form-group "> <!-- Date input -->

                    <label class="control-label" for="date">To Date</label>
                    <input class="form-control" id="date" name="to_date" placeholder="MM/DD/YYY" type="date"/>
                    </div>
                </div>
                <div class="form-group"> <!-- Submit button -->
                    <button class="btn btn-primary mt-4" name="submit" type="submit">Submit</button>
                </div>
            </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="card">

    <div class="card-header">
        @if(!empty($billcount))
        <p>Number Of Bills Within This Specified Period <strong class="pl-4">Bill {{$billcount}}</strong></p>
        @endif
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Total_invoice">
                <thead>
                    <tr>
                        <th></th>
                        <th>See Detail</th>
                        <th>Place of Order</th>
                        <th>Order Deliver Date</th>
                        <th>Created At Date</th>
                        <th>Number Of Services</th>
                        <th>Client Name</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                    <tr data-entry-id="{{$order->id }}">
                        <td></td>
                       <td>
                           @can('total_invoice_detail')
                              <a href="{{route('admin.total_invoices.orderbill',$order->id)}}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            @endcan
                        </td>
                       <td>{{$order->order_address}} {{$order->order_city}}</td>
                       <td>{{$order->order_deliver_date}}</td>
                       <td>{{$order->created_at}}</td>
                       <td>{{$order->count}}</td>
                       <td>{{$order->userdetail->name}}</td>

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
  @can('total_invoice_delete')

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.total_invoices.massDestroy')}}",
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
  let table = $('.datatable-Total_invoice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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


