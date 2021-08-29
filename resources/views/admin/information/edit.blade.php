@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.information.update',$constont->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="value">Value</label>
                        <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{$constont->value}}" required>
                        @if($errors->has('value'))
                        <div class="invalid-feedback">
                        {{ $errors->first('value') }}
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
