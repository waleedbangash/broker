@extends('layouts.admin')

@push('plugin-styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @foreach($provider as $provider)
                <div class="card-header">Provider Details</div><br>
                <div class="card->body  ml-3">
                  <div class="row">
                       <div class="col-md-6">
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Shop Name: </strong>
                                    <p class="ml-2">{{$provider->name}}</p>
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Phone Number: </strong>
                                    <p class="ml-2">{{$provider->phone_number}}</p>
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Password: </strong>
                                    <p class="ml-2">********</p>
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Registration Date: </strong>
                                    <p class="ml-2">{{$provider->Register_date}}</p>
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Number Of Orders: </strong>
                                    <p class="ml-2">{{$provider->count}}</p>
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Commercial Registration: </strong>
                                    <p class="ml-2">{{$provider->commercial_registration_no}}</p>
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Email: </strong>
                                    @if (!empty($provider->email))
                                    <p class="ml-2">{{$provider->emial}}</p>
                                    @else
                                    <p class="ml-2">NA</p>
                                    @endif
                                </div>
                           </div>
                           <div class="card">
                                <div class="d-flex pt-2">
                                    <strong class="ml-3">Date of Last Entry: </strong>
                                    <p class="ml-2">{{$provider->updated_at}}</p>
                                </div>
                           </div>
                     </div>
                    <div class="col-md-6">
                       <div class="card">
                           <div class="d-flex pt-2">
                              <strong class="mt-2 ml-3">User Status:</strong>
                              <form action="{{route('admin.provider.userstatus',$provider->id)}}" method="post">
                                    @csrf
                                    <div class="form-group d-flex">
                                        <select  name="user_status" class="form-control ml-5 pl-3 d-flex" id="">
                                            @if($provider->user_status==1)
                                            <option value="1" selected="selected">Active</option>
                                            <option value="2">Forbidden</option>
                                            @else
                                            <option value="1">Active</option>
                                            <option value="2" selected="selected">Forbidden</option>
                                            @endif
                                        </select>
                                        <input type="submit" style="width:180px;" class="btn btn-success ml-4" value="save">
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
                      <div class="card">
                        <div class="d-flex pt-2">
                            <strong class="mt-2 ml-3">Verification Status:</strong>
                             <form action="{{route('admin.provider.verify',$provider->id)}}" method="post" >
                                 @csrf
                                 <div class="form-group d-flex">
                                    <select  name="verified" class="form-control ml-2 pl-4 d-flex" id="">
                                        @if($provider->verified==0)
                                        <option value="0" selected="selected">Unverify</option>
                                         <option value="1">Verify</option>
                                         @elseif($provider->verified==1)
                                         <option value="0">Unverify</option>
                                         <option value="1" selected="selected">Verify</option>
                                         @endif
                                     </select>
                                     <input class="btn btn-success ml-4" style="width:180px;"  type="submit" value="save">
                               </div>
                               <div>
                                 @if(session()->has('msgs'))
                                     <div class="alert alert-success">
                                     {{ session()->get('msgs') }}
                                 </div>
                                 @endif
                             </div>
                             </form>
                         </div>
                      </div>
                      <div class="card">
                            <div class="d-flex pt-2">
                                <strong class="ml-3">Shop Place: </strong>
                                &nbsp; &nbsp; &nbsp;<a href="#" class="btn btn-info ml-5 pl-" onclick="getAddressFromLatLng();">Get Location</a>
                                <input type="hidden" id="address-inputs" name="loc_name" class="map-input">
                                <input type="hidden" class = "px-0 pt-1 border-1 m-0" type="text"  name="latitude" id="address-latitud" value="{{$provider->shop_latitude}}" />
                                <input  type="hidden" class = "px-0 pt-1 border-1 m-0" type="text"  name="longitude" id="address-longitud"  value="{{$provider->shop_longitude}}"  onLoad="getAddressFromLatLng();" />
                              </div>


                        <div class="d-flex mt-3">
                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="address-map">
                                </div>
                            </div>
                       </div>
                      </div>
                    </div>
               </div>
           </div>
           <div class="row">
              <div class="col-md-4 offset-md-4">
                  <div class="d-flex">
                            <a href="{{route('admin.providers.index')}}"  class="btn btn-success mb-3">Back To List</a>
                            @can('provider_delete')
                            <section class="ml-1">
                                <form method="POST" action="{{route('admin.provider.destroy',$provider->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </section>
                            @endcan
                            <a href="{{route('admin.provider.edit',$provider->id)}}"  class="btn btn-success mb-3 ml-1">Edit</a>

                        </div>
                    </div>
                </div><br><br>
                @endforeach
          </div>
     </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">

              </div>
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

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
