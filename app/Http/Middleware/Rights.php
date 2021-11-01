<?php

namespace App\Http\Middleware;
use Route;
use Closure;
use App\Model\User;
use App\Model\Menu;
use App\Model\Userrights;
use Illuminate\Support\Facades\Auth;

class Rights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


$group = User::find(Auth::id());


$urlfull=Route::getFacadeRoot()->current()->uri();

$urlfull=str_replace("/{id}",'',$urlfull);
$data=Menu::where('url','=',$urlfull)->get();
$rights=Userrights::where('user_id','=',$group->usergroup_id)->get();
$menujson=$rights[0]['menu_id'];
$menuarray=json_decode($menujson);

//dd($menuarray);
$val=false;
if($menuarray){
foreach ($menuarray as $value) {
    if($data[0]['parent_id']==$value)
        $val=true;
}
}

if($val)
{
    return $next($request);
}
else
{
    abort(404);
}
return $next($request);
        
    }
}
