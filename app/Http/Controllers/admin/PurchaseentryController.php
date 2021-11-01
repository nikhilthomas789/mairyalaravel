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
class PurchaseentryController extends BaseController
{
      public function create(Request $request,$id="")
    {

      $request->session()->forget('success');
      if($id!="")
      {
        $purchaseentry=Purchase::find($id);
        $message="purchaseentry updated successfully";
      }
      else
      {
        $purchaseentry=new Purchase;
        $message="purchaseentry added successfully";
      }
     // $id = $request->get('id');
      if ($request->isMethod('post')) {
        $data=$request->validate([
          'party'=>'required',
          'inv_date'=>'required',
          'inv_no'=>['required',Rule::unique('purchase', 'inv_no')->ignore($purchaseentry->id)],
          'amount'=>'required |numeric',
           'billtype'=>'required',
            'billdiscount'=>'required|numeric'
          
        ]);
       
       
        $purchaseentry->party_id=$data['party'];
        $purchaseentry->inv_date=$data['inv_date'];
        $purchaseentry->inv_no=$data['inv_no'];
        $purchaseentry->amount=$data['amount'];
        $purchaseentry->billtype=$request['billtype'];
        $purchaseentry->billdiscount=$request['billdiscount'];
        $purchaseentry->entry_id=$request['entry_id'];
        $purchaseentry->status = 0;
        $purchaseentry->user = Auth::user()->name;
        $purchaseentry->save();
        $request->session()->flash('success',$message);
      }

       $head=Head::get(['id','name']);
       $creditors=Creditors::get(['id','name']);
        return view('admin.purchaseentry.create',['head'=>$head,'creditors'=>$creditors])->with('datas',$purchaseentry);
    }

    public function list(){

    /*  $data=Backlinks::get();*/
      
        $data = DB::table('purchase')
            ->join('creditors', 'purchase.party_id', '=', 'creditors.id')
            ->select('purchase.*', 'creditors.name as partynamename')->where('purchase.entry_id',1)->get();
            return view('admin.purchaseentry.list',['data'=>$data]);


        /*$data=Purchase::where('entry_id',1)->get();
            return view('admin.purchaseentry.list',['data'=>$data]);*/


    }

       public function status(Request $request,$id)
    { 
        $purchaseentry = Purchase::find($id);
        if($purchaseentry['status']=="0")
            {
                $purchaseentry->status="1";
                $purchaseentry->save();
                $message="purchaseentry activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $purchaseentry->status="0";
                $purchaseentry->save();
                $message="purchaseentry deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/purchaseentry/list');

    }
    

    public function delete(Request $request,$id)
   {
    $purchaseentry = Purchase::find($id)->delete();

    $message="purchaseentry deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/purchaseentry/list');

   } 






}
