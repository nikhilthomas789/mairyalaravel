<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Usergroup;
use App\Model\User;

class LoginController extends BaseController
{
  public function login(Request $request)
  {
   if ($request->isMethod('post')) {
    $data=$request->validate(['username' => 'required|string|max:255',
                                'password' => 'required|string|min:6']);
       
         if (Auth::attempt($data)) {
              return  redirect('/admin/home');
         }
         else
         {
            $errors =new MessageBag(['username'=>[Lang::get('auth.failed')]]);

            return redirect('/')->withInput()->with(['errors'=>$errors]);

            
         }
         
    }
    return View('auth.login');
  }
  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}
