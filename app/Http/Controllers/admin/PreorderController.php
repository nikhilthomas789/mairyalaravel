<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Preorder;

class PreorderController extends Controller
{
    public function list()
    {
    	$data=Preorder::get();
    	return view("admin.preorder.list",["data"=>$data]);
    }


    public function view($id)
    {
      $data = Preorder::find($id);

      return view("admin.preorder.view",["data"=>$data]);
    }

      public function delete(Request $request,$id)
   {
    $page = Preorder::find($id)->delete();
    $message="Preorder request deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/preorder/list');

   } 
}
