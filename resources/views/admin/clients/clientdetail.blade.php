@extends('layouts.admin')

@push('plugin-styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @foreach ($client as $client)
                <div class="card-header">Client Details</div><br>
                <div class="card->body  ml-3">
                    <div class="row">

                        <div class="col-md-6">
                                 <div class="card">
                                    <div class="d-flex  pt-2">
                                        <strong class="ml-3"> Name: </strong>
                                        <p class="ml-2">{{$client->name}}</p>
                                        </div>
                                 </div>
                                  <div class="card">
                                    <div class="d-flex  pt-2">
                                        <strong class="ml-3">Phone Number: </strong>
                                        <p class="ml-2">{{$client->phone_number}}</p>
                                    </div>
                                  </div>
                                 <div class="card">
                                    <div class="d-flex  pt-2">
                                        <strong class="ml-3">Date Of Registration To Application: </strong>
                                        <p class="ml-2">{{$client->Register_date}}</p>
                                    </div>
                                 </div>
                                <div class="card">
                                    <div class="d-flex  pt-2">
                                        <strong class="ml-3">Number Of Orders: </strong>
                                        <p class="ml-2">{{$client->count}}</p>
                                    </div>
                                </div>
                          </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Email:</strong>
                                    @if (!empty($client->email))
                                    <p class="ml-2">{{$client->email}}</p>
                                    @else
                                    <p class="ml-2">NA</p>

                                    @endif

                                </div>
                            </div>

                            <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Date of Last Entry: </strong>
                                    <p class="ml-2">{{$client->updated_at}}</p>
                                </div>
                            </div>
                                 <div class="card">
                                    <div class="d-flex  pt-2">
                                        <strong class="mt-2 ml-3">User Status:</strong>
                                        <form action="{{route('admin.client.userstatus',$client->id)}}" method="post" >
                                            @csrf
                                            <div class="form-group d-flex">
                                                <select  name="user_status" class="form-control ml-5 pl-3 d-flex" id="">
                                                    @if($client->user_status==1)
                                                    <option value="1" selected="selected">Active</option>
                                                     <option value="2">Forbidden</option>
                                                     @else
                                                     <option value="1">Active</option>
                                                     <option value="2" selected="selected">Forbidden</option>
                                                     @endif
                                                 </select>

                                                    <input type="submit" style="width: 180px" class="btn btn-success ml-4" value="save">


                                           </div>
                                            <div>
                                                @if(session()->has('msg'))
                                                    <div class="alert alert-success">
                                                    {{ session()->get('msg') }}
                                                </div>
                                                @endif
                                            </div>

                                        </form>
                                    </div>
                                 </div>

                        </div>

                </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-2">
                        <div class="d-flex">
                            <a href="{{route('admin.client.edit',$client->id)}}"  class="btn btn-success ">Edit</a>
                            <a href="{{route('admin.client.orders',$client->id)}}" class="btn btn-success ml-1">See All Customer Order</a>
                            <section class="ml-1">
                                <form method="POST" action="{{route('admin.client.destroy',$client->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </section>
                            <a href="{{route('admin.clients.index')}}"  class="btn btn-success ml-1">Back To List</a>

                        </div>

                    </div>
                </div><br><br>
                @endforeach
            </div>
        </div>
  </div>
@endsection
@section('scripts')
@parent

@endsection


@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush


