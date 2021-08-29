<?php

namespace App\Http\Controllers\ContactApi;

use App\ChettingOnContact;
use App\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' =>'required',
            'contact_text'=>'required',
            'contact_type_id'=>'required',

            ]);
            if($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
            }
            $token = $request->bearerToken();
            if(User::where(['user_type'=>1,'id'=> $request->user_id,'api_token'=> $token])->exists())
            {
                $contact=new Contact();
                $contact->user_id=$request->user_id;
                $contact->contact_text=$request->contact_text;
                $contact->contact_type_id=$request->contact_type_id;
                $contact->save();

                return response()->json([

                    'message' => "record is succefully inserted",
                   'status'=>200,
                ],200);
            }
            elseif(User::where(['user_type'=>2,'id'=> $request->user_id,'api_token'=> $token])->exists())
            {
                $contact=new Contact();
                $contact->user_id=$request->user_id;
                $contact->contact_text=$request->contact_text;
                $contact->contact_type_id=$request->contact_type_id;
                $contact->save();
                return response()->json([

                    'message' => "record is succefully inserted",
                   'status'=>200,
                ],200);
            }
            else{
                return response()->json([
                'message' => "user does not exists",
                'status'=>200,
            ],200);
            }
    }

    public function sendMessage(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'chat_text' =>'required',
            'contact_id'=>'required',
        ]);
            if($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
            }
            $token=$request->bearerToken();
            $user_id=User::where(['api_token'=>$token])->first()->id;

            $chatcontact=new ChettingOnContact();
            $chatcontact->chat_text=$request->chat_text;
            $chatcontact->role_id=1;
            $chatcontact->user_id=$user_id;
            $chatcontact->contact_id=$request->contact_id;
            $chatcontact->save();
            return response()->json([
               'message'=>'success',
               'data'=>$chatcontact,
               'status'=>200,
            ],200);


    }
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' =>'required',
        ]);
        if($validator->fails()) {
            return response()->json(['success'=>false, 'errors' => $validator->errors()],422);
        }
        $token = $request->bearerToken();
        if(User::where(['user_type'=>1,'id'=> $request->user_id,'api_token'=> $token])->exists())
        {
            $contact=Contact::where('user_id',$request->user_id)->with(['contactType'])->get();
            for($i=0; $i<count($contact); $i++)
            {
                $contact[$i]->chattingContact=ChettingOnContact::where(['contact_id'=>$contact[$i]->id])->get();
            }
            return response()->json([
                'message'=>'success',
                'data'=>$contact,
            ],200);
        }
        elseif(User::where(['id'=> $request->user_id,'api_token'=> $token,'user_type'=>2])->exists())
        {
            $contact=Contact::where('user_id',$request->user_id)->with(['chattingContacts','contactType'])->get();
            return response()->json([
                'message'=>'success',
                'data'=>$contact,
                'status'=>200,
            ],200);
        }
        else{
            return response()->json([
                'message'=>'user_ id or token is incoorect',
                'status'=>400,
            ],400);
        }

    }
}
