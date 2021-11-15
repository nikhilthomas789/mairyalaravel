<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Requirement;
use App\Model\Staff;
use App\Http\Controllers\admin\ImagecropperController;
use DB;
use Illuminate\Validation\Rule;
class StaffController extends BaseController
{
      public function create(Request $request,$id="")
    {

      $request->session()->forget('success');
      if($id!="")
      {
        $staff=Staff::find($id);
        $message="staff updated successfully";
      }
      else
      {
        $staff=new Staff;
        $message="staff added successfully";
      }


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
       
        $staff->name=$data['name'];
        $staff->mobile=$request['mobile'];
        $staff->place=$request['place'];
        $staff->required_language=json_encode($request['required_language']);
        $staff->requirement_type=$request['requirement_type'];
        $staff->requirement_id=$request['requirement'];

        $old_date_timestamp = strtotime($request['required_date']);

        $staff->required_date = date('Y-m-d H:i:s', $old_date_timestamp); 
        $staff->family_members = $request['family_members'];
        $staff->summary_requirement = $request['summary_requirement'];
        $staff->rate_quoted = $request['rate_quoted'];

        $old_date_timestamps = strtotime($request['followup_date']);

        $staff->followup_date = date('Y-m-d H:i:s', $old_date_timestamps); 
        $staff->status = 1;
        
        $staff->save();
        $request->session()->flash('success',$message);
      }

        $requirement=Requirement::get(['id','name']);

        $language = DB::table('language')->get();


        $lang=[];
        $lang = json_decode($staff->required_language);

     
    

        return view('admin.staff.create',['language'=>$language,'lang'=>$lang,'requirement'=>$requirement])->with('datas',$staff);
    }

    public function list(){


      $data = DB::table('staff')->get();


      //$data = DB::table('customer')->get();
            return view('admin.staff.list',['data'=>$data]);


    }


    public function view($id)
    {

          $data = DB::table('staff')
            ->join('requirement', 'staff.requirement_id', '=', 'requirement.id')
            ->select('staff.*', 'requirement.name as reqname')
            ->where('staff.id',$id)
            ->get();


      return view("admin.staff.view",["data"=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $staff = Staff::find($id);
        if($staff['status']=="0")
            {
                $staff->status="1";
                $staff->save();
                $message="staff activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $staff->status="0";
                $staff->save();
                $message="staff deactivated";
                $request->session()->flash('danger',$message);
            }
            return redirect()->intended('admin/staff/list');
    }
    

    public function delete(Request $request,$id)
   {
    $staff = Staff::find($id)->delete();

    $message="staff deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/staff/list');

   } 






}
