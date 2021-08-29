@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Contact">
                <thead>
                  <tr>
                    <th></th>
                    <th>id</th>
                    <th>name</th>
                    <th>Contact Type</th>
                    <th>User Type</th>
                    <th>Contact Date</th>
                    <th>Read status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($contact as $contact)
                    <tr data-entry-id="{{$contact->id}}">
                        <td></td>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->userDetail->name}}</td>
                        <td>{{$contact->contactType->contact_name}}</td>
                        <td>{{$contact->userDetail->userType->type_name}}</td>
                        <td>{{$contact->created_at}}</td>
                        @if ($contact->read_status==0)
                        <td style="color:black bold">..</td>
                        @elseif($contact->read_status==1)
                        <td><i style="color: blue" class="fas fa-check"></i></td>
                        @endif

                       <td><a href="{{route('admin.contact.detail',$contact->id)}}">view</a></td>
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
    url: "",
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
  let table = $('.datatable-Contact:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
