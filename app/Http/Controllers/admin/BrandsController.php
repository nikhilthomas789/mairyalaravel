<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Brands;
use App\Http\Controllers\admin\ImagecropperController;

class BrandsController extends BaseController
{
      public function create(Request $request,$id="")
    {
        
      $request->session()->forget('success');
      if($id!="")
      {

        $brands=Brands::find($id);
        $message="brands updated successfully";
      }
      else
      {
        $brands=new Brands;
        $message="brands created successfully";
      }
      
      if ($request->isMethod('post')) {

        $data=$request->validate([
          'name'=>'required',
          'image'=>'required',
        ]);
        $brands->name=$request['name'];
        $brands->image = $request['image'];
        $brands->save();
        $request->session()->flash('success',$message);
      }

     
        return view('admin.brands.create')->with('datas',$brands);
    }


    public function list(){

      $data=Brands::get();
      return view('admin.brands.list',['data'=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $brands = Brands::find($id);
        if($brands['status']=="0")
            {
                $brands->status="1";
                $brands->save();
                $message="brands activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $brands->status="0";
                $brands->save();
                $message="brands deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/brands/list');

    }

    public function delete(Request $request,$id)
   {
    $brands = Brands::find($id)->delete();

    $message="brands deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/brands/list');

   } 

   public function upload(){
    $crop = new ImagecropperController(
  isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
  isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
  isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null,
  'brands',
  '160',  //width
  '100'   //height
);

$response = array(
  'state'  => 200,
  'message' => $crop -> getMsg(),
  'result' => $crop -> getResult(),
  'name' => $crop -> getName()
);
echo json_encode($response);
   }

}
