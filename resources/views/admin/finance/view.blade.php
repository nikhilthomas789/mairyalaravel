@extends('admin.dashboard')
@section('content')
<div class="col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">Finance details <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/finance/list/')}}'>List all</a></div>
      <div class="card-body">
          <div class="row"> 
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Name:</label><br>
                    {{$data->aname}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Contact:</label><br>
                    {{$data->acontact}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Email:</label><br>

                    {{ $data->aemail=="" ? 'NA' : $data->aemail }}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Date of Birth:</label><br>
                    {{$data->adob}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Marital status:</label><br>
                    {{$data->marital_status}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Drivers licence type:</label><br>
                    {{$data->drivers_licence_type}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Drivers Licence No:</label><br>
                  {{$data->drivers_licence_no}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>City:</label><br>
                  {{$data->acity}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Post code:</label><br>
                  {{$data->cpostcode}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Amount:</label><br>
                  {{$data->famount}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Cash deposit:</label><br>
                  {{$data->cashdeposit}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Trade in value:</label><br>
                  {{$data->tradeinvalue}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Preferred term:</label><br>
                  {{$data->preferredterm}}
               </div>
           </div>
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Vehicle description:</label><br>
                  {{$data->vehicledescription}}
               </div>
           </div>

       </div>
       
        
   </div>
   </div>
</div>


@endsection