<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Moreinfo;

class MoreinfoController extends Controller
{
    public function list($id)
    {
    	$data=Moreinfo::where('v_id',$id)->get();
    	return view("admin.moreinfo.list",["data"=>$data]);
    }


    public function view($id)
    {
      $data = Moreinfo::find($id);
      return view("admin.moreinfo.view",["data"=>$data]);
    }

    public function delete(Request $request,$id)
    {
    $vehiclegallery1 = Moreinfo::find($id);
    $v_id=$vehiclegallery1['v_id'];
    $page = Moreinfo::find($id)->delete();
    $message="Request deleted successfully";
    $request->session()->flash('success',$message);
    return redirect()->intended('admin/vehicle/moreinfo/'.$v_id);
    } 
}
