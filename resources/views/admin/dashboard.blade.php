
<!doctype html>
<html lang="en">
<!-- Head session starts-->  <!-- Contains CSS-->
   @include('admin.layout.head')
<!-- Head session ends-->

   <body>
    <input type="hidden" value="{{url('/')}}" id="baseurl">
 <!-- loader starts-->  	
      <!-- <div id="loading-wrapper">
         <div id="loader">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            <div class="line4"></div>
            <div class="line5"></div>
            <div class="line6"></div>
         </div> -->
<!--loader ends-->
      <div class="app-wrap">
<!-- Header session starts-->
      
<!-- Header session ends-->

      <div class="app-container" id="main">
<!-- Sidemenu session starts-->
      @include('admin.layout.sidebar')
<!-- Sidemenu session ends-->
         <div class="app-main main-content">
         @include('admin.layout.header')
            <header class="main-heading">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pageContTitle">
                        <div class="page-icon">

                     @if(Route::currentRouteName()=="Dashboard")
                       <i class="icon-laptop_windows"></i>
                     @elseif(Route::currentRouteName()=="Usergroup")
                       <i class="fa fa-users fa-fw"></i>
                     @elseif(Route::currentRouteName()=="User")
                        <i class="fa fa-user fa-fw"></i>
                      @elseif(Route::currentRouteName()=="Page")
                        <i class="fa fa-clone fa-fw"></i>
                      @elseif(Route::currentRouteName()=="Gallery")
                        <i class="fa fa-film fa-fw"></i>
                      @elseif(Route::currentRouteName()=="News")
                        <i class="fa fa-newspaper-o fa-fw"></i>
                      @elseif(Route::currentRouteName()=="Enquiry")
                        <i class="fa fa-weixin fa-fw"></i>
                        @else
                        <i class="fa fa-bank fa-fw"></i>
                            @endif
                        </div>
                        <div class="page-title">
                           <h5>{{Route::currentRouteName()}}</h5>
                           
                        </div>
                     </div>
                     
                  </div>
               </div>
            </header>
            <div class="main-wrapper">

               @yield('content')

               
            </div>
            @include('admin.layout.footer')
            
         </div>
<!-- footer session starts-->
      
<!-- footer session ends-->

      </div>
      
<!-- All scripts here-->
      @include('admin.layout.scripts')

   </body>
</html>