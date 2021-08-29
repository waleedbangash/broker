<?php

namespace App\Http\Controllers\ProviderApi;

use App\User;
use App\Order;
use App\AddingToBills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use League\OAuth2\Server\AuthorizationValidators\BearerTokenValidator;

class OrderController extends Controller
{
    private $radius = 3;
     public function pendingRequest(Request $request)
    {
        $token=$request->bearerToken();
        $user=User::where('api_token',$token)->first();
        $shop_lat=$user->shop_latitude;
        $shop_lng=$user->shop_longitude;

       $Order=Order::with(['orderServices','offers','userdetail'])->where(['order_status_id'=>1])->get();
       $filtered_orders=[];
        $filtered_orders=$this->DistanceFilteration($Order, $shop_lat, $shop_lng);

        return response()->json([
            'message' => "success",
              'order'=>$filtered_orders,
             ], 200);
            }
            private $order_id = 0;
            public function previousOrders(Request $request)
            {
                if(User::where(['user_type'=>2,'id'=>$request->provider_id])->exists())
                {


                      $provider_id=User::where(['user_type'=>2,'id'=>$request->provider_id])->first()->id;
                      if(Order::where(['order_status_id'=>4,'provider_id'=>$request->provider_id])->exists())
                      {
                        $order = Order::with(['userdetail','orderServices','offers'])->where(['provider_id' => $provider_id,'order_status_id' =>4])->get();

                        for($i = 0;$i < count($order) ; $i++){

                            $this->order_id = $order[$i]->id;

                            $providers = User::with(['offers'])->whereHas("offers", function($q) {
                                $q->where("order_id","=",$this->order_id);
                                })->get();

                            $order[$i]->provider= $providers;
                        }

                       return response()->json([
                    'message' => "success",
                      'order'=>$order,

                     ], 200);
                    }
                else
                {
                    return response()->json([
                        'message' => "success",
                          'order'=>[],

                         ], 200);
                }
               }
              else
              {
                return response()->json([
                    'status' => "400",
                    'message' => "User does not exists"
                ], 400);
              }
            }
   public function currentOrders(Request $request)
   {

       if(Order::where(['order_status_id'=>2])->exists())
       {
        $currentOrder=Order::with(['orderServices','offers','userdetail'])->where(['order_status_id'=>2])->where('provider_id',$request->provider_id)->get();
        return response()->json([
            'message' => "success",
            'orders'=>$currentOrder,
              'status'=>'200',

             ], 200);
       }
       else{
        return response()->json([
            'message' => "success",
            'orders'=>[],
              'status'=>'200',

             ], 200);
       }
   }
   public function orderConformation(Request $request)
   {
    $validator = Validator::make($request->all(),[
        'order_id' =>'required',
        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
    if(User::where(['user_type'=>2,'id'=>$request->provider_id])->exists())
    {
        if(Order::where(['order_status_id'=>2,'id'=>$request->order_id])->exists())
        {
            Order::where('id',$request->order_id)->update([
            'order_status_id'=>3,
            ]);
             return response()->json([
            'message' => "order conformed",
            ], 200);
        }
        else
        {
           return response()->json([
           'message' => "order is no exists",
            ], 401);
        }
    }
   }

   public function addingTobill(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'adding_to_bill' => 'required',
            'adding_to_bill.*.order_id' => 'required',
            'adding_to_bill.*.service_name' => 'required',
            'adding_to_bill.*.service_number' => 'required',
            'adding_to_bill.*.unit_of_price' => 'required',
            'adding_to_bill.*.total_price_services' => 'required',

        ]);

        if($validator->fails())
        {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
        if(Order::where(['order_status_id'=>2])->exists())
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

            return response()->json([
            'message' => "success",
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => "the order does not Accepted",
                ], 400);
        }
    }
    function DistanceFilteration($Order, $shop_lat, $shop_lng)
    {
        $filtered_orders = [];
        foreach ($Order as $order) {

            //distance from user's home location and driver's home location under 10km

            $dist = $this->circle_distance($order->order_latitude,$order->order_longitude, $shop_lat, $shop_lng);



            $dist = is_nan($dist) ? 0 : $dist;

            if ($dist <= $this->radius) {
                array_push($filtered_orders,$order);
            }
        }
        return $filtered_orders;
    }
    function circle_distance($lat1, $lon1, $lat2, $lon2)
    {
        $rad = M_PI / 180;
        return acos(sin($lat2 * $rad) * sin($lat1 * $rad) + cos($lat2 * $rad) * cos($lat1 * $rad) * cos($lon2 * $rad - $lon1 * $rad)) * 6371; // Kilometers
    }
}
