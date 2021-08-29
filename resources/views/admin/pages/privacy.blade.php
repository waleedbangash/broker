@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        <P>Privacy Policy</P>
    </div>

    <div class="card-body">
       <div>
         <strong>{{$privacy_policy->name}}:</strong><br>
         <p class="pl-5">{{$privacy_policy->value}}</p>

       </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
@endsection
