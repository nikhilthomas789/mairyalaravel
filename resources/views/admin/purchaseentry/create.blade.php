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
     <div class="card-header">Add Purchase entry <a class="btn btn-outline-primary pull-right" href='{{ url('/admin/purchaseentry/list/')}}'>List all</a></div>
     <div class="card-body">

        {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}

       
    <div class="row"> 


      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('party', 'Party Name') }}
            <select  class="form-control partyselect" name="party" {{ (isset($id)) ? 'disabled' : '' }}>
                  <option value="">Select Client</option>
                  @foreach ($creditors as $item)
                  <option value="{{$item->id}}" {{ old('model') == $item->id ? "selected" : "" }} {{$datas->party_id==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 

          @if ($errors->has('party'))
        <p style="color:#F55D7A">{{ $errors->first('party') }}</p>
        @endif
        </div>
      </div>
       

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('inv_date', 'Invoice Date') }}
           {!! Form::text('inv_date',$datas->inv_date,[ 'class'=>'form-control flatpickr','required']);!!}
          @if ($errors->has('inv_date'))
        <p style="color:#F55D7A">{{ $errors->first('inv_date') }}</p>
        @endif
        </div>
      </div>


       <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('inv_no', 'Invoice No') }}
           {!! Form::text('inv_no',$datas->domain,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('inv_no'))
        <p style="color:#F55D7A">{{ $errors->first('inv_no') }}</p>
        @endif
        </div>
      </div>


            <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('amount', 'Amount') }}
           {!! Form::text('amount',$datas->amount,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('amount'))
        <p style="color:#F55D7A">{{ $errors->first('amount') }}</p>
        @endif
        </div>
      </div>


         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('billtype', 'Bill type') }}
           <select  class="form-control" name="billtype">
                  <option value="">Select Bill type</option>
                  <option value="Net Amount" {{ $datas->billtype == 'Net Amount' ? 'selected' : '' }}>Net Amount</option>
                   <option value="Discount" {{ $datas->billtype == 'Discount' ? 'selected' : '' }}>Discount</option>
           </select> 

          @if ($errors->has('billtype'))
        <p style="color:#F55D7A">{{ $errors->first('billtype') }}</p>
        @endif
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('billdiscount', 'Bill Discount') }}
           {!! Form::text('billdiscount',$datas->billdiscount,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('billdiscount'))
        <p style="color:#F55D7A">{{ $errors->first('billdiscount') }}</p>
        @endif
        </div>
      </div>
      <input type="hidden" name="entry_id" value="1">

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
