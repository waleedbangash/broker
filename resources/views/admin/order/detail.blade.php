@extends('layouts.admin')
@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    @foreach($order as $order)

                    <h4 class="card-title">{{$order->orderstatus->order_status_name}} Order Details</h4>


                </div>
                 <div class="card-body">

                     <div class="row">
                            <div class="col-md-6">
                                    <div class="d-flex">
                                    <p >Applicant Name: </p>
                                    <p class="ml-2">{{$order->userdetail->name}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p >Date  Request Was Created: </p>
                                        <p class="ml-2">{{$order->created_at}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p >Occation Time: </p>
                                        <p class="ml-2">{{$order->occation_time}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p >Number Of Guest: </p>
                                        <p class="ml-2">{{$order->number_of_guest}}</p>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="d-flex">
                                        <p>Service Provider Name: </p>
                                        @if (!empty($order->provider))
                                        <p class="ml-2">{{$order->provider->name}}</p>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        <p>Order Deliver Date: </p>
                                        <p class="ml-2">{{$order->order_deliver_date}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Deliver  Time: </p>
                                        <p class="ml-2">{{$order->deliver_time}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p>Notes: </p>
                                        <p class="ml-2">{{$order->nots}}</p>
                                    </div>
                            </div>
                     </div><br><br>
                     <div class="row">
                       <div class="col-md-12">
                        <div>
                           Services
                        </div><hr>
                        <div class="row">
                          <?php $totalCost=0;?>
                           @foreach ($offer as $offer)
                           @if(!empty($offer->orderService->lkpservices))
                               <div class="col-md-3">

                                   <div class="card ">

                                       <div class="card-header">
                                            <div>

                                                <img src="{{'/'.$offer->orderService->lkpservices->service_picture}}" style="height:100px; width:100px; margin:20px" alt=""><br>
                                                <strong >{{$offer->orderService->lkpservices->service_name}}</strong>

                                            </div>
                                       </div>
                                     <div class="card-body">
                                        <div>
                                            <section>

                                                <p>Numbers: {{$offer->orderService->service_numbers}}</p>
                                                <p>Price :{{$offer->unit_of_price}}</p>
                                                <p>Total Price :{{$offer->total_price_services}}</p>

                                            </section>
                                       </div>
                                     </div>
                                </div>
                          </div>
                          @endif
                        @endforeach
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="card" style="background-color: rgb(53, 53, 66); color:white">
                                <div class="card-body">
                                    <p class="pt-3" style="font-size:20px">Total Price of order: {{$totalOrder_price}}</p>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6 ml-5 mt-4">
                             <div>
                                 <a href="{{route('admin.order.invoice',$order->id)}}" class="btn btn-success">Invoice review</a>
                                 <a  href="{{route('admin.order.offers',$order->id)}}" class="btn btn-success">See all Offers</a>
                                 <a href="{{route('admin.order.conversation',$order->id)}}" class="btn btn-success ">Conversation review</a>
                             </div>
                        </div>
                    </div>
               </div>
               @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush

