@extends('admin.dashboard')
@section('content')
<div class="col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">View Email to Friend details <a class="btn btn-outline-primary pull-right" href='{{ url('/admin/vehicle/emailfriend/')}}/{{$data->v_id}}'>List all</a></div>
      <div class="card-body">
          <div class="row"> 
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Vehicle:</label><br>
                  {{$data->manufacturers}} {{$data->models}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Name:</label><br>
                    {{$data->name}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Email:</label><br>
                    {{$data->email}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Friend's Email:</label><br>

                    {{ $data->friend_email }}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Message:</label><br>
                  {{$data->message}}
               </div>
           </div>

       </div>
       
        
   </div>
   </div>
</div>


@endsection