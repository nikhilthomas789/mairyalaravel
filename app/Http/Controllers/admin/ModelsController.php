<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Models;
use App\Model\Manufacturers;
class ModelsController extends BaseController
{
      public function create(Request $request,$id="")
    {
        
      $request->session()->forget('success');
      $name="";
      if($id!="")
      {

        $models=Models::find($id);
        $message="models updated successfully";
      }
      else
      {
        $models=new Models;
        $message="models added successfully";
      }
      
      if ($request->isMethod('post')) {

        $data=$request->validate([
          'manufacturer'=>'required',
          'name'=>'required'
        ]);

        $models->manu_id=$data['manufacturer'];
        $models->name=$data['name'];
         

        $models->save();
        $request->session()->flash('success',$message);
      }

      $manufacturer=Manufacturers::get(['id','name']);
        return view('admin.models.create',['manufacturer'=>$manufacturer])->with('datas',$models);
    }


    public function list(){

      $data=Models::get();
      return view('admin.models.list',['data'=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $models = Models::find($id);
        if($video['status']=="0")
            {
                $models->status="1";
                $models->save();
                $message="models activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $models->status="0";
                $models->save();
                $message="models deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/models/list');

    }

    public function delete(Request $request,$id)
   {
    $models = Models::find($id)->delete();

    $message="models deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/models/list');

   } 

}
