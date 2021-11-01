@extends('admin.dashboard')
@section('content')
<div class="col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">View enquiry details <a class="btn btn-outline-primary pull-right" href='{{ url('/admin/enquiry/list/')}}'>List all</a></div>
      <div class="card-body">
          <div class="row"> 
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
                  <label>Phone:</label><br>

                    {{ $data->phone=="" ? 'NA' : $data->phone }}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Message:</label><br>
                  {{$data->message}}
               </div>
           </div>


           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Date and Time :</label><br>
                  {{date('m/d/Y h:i:s a', strtotime($data->created_at))}}
               </div>
           </div>




       </div>
       
        
   </div>
   </div>
</div>


@endsection