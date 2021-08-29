<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\User;
use App\Offer;
use App\Order;
use App\LkpUserType;
use App\OfferChetting;
use App\LkpOrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $order=Order::with(['userdetail','orderServices','orderstatus'])->withcount('orderservices')->get();

        if($request->id)
        {
        $order=Order::with(['userdetail','orderServices','orderstatus'])->withcount('orderservices')
        ->where(['order_status_id'=>$request->id])->get();
         $order_status=Order::with(['orderstatus'])->where(['order_status_id'=>$request->id])->first();
        }
         return view('admin.order.index',get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request,$id)
    {
        abort_if(Gate::denies('order_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $totalOrder_price  = 0;
        if(Order::where(['order_status_id'=>2,'id'=>$id])->exists() || Order::where(['order_status_id'=>4,'id'=>$id])->exists())
        {

        $offer=Offer::with(['orderService'])->where('order_id',$id)->get();

        foreach($offer as $offers)
        {

            $totalOrder_price+=$offers->total_price_services;
        }
        $order=Order::with(['userdetail','provider','orderstatus'])->where('id',$id)->get();

        return view('admin.order.detail',get_defined_vars());
      }
      else
      {
          return redirect()->route('admin.order.index');
      }
    }
     public function invoice(Request $request,$id)
     {
        $totalOrder_price  = 0;
        $offer=Offer::with(['orderService'])->where('order_id',$id)->get();
        foreach($offer as $offers)
        {
            $totalOrder_price+=$offers->total_price_services;
        }
       $order=Order::with(['userdetail','provider',])->where('id',$id)->first();
        return view('admin.order.invoice',get_defined_vars());
     }

   public function getAcceptableOffers($id)
   {
        $totalOrder_price  = 0;
        $order_id = $id;
        $query= Offer::where('order_id',$id)->distinct()->selectRaw('provider_id,insertion_date,sum(total_price_services) as sum')->groupBy('provider_id','insertion_date',)->with(['provider']);

        $offer= $query->get();

        return view('admin.order.offer',get_defined_vars());
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdetail(Request $request,$order_id,$provider_id)
    {
          $totalOrder_price  = 0;
          $offers = Offer::where(['provider_id'=> $provider_id,'order_id'=>$order_id])->with(['provider'])->get();

        foreach ($offers as $offered) {
            $order_id=$offered->order_id;
            $totalOrder_price+=$offered->total_price_services;
         }

        $order=Order::where('id',$order_id)->first();

        $customer=User::where('id',$order->client_id)->first();


        return view('admin.order.offer_detail',get_defined_vars());
    }

   public function conversations($id)
   {
    $conversation=OfferChetting::where('order_id',$id)->get();
    for($i = 0;$i <count($conversation);$i++){
        $from_name = User::where('id',$conversation[$i]->from_user_id)->first()->name;
        $to_name = User::where('id',$conversation[$i]->to_user_id)->first()->name;

        $conversation[$i]->from_name = $from_name;
        $conversation[$i]->to_name = $to_name;
     }

       return view('admin.order.conversation',get_defined_vars());
   }
   public function massDestroy(Request $request)
   {
    abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       Order::whereIn('id', request('ids'))->delete();
       return response(null, 204);
   }
   public function OrderofferMassdestroy(Request $request)
   {
    abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       Offer::whereIn('id', request('ids'))->delete();
       return response(null, 204);
   }
   public function orderDestroy($id)
   {
       abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $order=Order::where('id',$id);
       $order->delete();
       return redirect()->route('admin.order.index');
   }
}
