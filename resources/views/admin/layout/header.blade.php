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
         <div class="block">
            <a href="#" class="logo">
            <img src="{{ asset('/assets/img/logo.png') }}" alt="" />
            </a>
         </div>
         <div class="block" style="float: right;flex: 1;">
            <ul class="header-actions">
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