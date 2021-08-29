@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Services</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.services.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="required" for="service_name">Service Name</label>
                        <input class="form-control {{ $errors->has('service_name') ? 'is-invalid' : '' }}" type="text" name="service_name" id="service_name" value="{{ old('service_name', '') }}" required>
                        @if($errors->has('service_name'))
                        <div class="invalid-feedback">
                        {{ $errors->first('service_name') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="required" for="service_picture">Service Picture</label>
                        <input type="file" class="form-control {{ $errors->has('service_picture') ? 'is-invalid' : '' }}"  name="service_picture" id="service_picture"  required>
                        @if($errors->has('service_picture'))
                        <div class="invalid-feedback">
                        {{ $errors->first('service_picture') }}
                        </div>
                        @endif

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
