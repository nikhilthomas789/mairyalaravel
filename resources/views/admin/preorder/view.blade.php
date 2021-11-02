@extends('admin.dashboard')
@section('content')
<div class="col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">View Preorder details <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/preorder/list/')}}'>List all</a></div>
      <div class="card-body">
          <div class="row"> 
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Manufacturer:</label><br>
                  {{$data->make}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Model:</label><br>
                  {{$data->model}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Color:</label><br>
                  {{$data->color}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Year:</label><br>
                  {{$data->yearfrom}} From {{$data->yearto}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Odometer:</label><br>
                  {{$data->odometerfrom}} From {{$data->odometerto}}
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
                  <label>Phone:</label><br>

                    {{ $data->contact=="" ? 'NA' : $data->contact }}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Message:</label><br>
                  {{$data->comment}}
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