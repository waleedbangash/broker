<?php

namespace App\Http\Controllers\CustomerApi;

use App\AddingToBills;
use App\User;
use App\Order;
use App\OrderService;
use App\LkpOrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LkpService;
use App\Offer;
use App\OrderEvalution;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
       private $estimated_time=7200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'order_deliver_date'=>'required',
            'deliver_time'=>'required',
            'number_of_guest'=>'required',
            'nots'=>'required',
            'order_address'=>'required',
            'order_city'=>'required',
            'order_longitude'=>'required',
            'order_latitude'=>'required',
              'service_fee'=>'required',
            'client_id'=>'required',
            'services' =>'required',
            'occation_time'=>'required',

        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }

          if(User::where(['user_type'=>1,'id'=>$request->client_id])->exists())
          {
        $client_id=User::where(['user_type'=>1,'id'=>$request->client_id])->first()->id;

           $status=LkpOrderStatus::where('id',1)->first();
          $Order= new Order();
            $Order->client_id=$client_id;
            $Order->order_deliver_date=$request->order_deliver_date;
            $Order->deliver_time=$request->deliver_time;
            $Order->number_of_guest=$request->number_of_guest;
            $Order->nots=$request->nots;
            $Order->order_address=$request->order_address;
            $Order->order_city=$request->order_city;
            $Order->order_longitude=$request->order_longitude;
            $Order->order_latitude=$request->order_latitude;
            $Order->occation_time= $request->occation_time;
            $Order->order_status_id= $status->id;
            $Order->service_fee=$request->service_fee;
            $Order->save();
            $services = $request->services;
           $services=json_decode($services,true);
            foreach($services as $value) {
                $order_id=$Order->id;
                $order_services=new OrderService();
                $order_services->order_id=$order_id;
                $order_services->service_id=$value['id'];
                $order_services->service_numbers=$value['numbers'];
                $order_services->save();
            }

            return response()->json([
                'status' => "success",
                'message' => "Order Created Successfully"
            ], 200);

        }
        else
        {
            return response()->json([
                'status' => "client id or provider id does not exist",
                'error' => $validator->errors()
            ], 400);
        }

    }


    private $order_id = 0;
    public function showOrders(Request $request)
    {
        if(User::where(['user_type'=>1,'id'=>$request->client_id])->exists())
        {

          $client_id=User::where(['user_type'=>1,'id'=>$request->client_id])->first()->id;

          $order = Order::where([['order_status_id', '<>', '4']])->with(['orderServices','order_bill'])->where('client_id',$client_id)->get();

          for($i = 0;$i < count($order) ; $i++){

            $this->order_id = $order[$i]->id;

            $providers = User::with(['offers'])->whereHas("offers", function($q) {
                $q->where("order_id","=",$this->order_id);
            })->get();

             $order[$i]->provider = $providers;
          }

        return response()->json([
            'message' => "success",
              'order'=>$order,
               'updation_time' =>$this->estimated_time,
             ], 200);
            }
      else
      {
        return response()->json([
            'status' => "error",
            'message' => "User does not exists"
        ], 400);
      }
    }

 public function customerOrderUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'id'=>'required',
            'order_deliver_date'=>'required',
            'deliver_time'=>'required',
            'number_of_guest'=>'required',
            'nots'=>'required',
            'client_id'=>'required',
            'services' =>'required',
            'occation_time'=>'required'

        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
        if(User::where(['user_type'=>1,'id'=>$request->client_id])->exists())
        {
            $client_id=User::where(['user_type'=>1,'id'=>$request->client_id])->first()->id;
                if(Order::where('id',$request->id)->exists())
                {
                    $Order = Order::where('id',$request->id)->update([
                            'order_deliver_date'=>$request->order_deliver_date,
                            'deliver_time'=>$request->deliver_time,
                            'number_of_guest'=>$request->number_of_guest,
                            'nots'=>$request->nots,
                            'occation_time'=>$request->occation_time,
                         ]);
                  $services = $request->services;
                   $services=json_decode($services,true);
                   foreach ($services as $value) {
                      OrderService::where(['order_id'
                              => $request->id,'service_id' => $value['id']])->update([
                            'service_numbers'=>$value['numbers'],
                        ]);
                     }
                    return response()->json([
                        'status' => "200",
                        'message' => "Order updated Successfully",
                        ], 200);
                }
                else{
                    return response()->json([
                        'status' => "400",
                        'message' => "id does not exists",
                        ], 400);
                }
           }
        else
         {
            return response()->json([
                'message' => "client id or provider id does not exist",
                'error' => $validator->errors()
            ], 400);
       }
    }

 public function acceptOffer(Request $request)
    {
        $validator = Validator::make($request->all(), [

        'provider_id'=>'required',
        'order_id' =>'required',
        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }

        if(User::where(['user_type'=>2,'id'=>$request->provider_id])->exists())
        {
            Order::where('id',$request->order_id)->update([
                'provider_id'=>$request->provider_id,
                'order_status_id'=>2,
            ]);

            return response()->json([
            'message' => "offer accepted",
            ], 200);

        }
        else
        {
            return response()->json([
                'status' => "client id or provider id does not exist",
                'error' => $validator->errors()
            ], 400);
        }
    }

 public function orderCompleted(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'order_id' =>'required',
        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }

        if(User::where(['user_type'=>1,'id'=>$request->client_id])->exists())
        {
            if(Order::where(['order_status_id'=>3,'id'=>$request->order_id])->exists())
            {
                Order::where('id',$request->order_id)->update([
                'order_status_id'=>4,
                ]);
                return response()->json([
                'message' => "order completed",
                ], 200);
            }
            else
            {
                return response()->json([
                'message' => "order is no exists",
                ], 401);
            }
        }
        else
        {
            return response()->json([
            'status' => "client id or provider id does not exist",
            'error' => $validator->errors()
            ], 400);
        }
    }

    public function previousOrders(Request $request)
    {
        if(User::where(['user_type'=>1,'id'=>$request->client_id])->exists())
        {


              $client_id=User::where(['user_type'=>1,'id'=>$request->client_id])->first()->id;
              if(Order::where(['order_status_id'=>4,'client_id'=>$client_id])->exists())
              {
                $order = Order::with(['orderServices'])->where(['client_id' => $client_id,'order_status_id' => 4])->get();

                for($i = 0;$i < count($order) ; $i++){

                    $this->order_id = $order[$i]->id;
                    $providers = User::with(['offers'])->whereHas("offers", function($q) {
                        $q->where("order_id","=",$this->order_id);
                        })->get();

                    $order[$i]->provider = $providers;
                }

               return response()->json([
            'message' => "success",
              'order'=>$order,
               'updation_time' =>$this->estimated_time,
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
    public function orderEvaluation(Request $request)
    {
            $validator = Validator::make($request->all(),[
            'order_id' =>'required',
            'level_of_service'=>'required',
            'comment'=>'sometimes',
            ]);
            if($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
            }

            if(Order::where(['id'=>$request->order_id,'order_status_id'=>4])->exists())
            {
                $order_evaluation=new OrderEvalution();
                $order_evaluation->order_id=$request->order_id;
                $order_evaluation->level_of_service=$request->level_of_service;
                $order_evaluation->comment=$request->comment;
                $order_evaluation->save();
                return response()->json([
                    'message' => "success",
                    'status' =>$order_evaluation,
                    ],200);
            }
            else
            {
                return response()->json([
                    'message' => "order id does not exixsts",

                    ],400);
            }

    }


}


