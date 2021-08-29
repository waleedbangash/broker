<?php
namespace App\Http\Controllers\Admin;
use Gate;
use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('ads_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ads=Announcement::all();
        return view('admin.ads.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('ads_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ads.create');
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
            'text' => 'required',
            'photo'=>'required',
            'place_in_app'=>'required',
            'to_client'=>'sometimes',
            'to_provider'=>'sometimes',
         ]);

         $ads_pic=$request->file('photo');
         $ads_picName = time() . mt_rand(1000, 999999) . '_' .$ads_pic->getClientOriginalName();
         $ads_pic->move(public_path('ads_image'),$ads_picName);

         $ads=new Announcement();
         $ads->text=$request->text;
         $ads->url=$request->url;
         $ads->photo="ads_image/".$ads_picName;
         $ads->place_in_app=$request->place_in_app;
         if($request->to_client)
         {
         $ads->to_client=$request->to_client;
         }
         if($request->to_provider)
         {
         $ads->to_provider=$request->to_provider;
         }
         $ads->save();
         return redirect()->route('admin.ads.index')->with('msg','ads is succefully sended');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('ads_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ads=Announcement::where('id',$id)->first();
       return view('admin.ads.edit',get_defined_vars());
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

        $ads_pic=$request->file('photo');
        $ads_picName = time() . mt_rand(1000, 999999) . '_' .$ads_pic->getClientOriginalName();
        $ads_pic->move(public_path('ads_image'),$ads_picName);

        $ads=Announcement::where('id',$id)->update([
            'text'=>$request->text,
            'url'=>$request->url,
            'photo'=>"ads_image/".$ads_picName,
            'place_in_app'=>$request->place_in_app,
            'to_client'=>$request->to_client,
            'to_provider'=>$request->to_provider,
        ]);

        return redirect()->route('admin.ads.index')->with('msg','ads is succefully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('ads_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ads=Announcement::where('id',$id);
        $ads->delete();
        return redirect()->back()->with('msg','record is succefully deleted');
    }
    public function massDestroy(Request $request)
    {
       Announcement::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
}
