@extends('layouts.admin')

@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
 <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Bank Account</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.bank.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="required" for="bank_name">Bank Name</label>
                        <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}" required>
                        @if($errors->has('bank_name'))
                        <div class="invalid-feedback">
                        {{ $errors->first('bank_name') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="required" for="service_picture">Bank Logo</label>
                        <input type="file" class="form-control {{ $errors->has('bank_logo') ? 'is-invalid' : '' }}"  name="bank_logo" id="bank_logo"  required>
                        @if($errors->has('bank_logo'))
                        <div class="invalid-feedback">
                        {{ $errors->first('bank_logo') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="required" for="account_number">Account Number</label>
                        <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}" required>
                        @if($errors->has('account_number'))
                        <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="required" for="organization_name">Organization Name</label>
                        <input class="form-control {{ $errors->has('organization_name') ? 'is-invalid' : '' }}" type="text" name="organization_name" id="organization_name" value="{{ old('organization_name', '') }}" required>
                        @if($errors->has('organization_name'))
                        <div class="invalid-feedback">
                        {{ $errors->first('organization_name') }}
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
