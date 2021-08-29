<?php

namespace App\Http\Controllers\ProviderApi;

use App\AddingToBills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Offer;
class OffersController extends Controller
{
    public function providerOffer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'offers' => 'required',
            'offers.*.unit_price' => 'required',
            'offers.*.total_price_services' => 'required',
            'offers.*.provider_id' => 'required',
            'offers.*.order_services_id' => 'required',
            'offers.*.order_id' => 'required',

        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }

        $offers =json_decode($request->offers);

        foreach ($offers as $value) {

             Offer::insert([
             'unit_of_price'=>$value->unit_price,
             'total_price_services'=>$value->total_price_services,
             'provider_id'=>$value->provider_id,
             'order_services_id'=>$value->order_services_id,
             'order_id'=>$value->order_id,
              ]);
            }

         return response()->json([
        'message' => "success",
        ], 200);

    }
    
}
