<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Creditors;
use App\Model\Head;
use App\Model\Purchase;
use App\Http\Controllers\admin\ImagecropperController;
use DB;
use Illuminate\Validation\Rule;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
class PurchasebillController extends BaseController
{
      public function create(Request $request,$id="")
    {

      $request->session()->forget('success');
      if($id!="")
      {
        $purchasebill=Purchase::find($id);
        $message="purchasebill updated successfully";
      }
      else
      {
        $purchasebill=new Purchase;
        $message="purchasebill added successfully";
      }
     // $id = $request->get('id');
      if ($request->isMethod('post')) {
       
       
        $purchasebill->check_no=$request['check_no'];
        $purchasebill->check_date=$request['check_date'];
        $purchasebill->check_amount=$request['check_amount'];
        $purchasebill->acnum=$request['acnum'];
        $purchasebill->paymenttype=$request['paymenttype'];
        $purchasebill->status = 0;
        $purchasebill->user = Auth::user()->name;
        
        $purchasebill->save();
        $request->session()->flash('success',$message);
      }

       
        return view('admin.purchasebill.create')->with('datas',$purchasebill);
    }

    public function list(){

        $data = DB::table('purchase')
            ->join('creditors', 'purchase.party_id', '=', 'creditors.id')
            ->select('purchase.*', 'creditors.name as partynamename'  )->get();
      
            return view('admin.purchasebill.list',['data'=>$data]);


    }



       public function status(Request $request,$id)
    { 
        $purchasebill = Purchase::find($id);
        if($purchasebill['status']=="0")
            {
                $purchasebill->status="1";
                $purchasebill->save();
                $message="purchasebill activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $purchasebill->status="0";
                $purchasebill->save();
                $message="purchasebill deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/purchasebill/list');

    }
    

    public function delete(Request $request,$id)
   {
    $purchasebill = Purchase::find($id)->delete();

    $message="purchasebill deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/purchasebill/list');

   } 


    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    } 






}
