<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Head;
use App\Model\Customer;
use App\Http\Controllers\admin\ImagecropperController;
use DB;
use Illuminate\Validation\Rule;
class CustomerController extends BaseController
{
      public function create(Request $request,$id="")
    {

      $request->session()->forget('success');
      if($id!="")
      {
        $customer=Customer::find($id);
        $message="customer updated successfully";
      }
      else
      {
        $customer=new Customer;
        $message="customer added successfully";
      }
     // $id = $request->get('id');
      if ($request->isMethod('post')) {
        $data=$request->validate([
          'name'=>'required',
          'mobile'=>'required|numeric',
          'place'=>'required',
          'required_language'=>'required',
          'requirement_type'=>'required',
          'required_date'=>'required',
          'name'=>'required',
          'name'=>'required',
          'name'=>'required',
          'name'=>'required',
          'name'=>'required',
          'name'=>'required',
          'discount'=>'required|numeric',
          'address'=>'required',
          
        ]);
       
       
        $customer->head_id=$data['head'];
        $customer->name=$data['name'];
        $customer->phone=$request['phone'];
        $customer->discount=$request['discount'];
        $customer->address = $request['address'];
        $customer->status = 1;
        
        $customer->save();
        $request->session()->flash('success',$message);
      }

        $head=Head::get(['id','name']);
        return view('admin.customer.create',['head'=>$head])->with('datas',$customer);
    }

    public function list(){

    /*  $data=Backlinks::get();*/
      


      $data = DB::table('customer')
            ->join('head', 'customer.head_id', '=', 'head.id')
            ->select('customer.*', 'head.name as catname')
            ->get();
            return view('admin.customer.list',['data'=>$data]);


    }

       public function status(Request $request,$id)
    { 
        $customer = Customer::find($id);
        if($customer['status']=="0")
            {
                $customer->status="1";
                $customer->save();
                $message="customer activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $customer->status="0";
                $customer->save();
                $message="customer deactivated";
                $request->session()->flash('danger',$message);
            }
            return redirect()->intended('admin/customer/list');
    }
    

    public function delete(Request $request,$id)
   {
    $customer = Customer::find($id)->delete();

    $message="customer deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/customer/list');

   } 






}
