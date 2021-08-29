@extends('layouts.admin')
@push('plugin-styles')
@endpush
<meta charset="utf-8">
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class=" text-center">Messaging</h3>
    </div>
        <div class="container">

            <div class="messaging">
                  <div class="inbox_msg">

                    <div class="mesgs">
                      <div class="msg_history">
                        @foreach ($conversation as $conversation)

                          <div class="card " style=" background-color:">
                            <div class="incoming_msg">
                            <div class="incoming_msg_img" >{{$conversation->from_name}}</div>
                            <div class="received_msg">
                            <div class="received_withd_msg">
                              <p>{{$conversation->text}}</p>
                              <span class="time_date"> {{$conversation->created_at}}</span>
                           </div>

                          </div>
                        </div>
                    </div>
                        @endforeach

                      </div>

                    </div>
                  </div>

                </div>
            </div>

</div>

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush

<style>
    .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}



.incoming_msg_img {
  display: inline-block;
  margin-left:2%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;

}
.time_date {
  color: #646464;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

</style>
