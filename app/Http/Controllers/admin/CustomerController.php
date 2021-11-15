<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Requirement;
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
          'requirement'=>'required',
          'required_date'=>'required',
          'family_members'=>'required',
          'summary_requirement'=>'required',
          'rate_quoted'=>'required',
          'followup_date'=>'required',
          
        ]);
       
        $customer->name=$data['name'];
        $customer->mobile=$request['mobile'];
        $customer->place=$request['place'];
        $customer->required_language=json_encode($request['required_language']);
        $customer->requirement_type=$request['requirement_type'];
        $customer->requirement_id=$request['requirement'];

        $old_date_timestamp = strtotime($request['required_date']);

        $customer->required_date = date('Y-m-d H:i:s', $old_date_timestamp); 
        $customer->family_members = $request['family_members'];
        $customer->summary_requirement = $request['summary_requirement'];
        $customer->rate_quoted = $request['rate_quoted'];

        $old_date_timestamps = strtotime($request['followup_date']);

        $customer->followup_date = date('Y-m-d H:i:s', $old_date_timestamps); 
        $customer->status = 1;
        
        $customer->save();
        $request->session()->flash('success',$message);
      }

        $requirement=Requirement::get(['id','name']);

        $language = DB::table('language')->get();


        $lang=[];
        $lang = json_decode($customer->required_language);

     
    

        return view('admin.customer.create',['language'=>$language,'lang'=>$lang,'requirement'=>$requirement])->with('datas',$customer);
    }

    public function list(){


      $data = DB::table('customer')
            ->join('requirement', 'customer.requirement_id', '=', 'requirement.id')
            ->select('customer.*', 'requirement.name as reqname')
            ->get();


      //$data = DB::table('customer')->get();
            return view('admin.customer.list',['data'=>$data]);


    }


    public function view($id)
    {

          $data = DB::table('customer')
            ->join('requirement', 'customer.requirement_id', '=', 'requirement.id')
            ->select('customer.*', 'requirement.name as reqname')
            ->where('customer.id',$id)
            ->get();


      return view("admin.customer.view",["data"=>$data]);
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
