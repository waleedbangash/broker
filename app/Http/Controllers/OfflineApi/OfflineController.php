<?php

namespace App\Http\Controllers\OfflineApi;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OfflineController extends Controller
{
    public function offline(Request $req)
    {
        $validator = Validator::make($req->all(), [
         'id' => 'required',
         ]);
         if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
         $token = $req->bearerToken();
        if(User::where(['id'=>$req->id,'api_token'=>$token])->exists())
        {
            User::where(['id'=>$req->id,'api_token'=>$token])->update([
                'user_on_offline'=>0,
            ]);
            return response()->json([
                'message'=>'you are succefully offline from the site',
                'status'=>'200',
            ],200);
        }
        else
        {
            return response()->json([
                'message'=>'token or id is incorrect',
                'status'=>'400',
            ],400);
        }
    }
}
