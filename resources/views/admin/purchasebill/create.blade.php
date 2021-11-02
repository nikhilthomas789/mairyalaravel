@extends('admin.dashboard')
@section('content')
@php
      //dd($usergroup);
@endphp

@if (session()->has('success'))
<div class="alert alert-success messageareainnersuccess" id="responsemessage">
   {{session()->get('success')}}
   {{ Session::forget('success') }}
</div>
<br />
@endif

 <div class="container" >


<div class="col-md-12 col-sm-12">
  <div class="card">
     <div class="card-header">Add Purchase Bill <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/purchasebill/list/')}}'>List all</a></div>
     <div class="card-body">

        {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}

       
    <div class="row"> 


       <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('check_no', 'Check No') }}
           {!! Form::text('check_no',$datas->check_no,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('check_no'))
        <p style="color:#F55D7A">{{ $errors->first('check_no') }}</p>
        @endif
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('check_date', 'Check Date') }}
           {!! Form::text('check_date',$datas->check_date,[ 'class'=>'form-control flatpickr','required']);!!}
          @if ($errors->has('check_date'))
        <p style="color:#F55D7A">{{ $errors->first('check_date') }}</p>
        @endif
        </div>
      </div>


       


            <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('check_amount', 'Check Amount') }}
           {!! Form::text('check_amount',$datas->check_amount,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('check_amount'))
        <p style="color:#F55D7A">{{ $errors->first('check_amount') }}</p>
        @endif
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('acnum', 'Account No') }}
           {!! Form::text('acnum',$datas->acnum,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('acnum'))
        <p style="color:#F55D7A">{{ $errors->first('acnum') }}</p>
        @endif
        </div>
      </div>



      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('paymenttype', 'Payment type') }}
           <select  class="form-control" name="paymenttype">
                  <option value="">Select Payment type</option>
                  <option value="Bill to Bill" {{ $datas->paymenttype == 'Bill to Bill' ? 'selected' : '' }}>Bill to Bill</option>
                   <option value="Advance" {{ $datas->paymenttype == 'Advance' ? 'selected' : '' }}>Advance</option>
           </select> 

          @if ($errors->has('paymenttype'))
        <p style="color:#F55D7A">{{ $errors->first('paymenttype') }}</p>
        @endif
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



  </div>

  @endsection
  