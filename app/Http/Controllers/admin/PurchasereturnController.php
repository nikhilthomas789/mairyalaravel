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
use Auth;;
class PurchasereturnController extends BaseController
{
      public function create(Request $request,$id="")
    {

      $request->session()->forget('success');
      if($id!="")
      {
        $purchasereturn=Purchase::find($id);
        $message="purchasereturn updated successfully";
      }
      else
      {
        $purchasereturn=new Purchase;
        $message="purchasereturn added successfully";
      }
     // $id = $request->get('id');
      if ($request->isMethod('post')) {
        $data=$request->validate([
          'party'=>'required',
          'inv_date'=>'required',
          'inv_no'=>'required',
          'amount'=>'required|numeric'
          
        ]);
       
       
        $purchasereturn->party_id=$data['party'];
        $purchasereturn->inv_date=$data['inv_date'];
        $purchasereturn->inv_no=$data['inv_no'];
        $purchasereturn->amount=$data['amount'];
        $purchasereturn->billtype=$request['billtype'];
        $purchasereturn->billdiscount=$request['billdiscount'];
        $purchasereturn->entry_id=$request['entry_id'];
      
        $purchasereturn->status = 0;
        $purchasereturn->user = Auth::user()->name;
        
        $purchasereturn->save();
        $request->session()->flash('success',$message);
      }

       $head=Head::get(['id','name']);
       $creditors=Creditors::get(['id','name']);
        return view('admin.purchasereturn.create',['head'=>$head,'creditors'=>$creditors])->with('datas',$purchasereturn);
    }

    public function list(){

    /*  $data=Backlinks::get();*/
      


     $data = DB::table('purchase')
            ->join('creditors', 'purchase.party_id', '=', 'creditors.id')
            ->select('purchase.*', 'creditors.name as partynamename')->where('purchase.entry_id',2)->get();
            return view('admin.purchasereturn.list',['data'=>$data]);


    }

       public function status(Request $request,$id)
    { 
        $purchasereturn = Purchase::find($id);
        if($purchasereturn['status']=="0")
            {
                $purchasereturn->status="1";
                $purchasereturn->save();
                $message="purchasereturn activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $purchasereturn->status="0";
                $purchasereturn->save();
                $message="purchasereturn deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/purchasereturn/list');

    }
    

    public function delete(Request $request,$id)
   {
    $purchasereturn = Purchase::find($id)->delete();

    $message="purchasereturn deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/purchasereturn/list');

   } 






}
