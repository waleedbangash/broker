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
        <P>Terms And Condition</P>
    </div>

    <div class="card-body">
       <div>
         <strong>{{$condition->name}}:</strong><br>
         <p class="pl-5">{{$condition->value}}</p>

       </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
@endsection
