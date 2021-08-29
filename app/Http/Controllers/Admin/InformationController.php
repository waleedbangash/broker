<?php

namespace App\Http\Controllers\Admin;
use Gate;
use App\LkpConstont;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $constont=LkpConstont::all();
        return view('admin.information.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $constont=LkpConstont::where('id',$id)->first();
        return view('admin.information.edit',get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $constont=LkpConstont::where('id',$id)->update([
            'value'=>$request->value,
        ]);
        return redirect(route('admin.information.index'))->with('msg','record is succssfully updated');
    }
    public function store(Request $request)
    {
        //
    }
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        LkpConstont::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
}
