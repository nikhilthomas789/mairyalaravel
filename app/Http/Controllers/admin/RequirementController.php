<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Requirement;
use Illuminate\Validation\Rule;

class RequirementController extends BaseController
{
      public function create(Request $request,$id="")
    {
        
      $request->session()->forget('success');
      $name="";
      if($id!="")
      {

        $requirement=Requirement::find($id);
        $message="requirement updated successfully";
      }
      else
      {
        $requirement=new Requirement;
        $message="requirement added successfully";
      }
      
      if ($request->isMethod('post')) {

        $data=$request->validate([
                    'name'=>['required',Rule::unique('requirement', 'name')->ignore($requirement->id)],

        ]);
        $requirement->name=$data['name'];
         

        $requirement->save();
        $request->session()->flash('success',$message);
      }

     
        return view('admin.requirement.create')->with('datas',$requirement);
    }


    public function list(){

      $data=Requirement::get();
      return view('admin.requirement.list',['data'=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $requirement = Requirement::find($id);
        if($requirement['status']=="0")
            {
                $requirement->status="1";
                $requirement->save();
                $message="requirement activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $requirement->status="0";
                $requirement->save();
                $message="requirement deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/requirement/list');

    }

    public function delete(Request $request,$id)
   {
    $requirement = Requirement::find($id)->delete();

    $message="requirement deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/requirement/list');

   } 

}
