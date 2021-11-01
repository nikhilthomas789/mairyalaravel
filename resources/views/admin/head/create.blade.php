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

<div class="col-md-6 col-sm-12 offset-md-3">
  <div class="card">
     <div class="card-header">Add Head <a class="btn btn-outline-primary pull-right" href='{{ url('/admin/head/list/')}}'>List all</a></div>
     <div class="card-body">

        {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}

       
        <div class="row"> 
        <div class="col-md-12 col-sm-12">
          <div class="form-group">
             {{ Form::label('name', 'Name') }}
             {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
            @if ($errors->has('name'))
          <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
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

@endsection