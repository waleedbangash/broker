<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Offer;
use App\Order;
use App\OrderService;
use App\AddingToBills;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlineClients=User::where(['user_type'=>1,'user_on_offline'=>1])->count();
        $onlineProvider=User::where(['user_type'=>2,'user_on_offline'=>1])->count();
        $chartDatas = Order::whereBetween('created_at', [Carbon::now()->subDays(4)->format('Y-m-d') . " 00:00:00", Carbon::now()->format('Y-m-d') . " 23:59:59"])
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as total')
            ])
            ->pluck('total', 'date')->toArray();   //daily order of 5 days


        $lastmonth = Order::whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(4), Carbon::now()->startOfMonth()])
            ->groupBy('month')
            ->orderBy('month')
            ->get([
                DB::raw('DATE_FORMAT(created_at,"%Y-%m") AS month'),
                DB::raw('count(*) as total')
            ])
            ->pluck('total', 'month')->toArray(); //5 month orders

        $clientmonth = Order::whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(4), Carbon::now()->startOfMonth()])
            ->groupBy('month')
            ->orderBy('month')
            ->get([
                DB::raw('DATE_FORMAT(created_at,"%Y-%m") AS month'),
                DB::raw('count(client_id) as total')
            ])
            ->pluck('total', 'month')->toArray();

        $providertmonth = Order::whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(4), Carbon::now()->startOfMonth()])
            ->groupBy('month')
            ->orderBy('month')
            ->get([
                DB::raw('DATE_FORMAT(created_at,"%Y-%m") AS month'),
                DB::raw('count(provider_id) as total')
            ])
            ->pluck('total', 'month')->toArray();

        $client_orders = Order::where('created_at', '>=', Carbon::today()
            ->startOfMonth()->subMonth())->count('client_id');  //client order

        $provider_orders = Order::where('created_at', '>=', Carbon::today()
            ->startOfMonth()->subMonth())->count('provider_id');

        $bill = AddingToBills::all()->count();

        $completed_order = Order::where(['order_status_id' => 4])->count();

        $allorder = Order::all()->count();

        $open_order = Order::where([['order_status_id', '<>', '4']])->count();

        $daynumber_of_order = Order::where('order_status_id','>',1)->whereBetween('created_at', [Carbon::now()->subDays(4)->format('Y-m-d') . " 00:00:00", Carbon::now()->format('Y-m-d') . " 23:59:59"])
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(id) as count'),
            ])
            ->pluck('count', 'date')->toArray();

        $orders = [];
        $totalcost=null;
        foreach ($daynumber_of_order as $key => $value) {

            $orderQuery = Order::where('order_status_id','>',1)->whereRaw('Date(created_at) = ?', [$key]);
            $order = $orderQuery->get();

            foreach ($order as $id => $values) {
                $offer=Offer::where(['provider_id'=>$values->provider_id,'order_id'=>$values->id])->sum("total_price_services");
                $totalcost+=$offer;
            }

            $order_fee = $orderQuery->first()->service_fee;
            $orders[$key] = ["order" => $order, "order_fee" => $order_fee,"total_cost"=>$totalcost];
          }

    //client and provider order

            $client_provider= Order::with(['userdetail','provider'])->where('order_status_id','>',1)->whereBetween('created_at', [Carbon::now()->subDays()->format('Y-m-d') . " 00:00:00", Carbon::now()->format('Y-m-d') . " 23:59:59"])
            ->orderBy('id', 'desc')->limit(5)->get();
              for($i=0; $i<count($client_provider); $i++)
              {
                $client_provider[$i]->services=Offer::where('order_id',$client_provider[$i]->id)->count();
                $client_provider[$i]->total_cost=Offer::where('order_id',$client_provider[$i]->id)->sum('total_price_services');
              }




          $year_Order = Order::where('order_status_id','>',1)->whereBetween('created_at', [Carbon::now()->startOfYear()->subYears(5), Carbon::now()->startOfYear()])
            ->groupBy('year')
            ->orderBy('year')
            ->get([
                DB::raw('DATE_FORMAT(created_at,"%Y") AS year'),
                DB::raw('count(id) as total')
            ])
            ->pluck('total', 'year')->toArray();

            $yearorders = [];
            $yeartotalcost=null;
            foreach ($year_Order as $key => $value) {
            $orderQuery = Order::where('order_status_id','>',1)->whereRaw('Year(created_at) = ?', [$key]);
            $order = $orderQuery->get();
            foreach ($order as $id => $values) {
                $offer=Offer::where(['provider_id'=>$values->provider_id,'order_id'=>$values->id])->sum("total_price_services");
                $yeartotalcost+=$offer;
            }
            $order_fee = $orderQuery->first()->service_fee;
            $yearorders[$key] = ["order" => $order, "order_fee" => $order_fee,'yeartotalcost'=>$yeartotalcost];
        }

        $month_order = Order::where('order_status_id','>',1)->whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(4), Carbon::now()->startOfMonth()])
            ->groupBy('month')
            ->orderBy('month')
            ->get([
                DB::raw('DATE_FORMAT(created_at,"%Y-%m") AS month'),
                DB::raw('count(*) as total')
            ])
            ->pluck('total', 'month')->toArray();
           $monthorders = [];
           $monthtotalcost=null;
            foreach ($month_order as $key => $value) {
                $orderQuery = Order::where('order_status_id','>',1)->whereRaw('DATE_FORMAT(created_at,"%Y-%m") = ?', [$key]);
                foreach ($order as $id => $values) {
                    $offer=Offer::where(['provider_id'=>$values->provider_id,'order_id'=>$values->id])->sum("total_price_services");
                    $monthtotalcost+=$offer;
                }
                $order_fee = $orderQuery->first()->service_fee;
                $order = $orderQuery->get();
                $monthorders[$key] = ["order" => $order, "monthtotalcost" =>$monthtotalcost,'order_fee'=>$order_fee];

            }

            //custom

            $from_date=$request->from_date;
            $to_date=$request->to_date;
    //how to get two order_status_id
            $custom = Order::where('order_status_id','>',1)->whereRaw("(created_at >= ? AND created_at <= ?)",
              [$from_date." 00:00:00", $to_date." 23:59:59"]
            )->get();

            for($i=0;$i<count($custom);$i++){
                $custom[$i]->services=Offer::where('order_id', $custom[$i]->id)->count();
                $custom[$i]->total_cost=Offer::where('order_id', $custom[$i]->id)->sum('total_price_services');

                }


        return view('home', get_defined_vars());
    }
}
