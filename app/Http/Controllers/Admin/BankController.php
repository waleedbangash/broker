<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\LkpBankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $bank=LkpBankAccount::all();
        return view('admin.bank.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.bank.create');
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
            'bank_name' => 'required',
            'bank_logo'=>'required',
            'account_number'=>'required',
         ]);
         $bank_logo=$request->file('bank_logo');

         $bank_logoName = time() . mt_rand(1000, 999999) . '_' .$bank_logo->getClientOriginalName();
         $bank_logo->move(public_path('bank_logo'),$bank_logoName);

         $bank=new LkpBankAccount();
         $bank->bank_name=$request->bank_name;
         $bank->bank_logo="bank_logo/".$bank_logoName;
         $bank->account_number=$request->account_number;
         $bank->organization_name=$request->organization_name;
         $bank->save();
         return redirect()->route('admin.bank.index')->with('msg','Record is successfully created');

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
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bank=LkpBankAccount::where('id',$id)->first();
        return view('admin.bank.edit',get_defined_vars());
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
        $bank_logo=$request->file('bank_logo');

        $bank_logoName = time() . mt_rand(1000, 999999) . '_' .$bank_logo->getClientOriginalName();
        $bank_logo->move(public_path('bank_logo'),$bank_logoName);

        $bank=LkpBankAccount::where('id',$id)->update([
            'bank_name'=>$request->bank_name,
            'bank_logo'=>"bank_logo/".$bank_logoName,
            'account_number'=>$request->account_number,
            'organization_name'=>$request->organization_name,
        ]);
        return redirect()->route('admin.bank.index')->with('msg','record is succcefully updated');
    }

    public function massDestroy(Request $request)
    {
        dd($request); die;
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        LkpBankAccount::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
    public function destroy($id)
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank=LkpBankAccount::where('id',$id);
        $bank->delete();
        return redirect()->route('admin.bank.index')->with('msg','reocrd is deleted');
    }
}
