<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Finance;

class FinanceController extends Controller
{
    public function list()
    {
    	$data=Finance::get();

    	return view("admin.finance.list",["data"=>$data]);
    }


    public function view($id)
    {
      $data = Finance::find($id);

      return view("admin.finance.view",["data"=>$data]);
    }

      public function delete(Request $request,$id)
   {
    $page = Finance::find($id)->delete();
    $message="finance deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/finance/list');

   } 
}
