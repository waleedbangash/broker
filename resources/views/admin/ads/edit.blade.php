@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update An Ad</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.ads.update',$ads->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  for="text">Add Text</label>
                        <input class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" type="text" name="text" id="text" value="{{$ads->text }}" required>
                        @if($errors->has('text'))
                        <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label  for="url">Add Url</label>
                        <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{$ads->url}}" required>
                        @if($errors->has('url'))
                        <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="photo">Add Photo</label>
                        <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"  name="photo" id="photo"  required>
                        @if($errors->has('photo'))
                        <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Place of add Show:</label>
                        @if($ads->place_in_app==1)
                        <div class="custom-control custom-radio custom-control-inline ml-2">
                             <input type="radio" class="custom-control-input" id="customRadio" name="place_in_app" value="1" checked>
                            <label class="custom-control-label" for="customRadio">Start page</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="place_in_app" value="2">
                            <label class="custom-control-label" for="customRadio2">Notification</label>
                        </div>
                        @else

                            <div class="custom-control custom-radio custom-control-inline ml-2">
                                <input type="radio" class="custom-control-input" id="customRadio" name="place_in_app" value="1">
                               <label class="custom-control-label" for="customRadio">Start page</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                               <input type="radio" class="custom-control-input" id="customRadio2" name="place_in_app" value="2"  checked>
                               <label class="custom-control-label" for="customRadio2">Notification</label>
                           </div>

                        @endif
                    </div>
                    <div class="form-group">
                        <label>Listener: </label>
                        <label class="checkbox-inline ml-1">provider</label>
                        @if ($ads->to_provider==1)
                        <input type="checkbox" class="ml-1" name="to_provider" value="1" checked>
                        <label class="checkbox-inline ml-1" >client</label>
                        <input type="checkbox" class="ml-1" name="to_client" value="1">
                        @elseif($ads->to_client==1)
                        <input type="checkbox" class="ml-1" name="to_provider" value="1">
                        <label class="checkbox-inline ml-1" >client</label>
                        <input type="checkbox" class="ml-1" name="to_client" value="1"  checked>
                        @elseif($ads->to_provider==1 && $ads->to_client==1)

                        <input type="checkbox" class="ml-1" name="to_provider" value="1" checked>
                        <label class="checkbox-inline ml-1" >client</label>
                        <input type="checkbox" class="ml-1" name="to_client" value="1"  checked>
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
