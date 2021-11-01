@extends('admin.dashboard')
@section('content')
@php
      //dd($usergroup);
@endphp

@if (session()->has('success'))
<div class="alert alert-success" id="responsemessage">
   {{session()->get('success')}}
   {{ Session::forget('success') }}
</div>
<br />
@endif




<div class="col-md-6 col-sm-12 offset-md-3">
  <div class="card">
     <div class="card-header">Add company details</div>
     <div class="card-body">

        {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}

       
    <div class="row"> 
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
           {{ Form::label('company_name', 'Company name') }}
           {!! Form::text('company_name',$datas->company_name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('company_name'))
        <p style="color:#F55D7A">{{ $errors->first('company_name') }}</p>
        @endif
        </div>
      </div>


      <div class="col-md-12 col-sm-12">
         <div class="form-group">
              {{ Form::label('company_email', 'E-mail') }}
                  {!! Form::email('company_email',$datas->company_email,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('company_email'))
        <p style="color:#F55D7A">{{ $errors->first('company_email') }}</p>
        @endif
        </div>
      </div>



      <div class="col-md-12 col-sm-12">
        <div class="form-group">
           {{ Form::label('company_phone', 'Phone') }}
           {!! Form::text('company_phone',$datas->company_phone,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('company_phone'))
        <p style="color:#F55D7A">{{ $errors->first('company_phone') }}</p>
        @endif
        </div>
      </div>


        <div class="col-md-12 col-sm-12">
               <div class="form-group">
                  {{ Form::label('company_address', 'Short Description') }}
               {{ Form::textarea('company_address',$datas->company_address, ['size' => '15x2','class'=>'form-control','maxlength'=>125]) }}

               @if ($errors->has('company_address'))
               <p style="color:#F55D7A">{{ $errors->first('company_address') }}</p>
               @endif
               
               </div>
            </div>




        <div class="col-md-12 col-sm-12">
           <div class="form-group">
                 {{ Form::label('company_logo', 'Choose Logo') }}
               {{ Form::file('company_logo',['value'=>$datas->company_icon,'class'=>'form-control-file','required']) }}

                   {!! Form::hidden('company_logo',$datas->company_logo,[ 'class'=>'form-control','required']);!!}
                   
            @if ($errors->has('company_logo'))
          <p style="color:#F55D7A">{{ $errors->first('company_logo') }}</p>
          @endif
          </div>
        </div>


         <div class="col-md-4 col-sm-12">
         <div class="form-group">

<?php if(!empty($datas->company_logo)){?>
<img src="{{ url('/assets/uploads').'/'.$datas->company_logo }}" style="width: 75px" class="imageavailable">

<?php } ?>

 </div>
      </div>





        <div class="col-md-12 col-sm-12">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
        {{ Form::close() }}
     </div>
  </div>
</div>
</div>






  @endsection