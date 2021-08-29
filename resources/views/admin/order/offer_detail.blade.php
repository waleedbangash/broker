@extends('layouts.admin')
@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Offers Detail</h4>
                </div>
            <div class="card-body">

               <div class="row">
                <div class="col-md-12">
                    <div>
                        <div>
                           <p>Offer Detail</p>
                        </div>
                    </div><hr>

                    <div class="row">
                        <?php $totalCost=0;?>
                        @foreach ($offers as $offer)

                               <div class="col-md-3">
                                   <div class="card">
                                       <div class="card-header">
                                        <div>
                                            <img src="{{'/'.$offer->orderService->lkpservices->service_picture}}"  style="height:100px; width:100px; margin:20px" alt="">
                                            <p>{{$offer->orderService->lkpservices->service_name}}</p>
                                        </div>
                                       </div>
                                       <div class="card-body">
                                        <div>
                                            <section>

                                                <p>numbers: {{$offer->orderServiceservice_numbers}}</p>
                                                <p>Price :{{$offer->unit_of_price}}</p>
                                                <p>Total Price :{{$offer->total_price_services}}</p>
                                            </section>
                                      </div>
                                       </div>
                                   </div>


                          </div>

                        @endforeach
                    </div><br>
                    <div class="row">
                        <div class="col-md-4 ml-5">
                            <div class="card pt-4" style="background-color:rgb(63, 64, 75); color:white">
                               <div class="card-bocy">
                                <p class="pl-4 pb-1" style="font-size:20px">Total Price of order: {{$totalOrder_price}}</p>
                               </div>
                            </div>

                        </div>

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
