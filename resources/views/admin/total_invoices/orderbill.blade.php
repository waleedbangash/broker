@extends('layouts.admin')
@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card ml-5 mt-5">
                <div class="card-header">
                    <h4 class="card-title">Order Bills</h4>
                </div>
               <div class="card-body">
                  <div class="row">
                  <div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Service Name</strong></td>
        							<td class="text-center"><strong>Service Numbers</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Total Price</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                @foreach ($addingbills as $addingbill)

    							<tr>
    								<td>{{$addingbill->service_name}}</td>
                                    <td class="text-center">{{$addingbill->service_number}}</td>
    								<td class="text-center">{{$addingbill->unit_of_price}}</td>
    								<td class="text-center">{{$addingbill->total_price_services}}</td>
    							</tr>
                                @endforeach

    							<tr>
                                  <td class="thick-line ">
                                      <strong>Total Price</strong><br><br>
                                      <strong>Servic Fee</strong>
                                </td>
    								<td class="thick-line ml-5">
                                        <div>{{$totalOrder_price}}</div><br>
                                        <div>{{$order->service_fee}}</div>
                                    <td class="thick-line "></td>
                                    <td class="thick-line "></td>
    							</tr>

    						</tbody>
    					</table>
    				</div>
                 </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
<style>
.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
