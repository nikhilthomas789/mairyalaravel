<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Friendform;

class EmailfriendController extends Controller
{
    public function list($id)
    {


    	$data=Friendform::where('v_id',$id)->get();
    	return view("admin.friendform.list",["data"=>$data]);
    }

    public function view($id)
    {
      $data = Friendform::find($id);
      return view("admin.friendform.view",["data"=>$data]);
    }

    public function delete(Request $request,$id)
    {

    $vehiclegallery1 = Friendform::find($id);
    $v_id=$vehiclegallery1['v_id'];
    $page = Friendform::find($id)->delete();
    $message="Request deleted successfully";
    $request->session()->flash('success',$message);
    return redirect()->intended('admin/vehicle/emailfriend/'.$v_id);
    } 
}
