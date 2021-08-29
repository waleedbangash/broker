@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Provider</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.provider.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="required" for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="required" for="phone_number">Phone Number</label>
                        <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
                        @if($errors->has('phone_number'))
                        <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="required" for="password">Password</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label  for="commercial_registration_no">Commercial Registration:</label>
                        <input class="form-control {{ $errors->has('commercial_registration_no') ? 'is-invalid' : '' }}" type="text" name="commercial_registration_no" id="commercial_registration_no" value="">
                        @if($errors->has('commercial_registration_no'))
                        <div class="invalid-feedback">
                        {{ $errors->first('commercial_registration_no') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label  for="shop_city">Shope City:</label>
                        <input class="form-control {{ $errors->has('shop_city') ? 'is-invalid' : '' }}" type="text" name="shop_city" id="shop_city" value="">
                        @if($errors->has('shop_city'))
                        <div class="invalid-feedback">
                        {{ $errors->first('shop_city') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div id="locationname">
                        <label for="address_address">{{ trans('cruds.location.fields.location_name') }}</label>
                       <input type="text" id="address-input" name="shop_address" class="form-control map-input go-to-location">
                       <input type="text" name="shop_latitude" id="address-latitude" value="0" />
                       <input type="text" name="shop_longitude" id="address-longitude" value="0" />
                    </div>
                </div>
                <div class="col-5 col-sm-5">
                    <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map">
                        </div>
                    </div>
                  </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                        Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
 </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
@section('scripts')
{{-- <script async
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap">
</script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
@endsection
