@extends('layouts.admin')

@push('plugin-styles')
@endpush
@section('content')
   <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    All Offers
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Offer">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>id</th>
                                        <th>See Details</th>
                                        <th>Date Offer Was Created</th>
                                        <th>Service Provider Name</th>
                                        <th>Total Value Of Submated Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalOrder_price=0;
                                    ?>
                                    @foreach ($offer as $offer)
                                        <tr data-entry-id="{{$offer->id}}">
                                            <td></td>
                                            <td>{{$offer->id}}</td>
                                            <td><a href="{{route('admin.order.offersdetail',[$order_id,$offer->provider_id])}}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                                            <td>{{$offer->insertion_date}}</td>
                                            <td>{{$offer->provider->name}}</td>
                                            <td>{{$offer->sum}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
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
    url: "{{route('admin.order.offermassDestroy')}}",
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
  let table = $('.datatable-Offer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection


