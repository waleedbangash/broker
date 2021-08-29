<?php

namespace App\Http\Controllers\ChatApi;

use App\User;
use App\Order;
use App\AddingToBills;
use App\OfferChetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
  public function chat(Request $request)
  {

        $validator = Validator::make($request->all(), [

            'client_id' => 'required',
            'provider_id' =>'required',
            'text' =>'sometimes',
            'order_id' =>'required',
            'file' =>'sometimes',
        ]);
        if($validator->fails())
        {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
        $data=$request->all();
        $data['client_id'] = (int) str_replace(array('\'', '"'), '',$request->client_id);
        $data['provider_id'] = (int) str_replace(array('\'', '"'), '',$request->provider_id);
        $data['order_id'] = (int) str_replace(array('\'', '"'), '',$request->order_id);

        $token = $request->bearerToken();
        $order=Order::where('id',$data['order_id'])->first();
        if($order->order_status_id==2)
        {
           if(User::where(['user_type'=>1,'id'=> $data['client_id'],'api_token'=> $token])->exists())
            {
                $chat=new OfferChetting();
                $chat->from_user_id=$data['client_id'];
                $chat->to_user_id= $data['provider_id'];
                $chat->text=$request->text;
                $chat->order_id=$order->id;
                $chat->save();
                return response()->json([
                    'message'=>"message succfully sended",

                ]);
            }
            elseif(User::where(['user_type'=>2,'id'=> $data['provider_id'], 'api_token'=> $token])->exists())
            {
                $chat_file=$request->file('file');
                if($chat_file)
                {
                    $chat_fileName = time() . mt_rand(1000, 999999) . '_' .$chat_file->getClientOriginalName();
                    $chat_file->move(public_path('chat_files'),$chat_fileName);
                }
                if(!empty($chat_fileName))
                {
                    $adding_to_bill=json_decode($request->adding_to_bill);

                  foreach ($adding_to_bill as $value)
                  {
                     AddingToBills::insert([
                      'order_id'=>$value->order_id,
                      'service_number'=>$value->service_number,
                      'unit_of_price'=>$value->unit_of_price,
                      'total_price_services'=>$value->total_price_services,
                      'service_name'=>$value->service_name,
                      ]);
                  }
                }
                $chat_files=null;
                $chat=new OfferChetting();
                $chat->from_user_id=$data['provider_id'];
                $chat->to_user_id=$data['client_id'];
                $chat->text=$request->text;

                if(!empty($chat_fileName))
                {
                    $chat_files="chat_files/".$chat_fileName;
                     $chat->file=$chat_files;
                }
                $chat->order_id=$data['order_id'];
                $chat->save();
            }
            return response()->json([
            'message' => "message successfully sended",
            'file_path'=>$chat_files,
            ], 200);
        }
        else
        {
            return response()->json([
            'message' => "you can not chat",
            ], 400);
        }
    }
   public function recievedSms(Request $request)
   {
     $validator = Validator::make($request->all(), [
        'order_id' =>'required',
     ]);
        if ($validator->fails()) {

            return response()->json([
                'message' => "provider or client is incorrect",
                'error' => $validator->errors()
            ], 400);
        }


        if(OfferChetting::where('order_id',$request->order_id)->exists())
        {

         $chat=OfferChetting::where(['order_id'=>$request->order_id])->get();
         for($i = 0;$i <count($chat);$i++){
            $from_name = User::where('id',$chat[$i]->from_user_id)->first()->name;
            $to_name = User::where('id',$chat[$i]->to_user_id)->first()->name;

            $chat[$i]->from_name = $from_name;
            $chat[$i]->to_name = $to_name;
         }
          return response()->json([
            'message' => "success",
            'status' =>200,
            'all_messages'=>$chat,

        ], 200);
        }
        else
        {
            return response()->json([
                'message' =>"success",
                'status' =>200,
                'all_messages'=>[],
            ], 200);
        }
   }

}
