<?php

namespace App\Http\Controllers\CustomerApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LkpOccationTime;
use App\LkpService;

class CustomerController extends Controller
{
  public function customerLkp_services(Request $request)
  {
      $services=LkpService::all();

      return response()->json([
        'message' => "success",
        'services' => $services
    ], 200);
  }

}
