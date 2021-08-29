<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\Role;
use App\User;
use App\LkpUserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users=User::where(['user_type'=>3])->get();

       return view('admin.user.index',get_defined_vars());
    }


    public function create()
    {
        abort_if(Gate::denies('admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user_type=LkpUserType::all();
        $role=Role::all();
          return view('admin.user.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=>'someTimes|unique:users,email',
            'phone_number'=>'required',
            'password'=>'required',
            'user_type'=>'required',


         ]);

          $user= new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone_number=$request['phone_number'];
            $user->user_type=$request['user_type'];
           $user->password = bcrypt($request['password']);
           $user->role_id=$request['role_id'];

          $user->save();
          return redirect()->route('user.index')->with('msg','User succefully registerd');

    }
    public function login()
    {

        return view('login');
    }
      public function userlogin(Request $request)
      {

        $validator = Validator::make($request->all(), [

            'email' => 'required',
            'password' =>'required',

        ]);

        $result = User::where(['email'=>$request->email,'user_type' => 3])->first();

        if(!is_null($result))
        {

            if (Hash::check($request->password, $result->password))
            {

                $request->session()->put('admin',$result);
                return redirect()->route('admin.home');
            }
            else
            {
                $request->session()->flash('msg','please give the valid data');
                return redirect('login');
            }
        }
        else
            {
                $request->session()->flash('msg','please give the valid data');
                return redirect('login');
            }

     }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        User::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
    public function edit($id)
    {
        //
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
