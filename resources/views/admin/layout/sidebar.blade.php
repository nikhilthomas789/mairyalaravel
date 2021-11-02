<?php 
use App\Model\Menu;
use App\Model\Userrights;
$menus=Menu::where([
      ['parent_id','=',0],
      ['status','=',1]
    ])
    ->orderBy('priority')->get();
$sub = Menu::where('status','=',1)->orderBy('priority')->get();
$usergroup_id = Auth::user()->usergroup_id;
$menusrights = Userrights::where('user_id','=',$usergroup_id)->get();
if(count($menusrights)>0){
   foreach ($menusrights as  $value) {
      $menu_array = json_decode($value['menu_id']);
   }
} else {
  $menu_array="";
}
?>



<aside class="app-side" id="app-side">
   <div class="navigation">
      <div class="navigation-menu-tab">
         <button class="user-img">
            <img src="{{ asset('/assets/uploads/users/'.Auth::user()->icon)}}" alt="">
            <ul class="user-dropdown">
               <li>
                  <div class="profile-dtl">
                     <img src="{{ asset('/assets/uploads/users/'.Auth::user()->icon)}}" alt="">
                     <h4>
                        {{Auth::user()->name}}
                     </h4>
                  </div>
               </li>
               <li><a href="#">Profile Information</a></li>
               <li><a href="#">Change Password</a></li>
               <li>
                  <a href="{{ url('/admin/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
               </li>
            </ul>
         </button>

         <ul class="social">
            <li>
               <a href="">
                  <i class="fa fa-facebook-f"></i>
               </a>
            </li>
            <li>
               <a href="">
                  <i class="fa fa-instagram"></i>
               </a>
            </li>
         </ul>
      </div>

      <div class="navigation-menu-body " tabindex="3" style="overflow: hidden; outline: none;">
         <div class="logo-warp">
            <a href="#" class="logo">
               <img src="{{ asset('/assets/img/logo.png') }}" alt="" class="main-logo" />
               <img src="{{ asset('/assets/img/short-logo.jpg') }}" alt="" class="short-logo" />
            </a>
         </div>
         <div class="side-nav">
            <ul class="adminMenu" id="adminMenu">
               <li>
                  <a href="{{ url('/admin/home') }}" aria-expanded="false">
                     <span class="has-icon">
                        <i class="icon-laptop_windows"></i>
                     </span>
                     <span class="nav-title">Dashboard</span>
                  </a>
               </li>

               @foreach ($menus as $key => $value)
               @if($menu_array)
               @foreach ($menu_array as $key => $vals)
               @if($vals==$value['id'])
               <li>
                  <a href="#" class="has-arrow" aria-expanded="false">
                     <span class="has-icon">
                        <i class="{{$value['class']}} fa-fw"></i>
                     </span>
                     <span class="nav-title">{{$value['name']}}</span>
                  </a>
                  <ul aria-expanded="false">
                     @foreach ($sub as $key => $val)
                     @if($val['parent_id']==$value['id'] && $val['visibility']==1)
                     <li>
                        <a href='{{url($val['url'])}}'>{{$val['name']}}</a>
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </li>
               @endif
               @endforeach
               @endif
               @endforeach
            </ul>
         </div>   
      </div>
   </div>
   
   <!-- <div class="side-content ">
      <div class="user-profile">
         <img src="{{ asset('/assets/uploads/users/'.Auth::user()->icon)}}" class="profile-thumb" alt="User Thumb">
         <h6 class="profile-name">{{Auth::user()->name}}</h6>
         <ul class="profile-actions">
            <li>
               <a href="#" target="_blank">
                  <i class="fa fa-facebook-square"></i>
               </a>
            </li>
            <li>
               <a href="#" target="_blank">
                  <i class="fa fa-instagram"></i>
               </a>
            </li>
            <li>
               <a href="{{ url('/') }}" target="_blank">
                  <i class="icon-export"></i>
               </a>
            </li>
         </ul>
      </div>
   </div> -->
</aside>