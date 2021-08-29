@extends('layouts.admin')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class>
        <a href="{{route('admin.provider.create')}}" class="btn btn-success">Add</a>
    </div><br>
    <div class="card">
        <div class="card-header">
            <h2>Providers</h2>
        </div>
      <div class="card-body">
        <form method="get" action="{{route('admin.providers.index')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group"> <!-- Date input -->
                        <label class="control-label" for="date">Shop Name</label>
                        <input class="form-control" id="date" name="name" type="text"/>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="service_name">User Status</label>
                        <select class="form-control "  id="user_type" name="user_status" required>
                            <option value="-1">Select</option>
                            <option value="1">Active</option>
                           <option value="2">Forbiden</option>
                        </select>
                  </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group"> <!-- Date input -->
                        <label class="control-label" for="date">Register Date</label>
                        <input class="form-control" id="date" name="register_date" placeholder="MM/DD/YYY" type="date"/>
                    </div>
                </div>

                <div class="form-group"> <!-- Submit button -->
                    <button class="btn btn-danger mt-4" name="submit" type="submit">search</button>
                </div>
            </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="card">

    <div class="card-header">


    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Provider">
                <thead>
                    <tr>
                        <th></th>
                        <th>see Detail</th>
                        <th>Service Provider status</th>
                        <th> Number Of Order</th>
                        <th>Date Of Last Entry</th>
                        <th>Register Date</th>
                        <th>Shop Name</th>
                      </tr>
                </thead>
                    <tbody>
                      @if($provider)
                            @foreach ($provider as $providers)
                                <tr data-entry-id="{{$providers->id}}">
                                    <td></td>
                                    <td>
                                        @can('provider_detail')
                                        <a href="{{route('admin.provider.detail',$providers->id)}}"  class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                        @endcan
                                    </td>
                                    <td>{{$providers->user_statuse->status_name}}</td>
                                    <td>{{$providers->count}}</td>
                                    <td>{{$providers->updated_at}}</td>
                                    <td>{{$providers->Register_date}}</td>
                                    <td>{{$providers->name}}</td>
                                </tr>
                            @endforeach
                        @endif
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
  @can('provider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.provider.massDestroy')}}",
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
  let table = $('.datatable-Provider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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


