<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\GoogleanalyticsController;
use App\Model\Googleanalytics;
use Redirect;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data=[];
        $data['usergroupcount']=count(DB::table('usergroups')->where('status',1)->get());
        $data['usercount']=count(DB::table('users')->where('status',1)->get());
        $data['enquirycount']=count(DB::table('contact')->get());
        $data['headcount']=count(DB::table('head')->get());
        // $data['partycount']=count(DB::table('creditors')->get());




        return view('admin.home.index',['data'=>$data]);

    }

}
