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

class ProvidersController extends Controller
{
    public function index(Request $request)
    {

        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $provider=User::where([['user_type', '<>', '3'],['user_type', '<>', '1']])->get();
        $query =User::where(['user_type'=>2]);
        for($i=0;$i<count($provider);$i++)
        {
            $provider[$i]->count=Order::where('provider_id',$provider[$i]->id)->get()->count();
        }
        if($request->name)
        {
            $query = User::where(['user_type'=>1])->where('name', 'LIKE',"%{$request->name}%");
            $provider = $query->get();

            for($i=0;$i<count($provider);$i++)
            {
                $provider[$i]->count=Order::where('provider_id',$provider[$i]->id)->get()->count();
            }
        }
        if($request->user_status != -1)
        {
            $provider=$query->where('user_status','LIKE',"%{$request->user_status}%")->get();
            $query= $query->where('user_status','LIKE',"%{$request->user_status}%");

            for($i=0;$i<count($provider);$i++)
            {
            $provider[$i]->count=Order::where('provider_id',$provider[$i]->id)->get()->count();
            }
        }
       if($request->register_date)
       {
            $provider=$query->whereRaw(
            "(register_date >= ? AND register_date <= ?)",
            [$request->register_date." 00:00:00", $request->register_date." 23:59:59"])->get();
            for($i=0;$i<count($provider);$i++)
            {
            $provider[$i]->count=Order::where('provider_id',$provider[$i]->id)->get()->count();
            }

        }

        return view('admin.provider.index',get_defined_vars());
    }
    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.provider.create',get_defined_vars());
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone_number'=>'required',

        ]);
        $provider=new User();
        $provider->name=$request->name;
        $provider->phone_number=$request->phone_number;
        $provider->password=bcrypt($request->password);
        $provider->commercial_registration_no=$request->commercial_registration_no;
        $provider->shop_city=$request->shop_city;
        $provider->shop_address=$request->shop_address;
        $provider->shop_latitude=$request->shop_latitude;
        $provider->shop_longitude=$request->shop_longitude;
        $provider->user_type=2;
        $provider->role_id=2;
       $provider->save();
       return redirect()->route('admin.providers.index')->with('msg','record is successfully Inserted');
    }
    public function edit($id)
    {
        $provider=User::where('id',$id)->first();
        return view('admin.provider.edit',get_defined_vars());
    }
    public function update(Request $request,$id)
    {
            $provider=User::where('id',$id)->update([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'password'=>bcrypt($request->password),
            'commercial_registration_no'=>$request->commercial_registration_no,
            'shop_city'=>$request->shop_city,
            'shop_address'=>$request->shop_address,
            'shop_latitude'=>$request->shop_latitude,
            'shop_longitude'=>$request->shop_longitude,
         ]);
         return redirect()->route('admin.provider.detail',$id);
    }
    public function providerDetail($id)
    {
        abort_if(Gate::denies('provider_detail'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $provider=User::where('id',$id)->get();
        for($i=0;$i<count($provider);$i++)
        {
            $provider[$i]->count=Order::where('provider_id',$provider[$i]->id)->get()->count();
        }

        return view('admin.provider.providerdetail',get_defined_vars());
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
    public function verify(Request $request,$id)
    {
        $user_verification=User::where('id',$id)->update([
            'verified'=>$request->verified,
        ]);
        if($request->verified==1)
        {
        return redirect()->back()->with('msgs','provider is verified');
        }
        else
        {
          return redirect()->back()->with('msgs','provider is Unverified');
        }
    }
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        User::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
    public function providerdestroy($id)
    {

        abort_if(Gate::denies('provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       User::where('id',$id)->delete();
        return redirect()->route('admin.providers.index')->with('msg','reocrd is deleted');
    }
}
