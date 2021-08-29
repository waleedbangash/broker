<?php

namespace App\Http\Controllers\NotificationApi;

use App\User;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'client_id' => 'required',
            'provider_id' =>'required',
            'title' =>'required',
            'data' =>'sometimes',
            'body' =>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }


        $token = $request->bearerToken();
    if(User::where(['user_type'=>1,'id'=> $request->client_id,'api_token'=> $token])->exists())
    {


        $notification=new Notification();
        $notification->from_user_id=$request->client_id;
        $notification->to_user_id= $request->provider_id;
        $notification->title=$request->title;
        $notification->data=$request->data;
        $notification->body=$request->body;
        $notification->save();
        return response()->json([
            'message' => "record is susccssefully inserted",
            ], 200);

    }
    else if(User::where(['user_type'=>2,'id'=> $request->provider_id, 'api_token'=> $token])->exists())
    {

        $notification=new Notification();
        $notification->from_user_id=$request->provider_id;
        $notification->to_user_id=$request->client_id;
        $notification->title=$request->title;
        $notification->data=$request->data;
        $notification->body=$request->body;
        $notification->save();
        return response()->json([
            'message' => "record is susccssefully inserted",
            ], 200);
    }

}
public function get(Request $request)
{
    $validator = Validator::make($request->all(), [

        'client_id' => 'sometimes',
        'provider_id' =>'sometimes',
    ]);
    if($validator->fails())
    {
        return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
    }

    $token = $request->bearerToken();
    if(User::where(['user_type'=>1,'id'=> $request->client_id,'api_token'=> $token])->exists())
    {
        $notification=Notification::where('to_user_id',$request->client_id)->get();
         return response()->json([
            'message' => "success",
            'notifications' =>$notification,
           'status'=>200,
            ], 200);
    }
    elseif(User::where(['user_type'=>2,'id'=> $request->provider_id,'api_token'=> $token])->exists())
    {
        $notification=Notification::where('to_user_id',$request->provider_id)->get();
        return response()->json([
           'message' => "success",
           'notifications' =>$notification,
           'status'=>200,
           ], 200);
    }
    else
    {
        return response()->json([
            'message' => "user does not exists",
            'status' =>[],
            ], 200);
    }
}

}
