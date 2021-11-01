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
use App\Model\Userrights;
use App\Model\Menu;

class UsergroupController extends BaseController
{
  public function create(Request $request, $id = "")
  {
    $request->session()->forget('success');
    if ($id != "") {

      $usergroup = Usergroup::find($id);
      $message = "usergroup updated successfully";
    } else {
      $usergroup = new Usergroup;

      $message = "usergroup created successfully";
    }

    if ($request->isMethod('post')) {

      $data = $request->validate(['name' => 'required']);
      $usergroup->name = $data['name'];
      $usergroup->save();
      $request->session()->flash('success', $message);
    }
    return view('admin.usergroup.create')->with('data', $usergroup);
  }


  public function list()
  {

    $data = Usergroup::get();
    return view('admin.usergroup.list', ['data' => $data]);
  }

  public function permission(Request $request, $id)
  {


    $data = Menu::where('parent_id', '=', 0)->get();



    $request->session()->forget('success');

    $menu_permissions = json_encode($request->menu_id);

    if ($request->isMethod('post')) {
      $userrights = Userrights::where('user_id', $id)->first();
      if ($userrights == null) {
        $userrights = new Userrights;
      }

      $userrights->menu_id = $menu_permissions;
      $userrights->user_id = $id;
      $userrights->save();
    }

    $userrights = Userrights::where('user_id', $id)->first();

    $permissions = [];
    if ($userrights != null) {
      if ($userrights->count() > 0) {
        $permissions = json_decode($userrights->menu_id);
        $userrights->menu_id = $permissions;
      }
    }
    return view('admin.usergroup.permission', ['data' => $data, 'val' => $permissions]);
  }

  public function status(Request $request, $id)
  {
    $usergroup = Usergroup::find($id);
    if ($usergroup['status'] == "0") {
      $usergroup->status = "1";
      $usergroup->save();
      $message = "usergroup activated successfully";
      $request->session()->flash('success', $message);
    } else {
      $usergroup->status = "0";
      $usergroup->save();
      $message = "usergroup deactivated";
      $request->session()->flash('danger', $message);
    }



    return redirect()->intended('admin/usergroup/list');
  }

  public function delete(Request $request, $id)
  {

   // $exists = User::find()->where( [ 'user_group_id' => $id ] )->exists();



    $count = User::where('usergroup_id', $id)->count();

    if($count==0)
    {
      $usergroup = Usergroup::find($id)->delete();
      $message = "usergroup deleted successfully";
      $request->session()->flash('success', $message);
    }
    else
    {
      $message = "Can't Delete ! User Exists Under This Group";
      $request->session()->flash('danger', $message);
    }

    return redirect()->intended('admin/usergroup/list');
  }


}
