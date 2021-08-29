<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\LkpConstont;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function privacy()
    {
        $privacy_policy=LkpConstont::where(['id'=>3])->first();

        return view('admin.pages.privacy' ,get_defined_vars());
    }
    public function whoWeare()
    {
        $who_we_are=LkpConstont::where(['id'=>2])->first();

        return view('admin.pages.who_we_are' ,get_defined_vars());
    }
    public function termsAndCondition()
    {
         $condition=LkpConstont::where(['id'=>4])->first();
         return view('admin.pages.t_and_c' ,get_defined_vars());
    }
}
