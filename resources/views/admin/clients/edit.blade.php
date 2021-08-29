@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Customer</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.client.update',$client->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="required" for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{$client->name}}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                        </div>
                        @endif

                    </div>


                    <div class="form-group">
                        <label class="" for="phone_number">Phone Number</label>
                        <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{$client->phone_number}}">
                        @if($errors->has('phone_number'))
                        <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="" for="email">Email</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{$client->email}}">
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                        Update
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
