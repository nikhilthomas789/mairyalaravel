<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Bookatestdrive;

class TestdriveController extends Controller
{
    public function list($id)
    {
      //exit;
    	$data=Bookatestdrive::where('v_id',$id)->get();
    	return view("admin.testdrive.list",["data"=>$data]);
    }


    public function view($id)
    {
      $data = Bookatestdrive::find($id);

      return view("admin.testdrive.view",["data"=>$data]);
    }

      public function delete(Request $request,$id)
   {
    $vehiclegallery1 = Bookatestdrive::find($id);
    $v_id=$vehiclegallery1['v_id'];

    $page = Bookatestdrive::find($id)->delete();
    $message="Request deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/vehicle/testdrive/'.$v_id);

   } 
}
