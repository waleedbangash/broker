@extends('layouts.admin')
@section('content')
   <div class="row">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   @if (!empty($contact->user))
                   <strong>{{$contact->user->name}}</strong>
                   @endif
                </div>
               <div class="card-body">
                @foreach ($detail as $detail)
                @if($detail->role_id=='1')
                    <div class="incoming_msg">
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>{{$detail->chat_text}}</p>
                            <span class="time_date">{{$detail->created_at}}</span></div>
                        </div>
                    </div>
                @endif
                @if($detail->role_id=="2")
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                        <p>{{$detail->chat_text}}</p>
                        <span class="time_date">{{$detail->created_at}}</span> </div>
                    </div>
                @endif
           @endforeach

           <form action="{{route('admin.contact.store',$contact->id)}}" method="post">
               @csrf
               <div class="type_msg">
               <div class="input_msg_write">
                   <input type="text" class="write_msg" name="chat_text" placeholder="Type a message" required/>
                   <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true" ></i></button>
               </div>
               </div>
           </form>

               </div>


          </div>
      </div>
   </div>
@endsection
@section('scripts')
@parent

@endsection
<style>
.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #796969 none repeat scroll 0 0;
  border-radius: 3px;
  color: white;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}


}
</style>
