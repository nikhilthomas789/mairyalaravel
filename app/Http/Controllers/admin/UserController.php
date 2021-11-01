<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Usergroup;
use App\Model\User;
use App\Http\Controllers\admin\ImagecropperController;

class UserController extends BaseController
{
      public function create(Request $request,$id="")
    {

     // echo $id;exit;

      // dd($request);
      $request->session()->forget('success');
      $name="";
      if($id!="")
      {

        $user=User::find($id);
        $message="user updated successfully";
      }
      else
      {
        $user=new User;
        $message="user created successfully";
      }
      
      if ($request->isMethod('post')) {
          
     if($id){
         $data=$request->validate([
         
           'name'=>'required',
          'email'=>'required|email',
          'username'=>'required',
          'password'=>'required',
          'icon'=>'required'
        ]);
         $data['usergroup_id']=$user->usergroup_id;
      }
      else
      {
        $data=$request->validate([
          'usergroup_id'=>'required',
          'name'=>'required',
          'email'=>'required|email',
          'username'=>'required',
          'password'=>'required',
          'icon'=>'required'
        ]);
      }
        
        $user->usergroup_id=$data['usergroup_id'];
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->username=$data['username'];
        $user->password=bcrypt($data['password']);
        $user->icon = $data['icon'];
        $user->save();
        $request->session()->flash('success',$message);
      }

            $usergroup=Usergroup::get(['id','name']);


     
        return view('admin.user.create',['usergroup'=>$usergroup])->with('datas',$user);
    }


    public function list(){

      $data=User::with('usergroup')->get();
     
      return view('admin.user.list',['data'=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $user = User::find($id);
        if($user['status']=="0")
            {
                $user->status="1";
                $user->save();
                $message="user activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $user->status="0";
                $user->save();
                $message="user deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/user/list');

    }

    public function delete(Request $request,$id)
   {
    $user = User::find($id)->delete();

    $message="user deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/user/list');

   } 
   public function upload(){
    $crop = new ImagecropperController(
  isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
  isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
  isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null,
  'users',
  '100',  //width
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
