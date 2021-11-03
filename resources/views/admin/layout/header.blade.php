<header class="app-header header">
   <div class="container-fluid">
      <div class="row gutters">
         <div class="block">
            <a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
            <i class="icon-menu5"></i>
            </a>
            <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
            <i class="icon-chevron-thin-left"></i>
            </a>
         </div>
         <!-- <div class="block">
            <a href="#" class="logo">
            <img src="{{ asset('/assets/img/logo.png') }}" alt="" />
            </a>
         </div> -->
         <div class="block " style="float: right;flex: 1;">

            <ul class="user-navbar">
               <li>
                  <svg xmlns="http://www.w3.org/2000/svg" onclick="openFullscreen();" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" onclick="closeFullscreen();" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
               </li>
            </ul>

            <ul class="header-actions d-lg-none d-sm-block">
               <li class="dropdown">
                  <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                  <img class="avatar" src="{{ asset('/assets/uploads/users/'.Auth::user()->icon)}}" alt="User Thumb" />
                  <span class="user-name">{{Auth::user()->name}}</span>
                  <i class="icon-chevron-small-down"></i>
                  </a>
                  <div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
                     <ul class="user-settings-list">
                        <li>
                           <a href="{{ url('admin/user/create')}}/{{Auth::user()->id}}">
                              <div class="icon">
                                 <i class="fa fa-user fa-fw"></i>
                              </div>
                              <p>Profile</p>
                           </a>
                        </li>
                        <li>
                           <a href="{{ url('admin/company/create')}}/1">
                              <div class="icon red">
                                 <i class="icon-cog3"></i>
                              </div>
                              <p>Company profile</p>
                           </a>
                        </li>
                        <!-- <li>
                           <a href="filters.html">
                              <div class="icon yellow">
                                 <i class="icon-schedule"></i>
                              </div>
                              <p>Activity</p>
                           </a>
                        </li> -->
                     </ul>
                     <div class="logout-btn">
                        <a href="{{ url('admin/logout') }}" class="btn btn-primary">Logout</a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</header>

