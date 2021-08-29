<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\LkpService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services=LkpService::all();
        return view('admin.services.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $service_pic=$request->file('service_picture');

        $service_picName = time() . mt_rand(1000, 999999) . '_' .$service_pic->getClientOriginalName();
        $service_pic->move(public_path('service_image'),$service_picName);
        $services=new LkpService();
        $services->service_name=$request->service_name;
        $services->service_picture= "service_image/".$service_picName;
        $services->save();
        return redirect()->route('admin.services.index')->with('msg','service is successfull created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services=LkpService::where('id',$id)->first();
        return view('admin.services.edit',get_defined_vars());
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
        $service_pic=$request->file('service_picture');

        $service_picName = time() . mt_rand(1000, 999999) . '_' .$service_pic->getClientOriginalName();
        $service_pic->move(public_path('service_image'),$service_picName);
        $services=LkpService::where('id',$id)->update([
            'service_name'=>$request->service_name,
            'service_picture'=> "service_image/".$service_picName,
        ]);
        return redirect()->route('admin.services.index')->with('msg','record is successfully updated');
    }
    public function massDestroy(Request $request)
    {

        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services=LkpService::whereIn('id',request('ids'))->delete();

        return response(null, 204);
    }
    public function destroy($id)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

           LkpService::where('id',$id)->delete();
        return redirect()->route('admin.services.index')->with('msg','reocrd is deleted');
    }
}
