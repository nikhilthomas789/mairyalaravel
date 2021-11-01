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
   <!-- BEGIN .side-content -->
   <div class="side-content ">
      <!-- BEGIN .user-profile -->
      <div class="user-profile">
         <img src="{{ asset('/assets/uploads/users/'.Auth::user()->icon)}}" class="profile-thumb" alt="User Thumb">
         <h6 class="profile-name">{{Auth::user()->name}}</h6>
         <ul class="profile-actions">
            <li>
               <a href="#" target="_blank">
                  <i class="fa fa-facebook-square"></i>
                  <!-- 
               <span class="count-label red"></span> -->
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
      <!-- END .user-profile -->
      <!-- BEGIN .side-nav -->
      <nav class="side-nav" style="overflow-y: scroll;
      overflow-x: hidden;
      height: 415px;
      z-index: 9999999;">
         <!-- BEGIN: side-nav-content -->
         <ul class="adminMenu" id="adminMenu">
            <!-- <li class="active selected"> -->
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
         <!-- END: side-nav-content -->
      </nav>
      <!-- END: .side-nav -->
   </div>
   <!-- END: .side-content -->
</aside>