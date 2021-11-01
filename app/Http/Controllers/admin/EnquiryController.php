<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;

class EnquiryController extends Controller
{
    public function list()
    {
    	$data=Contact::get();

    	return view("admin.enquiry.list",["data"=>$data]);
    }


    public function view($id)
    {
      $data = Contact::find($id);

      return view("admin.enquiry.view",["data"=>$data]);
    }

      public function delete(Request $request,$id)
   {
    $page = Contact::find($id)->delete();
    $message="enquiry deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/enquiry/list');

   } 
}
