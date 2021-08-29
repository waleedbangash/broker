<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Contact;
use App\ChettingOnContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact=Contact::with(['userDetail','contactType'])->get();


        return view('admin.contactus.index',get_defined_vars());
    }


    public function contactDetail($id)
    {
         $detail=Contact::where('id',$id);
         $read_status=$detail->update([
             'read_status'=>1,
         ]);
         $contact=Contact::where('id',$id)->first();

            $detail=ChettingOnContact::where('contact_id',$id)->with(['user'])->get();

        return view('admin.contactus.detail',get_defined_vars());
    }
    public function store(Request $request,$id)
    {

        $this->validate($request,[
            'chat_text' => 'required',

         ]);


       $contact=Contact::where('id',$id)->first();

      $chating= new ChettingOnContact();

      $chating->chat_text=$request->chat_text;
      $chating->contact_id=$contact->id;
      $chating->role_id=2;
      $chating->save();
      return redirect()->back();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
