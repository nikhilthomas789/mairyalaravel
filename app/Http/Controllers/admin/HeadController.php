<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Head;
use Illuminate\Validation\Rule;

class HeadController extends BaseController
{
      public function create(Request $request,$id="")
    {
        
      $request->session()->forget('success');
      $name="";
      if($id!="")
      {

        $head=Head::find($id);
        $message="head updated successfully";
      }
      else
      {
        $head=new Head;
        $message="head added successfully";
      }
      
      if ($request->isMethod('post')) {

        $data=$request->validate([
                    'name'=>['required',Rule::unique('head', 'name')->ignore($head->id)],

        ]);
        $head->name=$data['name'];
         

        $head->save();
        $request->session()->flash('success',$message);
      }

     
        return view('admin.head.create')->with('datas',$head);
    }


    public function list(){

      $data=Head::get();
      return view('admin.head.list',['data'=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $head = Head::find($id);
        if($head['status']=="0")
            {
                $head->status="1";
                $head->save();
                $message="head activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $head->status="0";
                $head->save();
                $message="head deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/head/list');

    }

    public function delete(Request $request,$id)
   {
    $head = Head::find($id)->delete();

    $message="head deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/head/list');

   } 

}
