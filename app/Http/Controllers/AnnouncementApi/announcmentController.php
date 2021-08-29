<?php

namespace App\Http\Controllers\AnnouncementApi;

use App\User;
use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class announcmentController extends Controller
{
    public function announcement(Request $req)
    {

        $validator = Validator::make($req->all(), [
          'place_in_app'=>'required',
            ]);
            if($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
            }
         $token=$req->bearerToken();
        if(User::where(['api_token'=>$token,'user_type'=>1])->exists())
        {
            if(Announcement::where(['to_client'=>1,'place_in_app'=>$req->place_in_app])->exists())
            {
              $announcement=Announcement::where(['to_client'=>1,'place_in_app'=>$req->place_in_app])->get();

              return response()->json([
                'message'=>'announcement',
                'announcement'=>$announcement,
                'status'=>200,
            ],200);
            }
            else{
                return response()->json([
                    'message'=>'empty',
                    'announcement'=>[],
                    'status'=>200,
                ],200);
            }
        }
        elseif(User::where(['api_token'=>$token,'user_type'=>2])->exists())
        {
            if(Announcement::where(['to_provider'=>1,'place_in_app'=>$req->place_in_app])->exists())
            {
              $announcement=Announcement::where(['to_provider'=>1,'place_in_app'=>$req->place_in_app])->get();
              return response()->json([
                'message'=>'announcement',
                'announcement'=>$announcement,
                'status'=>200,
            ],200);
            }

            else{
                return response()->json([
                    'message'=>'empty',
                    'announcement'=>[],
                    'status'=>200,
                ],200);
            }
        }
        else
        {
            return response()->json([
                'message'=>'Unauthonticated token',
                'status'=>400
            ],400);
        }

    }
}
