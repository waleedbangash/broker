<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\Role;
use App\User;
use App\Order;
use App\LkpUserType;
use App\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $client=User::where([['user_type', '<>', '3'],['user_type', '<>', '2']])->get();
        $query =User::where(['user_type'=>1]);
        for($i=0;$i<count($client);$i++)
        {
            $client[$i]->count=Order::where('client_id',$client[$i]->id)->get()->count();
        }
        if($request->name)
        {
            $query = User::where(['user_type'=>1])->where('name', 'LIKE',"%{$request->name}%");
            $client = $query->get();

            for($i=0;$i<count($client);$i++)
            {
                $client[$i]->count=Order::where('client_id',$client[$i]->id)->get()->count();
            }
        }
        if($request->user_status != -1)
        {
            $client=$query->where('user_status','LIKE',"%{$request->user_status}%")->get();
            $query= $query->where('user_status','LIKE',"%{$request->user_status}%");

            for($i=0;$i<count($client);$i++)
            {
            $client[$i]->count=Order::where('client_id',$client[$i]->id)->get()->count();
            }
        }
       if($request->register_date)
       {
            $client=$query->whereRaw(
            "(register_date >= ? AND register_date <= ?)",
            [$request->register_date."00:00:00", $request->register_date." 23:59:59"])->get();
            for($i=0;$i<count($client);$i++)
            {
            $client[$i]->count=Order::where('client_id',$client[$i]->id)->get()->count();
            }

        }

        return view('admin.clients.index',get_defined_vars());
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user_type=LkpUserType::where(['id'=>1])->first();
        $role=Role::where(['id'=>2])->first();
          return view('admin.clients.create',get_defined_vars());
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone_number'=>'required',

        ]);
        $customer=new User();
        $customer->name=$request->name;
        $customer->phone_number=$request->phone_number;
        $customer->password=bcrypt($request->password);
        $customer->user_type=1;
        $customer->role_id=2;
       $customer->save();
       return redirect()->route('admin.clients.index');
    }

    public function clientDetail($id)
    {
        abort_if(Gate::denies('client_detaile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client=User::where('id',$id)->get();
        for($i=0;$i<count($client);$i++)
        {
          $client[$i]->count=Order::where('client_id',$client[$i]->id)->get()->count();
        }

        return view('admin.clients.clientdetail',get_defined_vars());
    }
    public function userStatus(Request $request,$id)
    {

      $user_status=User::where('id',$id)->update([
          'user_status'=>$request->user_status,
      ]);
      if($request->user_status==1)
      {
      return redirect()->back()->with('msg','user is Active');
      }
      else
      {
        return redirect()->back()->with('msg','user is Blocked');
      }
    }
    public function clientOrders($id)
    {
        $client_order=Order::where('client_id',$id)->with(['provider'])->get();

         return view('admin.clients.clientorder',get_defined_vars());
    }
    public function clientorderMassdestroy(Request $request)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        dd($request); die;
        Order::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
    public function orderdestroy($id)
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank=Order::where('id',$id);
        $bank->delete();
        return redirect()->back();
    }


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

        $client=User::where('id',$id)->first();

        return view('admin.clients.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $client=User::where('id',$id)->update([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
        ]);
        return redirect()->route('admin.client.detail',$id);
    }
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        User::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
    public function clientdestroy($id)
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client=User::where('id',$id);
        $client->delete();
        return redirect()->route('admin.clients.index');
    }

}
