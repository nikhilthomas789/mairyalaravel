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
use App\Model\Client;
use App\Http\Controllers\admin\ImagecropperController;
use DB;
use Illuminate\Validation\Rule;
class CreditorsController extends BaseController
{
      public function create(Request $request,$id="")
    {

      $request->session()->forget('success');
      if($id!="")
      {
        $creditors=Creditors::find($id);
        $message="creditors updated successfully";
      }
      else
      {
        $creditors=new Creditors;
        $message="creditors added successfully";
      }
     // $id = $request->get('id');
      if ($request->isMethod('post')) {
        $data=$request->validate([
          'head'=>'required',
          'name'=>['required',Rule::unique('creditors', 'name')->ignore($creditors->id)],
          'phone'=>'required|numeric',
          'discount'=>'required|numeric',
          'address'=>'required',
          
        ]);
       
       
        $creditors->head_id=$data['head'];
        $creditors->name=$data['name'];
        $creditors->phone=$request['phone'];
        $creditors->discount=$request['discount'];
        $creditors->address = $request['address'];
        $creditors->status = 1;
        
        $creditors->save();
        $request->session()->flash('success',$message);
      }

        $head=Head::get(['id','name']);
        return view('admin.creditors.create',['head'=>$head])->with('datas',$creditors);
    }

    public function list(){

    /*  $data=Backlinks::get();*/
      


      $data = DB::table('creditors')
            ->join('head', 'creditors.head_id', '=', 'head.id')
            ->select('creditors.*', 'head.name as catname')
            ->get();
            return view('admin.creditors.list',['data'=>$data]);


    }

       public function status(Request $request,$id)
    { 
        $creditors = Creditors::find($id);
        if($creditors['status']=="0")
            {
                $creditors->status="1";
                $creditors->save();
                $message="creditors activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $creditors->status="0";
                $creditors->save();
                $message="creditors deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/creditors/list');

    }
    

    public function delete(Request $request,$id)
   {
    $creditors = Creditors::find($id)->delete();

    $message="creditors deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/creditors/list');

   } 






}
