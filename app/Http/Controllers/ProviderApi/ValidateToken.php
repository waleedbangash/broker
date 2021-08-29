<?php

namespace App\Http\Controllers\ProviderApi;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ValidateToken extends Controller
{
    public function providervalidateToken(Request $req) {

        $token = $req->bearerToken();

        if (User::where(['api_token'=>$token,'user_type'=>2])->exists())
        {

            $users=User::where('api_token',$token)
            ->update([

                 'last_online_date'=>Carbon::now(),
                   'user_on_offline'=>1,
               ]);

          $find_user = User::where('api_token', $token)->first();


          return response()->json([
              'message' => "success",
              'user' =>  $find_user,
          ], 200);
      }
     else {

        return response()->json([
            'status' => "error",
            'message' => 'Token does not exists '
        ], 404);
    }
}
}
