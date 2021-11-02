@extends('admin.dashboard')
@section('content')
<div class="col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">View Testdrive details <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/vehicle/testdrive/')}}/{{$data->v_id}}'>List all</a></div>
      <div class="card-body">
          <div class="row"> 
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Vehicle:</label><br>
                  {{$data->afmmanufacturer}} {{$data->afmmodel}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Name:</label><br>
                    {{$data->afmname}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Email:</label><br>
                    {{$data->afmemail}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Phone:</label><br>

                    {{ $data->afmcontact=="" ? 'NA' : $data->afmcontact }}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Requested Date:</label><br>
                    {{$data->afmdate}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Requested Time:</label><br>
                    {{$data->afmtime}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Message:</label><br>
                  {{$data->afmmessage}}
               </div>
           </div>

       </div>
       
        
   </div>
   </div>
</div>


@endsection