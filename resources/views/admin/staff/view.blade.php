@extends('admin.dashboard')
@section('content')
<div class="col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">View staff details <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/staff/list/')}}'>List all</a></div>
      <div class="card-body">
          <div class="row"> 
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Name:</label><br>
                  {{$data[0]->name}}
               </div>
           </div>
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Mobile:</label><br>

                    {{ $data[0]->mobile=="" ? 'NA' : $data[0]->mobile }}
               </div>
           </div>

            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Place:</label><br>

                    {{ $data[0]->place=="" ? 'NA' : $data[0]->place }}
               </div>
           </div>

            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Required language:</label><br>

                    {{ $data[0]->required_language=="" ? 'NA' : $data[0]->required_language }}
               </div>
           </div>

            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Requirement:</label><br>

                    {{ $data[0]->reqname=="" ? 'NA' : $data[0]->reqname }}
               </div>
           </div>


           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Requirement:</label><br>

                    {{ $data[0]->requirement_type=="" ? 'NA' : $data[0]->requirement_type }}
               </div>
           </div>

           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Required date:</label><br>

                    {{ $data[0]->required_date=="" ? 'NA' : $data[0]->required_date }}
               </div>
           </div>


            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Family members:</label><br>

                    {{ $data[0]->family_members=="" ? 'NA' : $data[0]->family_members }}
               </div>
           </div> 

           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Summary of requirement:</label><br>

                    {{ $data[0]->summary_requirement=="" ? 'NA' : $data[0]->summary_requirement }}
               </div>
           </div>



           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Rate quoted:</label><br>
                    {{$data[0]->rate_quoted}}
               </div>
           </div>
          
           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Followup date:</label><br>
                  {{$data[0]->followup_date}}
               </div>
           </div>


           <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  <label>Date and Time :</label><br>
                  {{date('m/d/Y h:i:s a', strtotime($data[0]->created_at))}}
               </div>
           </div>




       </div>
       
        
   </div>
   </div>
</div>


@endsection