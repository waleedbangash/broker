<?php

namespace App\Http\Controllers\CustomerApi;


use App\User;
use App\LkpConstont;
use App\LkpUserType;
use App\OtpCustomer;
use App\LkpContactType;
use App\LkpOrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Encryption\DecryptException;

class RegisterController extends Controller
{
    public function customerRegisterotp(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'phone_number' =>'required',

            ]);
            if($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
            }

            $random=mt_rand(1000, 9999);
            if(OtpCustomer::where(['phone_number'=>$request->phone_number])->exists())
            {

            $otp=OtpCustomer::where('phone_number',$request->phone_number)->update([

                'otp' =>$random,
                'created_at' => Carbon::now()
                ]);


            }
            else
            {
                $otp=DB::table('otp_customers')->insert([
                'phone_number' => $request->phone_number,
                'otp' => $random,
                'created_at' => Carbon::now()
                ]);

            }
            //Get the token just created above
            $otpData = DB::table('otp_customers')
            ->where('phone_number', $request->phone_number)->first();
            $number=$otpData->phone_number;
            $otp=$otpData->otp;

            if ($this->sendResetEmail($number,$otp)) {
                return response()->json([
                'message'=>'success',
                'status'=> $otp,
            ]);
            } else {
                return response()->json([
                    'message'=>'A Network Error occurred. Please try again.',
                    ],400);

            }
    }

    public function customerRegister(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'otp' => 'required',
            'name' => 'required',
            'email'=>'sometimes',
            'phone_number'=>'required',
            'password'=>'required',
            'user_type'=>'required',
            'device_token' =>'required',

         ]);
         if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
        if(OtpCustomer::where(['otp'=>$request->otp,'phone_number'=>$request->phone_number])->exists())
        {
            $user= new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone_number=$request['phone_number'];
            $user->user_type=$request['user_type'];
           $user->password = bcrypt($request['password']);
           $user->device_token=$request['device_token'];
           $user->role_id=2;
           $user->user_status=1;

          $user->save();
          return response()->json([
            'message' => 'Register Successfully',
            'customer'=>$user,

        ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'otp or number is incorrect',
                  'status'=>400
            ], 400);
        }



    }
    public function customerLogin(Request $req)
    {
        $validator = Validator::make($req->all(), [

            'phone_number' => 'required',
            'password' =>'required',
            'device_token' =>'required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'message' => "Phone Number or Password Incorrect",
                'error' => $validator->errors()
            ], 401);

        }


        if(Auth::attempt(['phone_number' => $req->phone_number, 'password' => $req->password]))
        {
            $where = ['user_type' => 1,'phone_number'=>$req->phone_number];

            if(User::where($where)->exists()) {
            $user = User::where($where)->first();

            Auth::login($user);
            $user_auth = Auth::user();

            $token = $user_auth->createToken('Token Name')->accessToken;

                $users=User::where($where)
                    ->update([
                'api_token' => $token,
                'device_token'=>$req->device_token,
                'last_online_date'=>Carbon::now(),
                'user_on_offline'=>1,
                ]);
                 $order_status=LkpOrderStatus::where(['id'=>3])->first();
                 $contact_us=LkpContactType::all();
                 $constonts=LkpConstont::all();
                return response()->json([

            'message' => "success",
            'data'   => $user,
            'order_status'=>$order_status,
            'contact_us'=>$contact_us,
            'constant'=>$constonts,
            'token' => $token,

            ],200);
        }
        else
        {
            return response()->json([
                'phone_number' => " sorry you cannot access the application",
                'user_type' => "you are not allow for this role"],401);
        }
    }
    else
    {
        return response()->json([
            'phone_number' => " sorry you cannot access the application",
            'role_' => "you are not allow for this role"],401);
    }

    }

    public function updateProfile(Request $request)
    {


        if($request->name)
        {
            $user=User::where('id',$request->id)->update([
                'name'=>$request->name,
            ]);
        }
        if($request->email)
        {
            $user=User::where('id',$request->id)->update([
            'email'=>$request->email,
                ]);
        }
        if($request->password)
        {
            $user=User::where('id',$request->id)->update([
                'password'=>bcrypt($request->password),

                ]);
        }
        return response()->json([
            'message' => 'Profile Updated Successfully',
            'status' => '200',
            'user' =>$user
        ], 200);



    }

    public function customerForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'number' =>'required',
        'user_type'=>'required',
        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
          if( DB::table('users')->where(['phone_number'=> $request->number,'user_type'=>1])->exists())
           {
          $user = DB::table('users')->where(['phone_number'=> $request->number,'user_type'=>$request->user_type])
         ->first();

            //Check if the user exists


        //Create Password Reset Token
            if(DB::table('otp_customers')->where(['phone_number'=>$request->number])->exists())
            {
                $reset=DB::table('otp_customers')->where(['phone_number'=>$request->number])->update([
                    'otp' =>mt_rand(1000, 9999),
                    'created_at' => Carbon::now()
                ]);
            }
            else
            {
                $reset=DB::table('otp_customers')->insert([
                    'phone_number' => $request->number,
                    'otp' =>mt_rand(1000, 9999),
                    'created_at' => Carbon::now()
                ]);
            }


            //Get the token just created above
            $otpData = DB::table('otp_customers')
            ->where('phone_number', $request->number)->first();
            $number=$otpData->phone_number;
            $otp=$otpData->otp;
            if ($this->sendResetEmail($number,$otp)) {

            return response()->json([
             'message'=>'success',
             'status'=> $otpData->token,
            ]);
            }
           else
            {
             return response()->json([
                'message'=>'A Network Error occurred. Please try again.',
                ],400);
            }
        }
       else
       {
          return response()->json([
            'message'=>'User Type or number does not exists.',
            ],400);

        }

    }
    private function sendResetEmail($number, $otp)
   {
       //Retrieve the user from the database
    //    $user = DB::table('users')->where('phone_number', $number)->select('name', 'phone_number')->first();
    //    //Generate, the password reset link. The token generated is embedded in the link
    //    $link = config('base_url') . 'password/reset/' . $otp . '?phone_number='

           try {
               $ch = curl_init('https:www.4jawaly.net/api/sendsms.php?username=khr6669&password=000000&numbers='.$number.'&message='.$otp.'&sender=ALSMSAR&unicode=E&return=full');
               curl_setopt($ch, CURLOPT_POST, true);
            //    curl_setopt($ch, CURLOPT_POSTFIELDS, $link);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $result = curl_exec($ch); // Result from Branded SMS Pakistan including Return ID
               curl_close($ch);
               return true;
           } catch (\Exception $e) {
               return false;
           }
   }
    public function customerChangePaassword(Request $request)
    {

          $validator = Validator::make($request->all(),[
            'otp'=>'required',
            'password'=>'required',
          ]);
            if($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
            }

           if(DB::table('otp_customers')->where(['otp'=>$request->otp])->exists())
           {
            $number=DB::table('otp_customers')->where(['otp'=>$request->otp])->first();
               $password=bcrypt($request->password);
            $user=User::where(['phone_number'=>$number->phone_number])->update([
                'password'=>$password,
            ]);
            return response()->json([
                'message'=>'success',
                'status'=>200,
                'user'=>$user,
            ]);
           }
    }
    public function update(Request $request, $id)
    {

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
