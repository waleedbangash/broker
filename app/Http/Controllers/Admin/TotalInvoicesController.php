<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\Offer;
use App\Order;
use App\OrderService;
use App\AddingToBills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TotalInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('total_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $billcount = 0;
        $from_date=$request->from_date;
        $to_date=$request->to_date;
            $order=Order::where([['order_status_id', '<>', '1']])->get();

            for($i=0;$i<count($order);$i++){
                $order[$i]->count=OrderService::where('order_id',$order[$i]->id)->get()->count();
                if(AddingToBills::where('order_id',$order[$i]->id)->get()->count() > 0){
                    $billcount++;
                }
            }
            if($from_date && $to_date)
            {

                $order = Order::where([['order_status_id', '<>', '1']])->whereRaw(
                "(created_at >= ? AND created_at <= ?)",
                [$from_date." 00:00:00", $to_date." 23:59:59"]
                )->get();
                $billcount = 0;
                for($i=0;$i<count($order);$i++){
                    $order[$i]->count=OrderService::where('order_id',$order[$i]->id)->get()->count();
                    if(AddingToBills::where('order_id',$order[$i]->id)->get()->count() > 0){
                        $billcount++;
                    }
                }

           }
     return view('admin.total_invoices.index',get_defined_vars());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderBill($id)
    {
        $totalOrder_price  = 0;

        $addingbills=AddingToBills::where('order_id',$id)->get();

        foreach( $addingbills as  $addingbill)
        {
            $totalOrder_price+=$addingbill->total_price_services;
        }
        $order=Order::where('id',$id)->first();
      return view('admin.total_invoices.orderbill',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('totla_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Order::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
