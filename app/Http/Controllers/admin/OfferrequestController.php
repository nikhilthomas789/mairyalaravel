<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Offerform;

class OfferrequestController extends Controller
{
    public function list($id)
    {
    	$data=Offerform::where('v_id',$id)->get();
    	return view("admin.offerform.list",["data"=>$data]);
    }

    public function view($id)
    {
      $data = Offerform::find($id);
      return view("admin.offerform.view",["data"=>$data]);
    }

    public function delete(Request $request,$id)
    {
    $vehiclegallery1 = Offerform::find($id);
    $v_id=$vehiclegallery1['v_id'];
    $page = Offerform::find($id)->delete();
    $message="Request deleted successfully";
    $request->session()->flash('success',$message);
    return redirect()->intended('admin/vehicle/offerrequest/'.$v_id);
    } 
}
