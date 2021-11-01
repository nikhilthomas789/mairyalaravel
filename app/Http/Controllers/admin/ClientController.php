<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Client;
use App\Model\Package;
use App\Http\Controllers\admin\ImagecropperController;
use DB;
class ClientController extends BaseController
{
      public function create(Request $request,$id="")
    {
        // /dd($request);
      $request->session()->forget('success');
      if($id!="")
      {

        $client=Client::find($id);
        $message="client updated successfully";
      }
      else
      {
        $client=new Client;
        $message="client created successfully";
      }
      
      if ($request->isMethod('post')) {

        $data=$request->validate([
          'name'=>'required',
          'website'=>'required',
          'package'=>'required',
          'email' => 'nullable|email',
          'seoemail' => 'nullable|email',
          'specific'=>'sometimes'


        ]);
        $client->name=$data['name'];
        $client->website=$data['website'];
        $client->package_id=$data['package'];
        $client->keyword_count=$request['keyword_count'];
        $client->usersname=$request['usersname'];
        $client->pass=$request['pass'];
        $client->seo_email=$data['seoemail'];
        $client->seo_pass=$request['seopassword'];
        $client->phone=$request['phone'];
        $client->email=$data['email'];
        $client->fblink=$request['fblink'];
        $client->instalink=$request['instalink'];
        $client->twitterlink=$request['twitterlink'];
        $client->linkedinlink=$request['linkedinlink'];
        $client->blogspotlink=$request['blogspotlink'];
        $client->pinterestlink=$request['pinterestlink'];
        $client->address=$request['address'];
        $client->short_desc=$request['short_desc'];
        $client->desc1=$request['desc1'];
        $client->desc2=$request['desc2'];
        $client->desc3=$request['desc3'];
        $client->desc4=$request['desc4'];
        $client->desc5=$request['desc5'];

        if(isset($request['specific'])){
        $client->specifics=1;
       }
       else
       {
        $client->specifics=0;
       }


        if($client->save())
     {
            $request->session()->flash('success',$message);
            return redirect()->intended('admin/client/list');

        
     }
        
      }

      $package=Package::get(['id','name']);
     

      return view('admin.client.create',['package'=>$package])->with('datas',$client);
      


    }


    public function list(){

      $data=Client::get();
      return view('admin.client.list',['data'=>$data]);
    }

       public function status(Request $request,$id)
    { 
        $client = Client::find($id);
        if($client['status']=="0")
            {
                $client->status="1";
                $client->save();
                $message="client activated successfully";
                $request->session()->flash('success',$message);
            }
        else
            {
                $client->status="0";
                $client->save();
                $message="client deactivated";
                $request->session()->flash('danger',$message);
            }
    return redirect()->intended('admin/client/list');

    }

    public function delete(Request $request,$id)
   {
    $page = Client::find($id)->delete();

    $message="client deleted successfully";
    $request->session()->flash('success',$message);

    return redirect()->intended('admin/client/list');

   } 



   public function getcount($id){

     $data = DB::table('packages')
            ->where('packages.id',$id)
            ->get();
return response()->json($data);

            //return $data;

   }







}
