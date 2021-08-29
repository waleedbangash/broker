<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use Symfony\Component\HttpFoundation\Response;
class ValidateToken extends Controller
{
    public function validateToken(Request $req) {

          $token = $req->bearerToken();

          if (User::where('api_token', $token)->exists())
          {

            $find_user = User::where('api_token', $token)->first();
            return response()->json([
                'status' => "success",
                'message' => 'Object found Successfully ',
                'user' => $find_user,
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
