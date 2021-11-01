<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Company;
use App\Http\Controllers\admin\ImagecropperController;

class CompanyController extends BaseController
{
      public function create(Request $request,$id="")
    {
        
      $request->session()->forget('success');
      if($id!="")
      {

        $company=Company::find($id);
        $message="Updated Successfully";
      }
      else
      {
        abort('404');
        $company=new Company;
        $message="Created Successfully";
      }
      
      if ($request->isMethod('post')) {

        $data=$request->validate([
          'company_name'=>'required',
          'company_email'=>'required',
          'company_phone'=>'required',
          'company_address'=>'required',
          'company_logo'=>'required'
        ]);
        $company->company_name=$data['company_name'];
        $company->company_email=$data['company_email'];
        $company->company_phone=$data['company_phone'];
        $company->company_address=$data['company_address'];
         /* if (Input::hasFile('company_logo'))
          {
            $original_filename=$request->company_logo->getClientOriginalName('company_logo');
            $newname=date('dmyhs').$original_filename;
            $file=$request->company_logo->storeas('/company',$newname,'public_uploads');
          } */
        $company->company_logo = $data['company_logo'];

        $company->save();
        $request->session()->flash('success',$message);
      }

     
        return view('admin.company.create')->with('datas',$company);
    }


}
