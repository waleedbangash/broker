@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create User</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.user.store')}}">
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
                        <label class="required" for="email">Email</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                        {{ $errors->first('email') }}
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
                        <label for="user_type">User Type</label>
                        <select class="form-control form-control-sm"  id="user_type" name="user_type" required >
                        @foreach($user_type as $type)
                        <option  value="{{$type->id}}" >{{strtoupper($type->type_name)}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('user_type'))
                        <div class="invalid-feedback">
                        {{ $errors->first('user_type') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_type">Role</label>
                        <select class="form-control form-control-sm"  id="user_role" name="role_id" required >
                        @foreach($role as $role)
                        <option  value="{{$role->id}}" >{{strtoupper($role->title)}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('user_type'))
                        <div class="invalid-feedback">
                        {{ $errors->first('user_type') }}
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
