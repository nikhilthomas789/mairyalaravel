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
     <div class="card-header">Add Party <a class="btn btn-outline-primary pull-right" href='{{ url('/admin/creditors/list/')}}'>List all</a></div>
     <div class="card-body">

        {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}

       
    <div class="row"> 


      {{-- <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('slno', 'Sl No') }}
           {!! Form::text('name',(($datas->id=='')?$datas->id:''),[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>
 --}}

      {{--  <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('name', 'Sl No') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>
 --}}



      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('name', 'Date') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>


      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('name', 'Name') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('name', 'Mobile') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>  

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('name', 'Place') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>  

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('name', 'Required Language') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div> 



         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('head', 'Requirement') }}
            <select  class="form-control" name="head" {{ (isset($id)) ? 'disabled' : '' }}>
                  <option value="">Select Requirement</option>
                  @foreach ($head as $item)
                  <option value="{{$item->id}}" {{ old('model') == $item->id ? "selected" : "" }} {{$datas->head_id==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 

          @if ($errors->has('head'))
        <p style="color:#F55D7A">{{ $errors->first('head') }}</p>
        @endif
        </div>
      </div>





       <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('phone', 'Phone') }}
           {!! Form::text('phone',$datas->phone,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('phone'))
        <p style="color:#F55D7A">{{ $errors->first('phone') }}</p>
        @endif
        </div>
      </div>


            <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('discount', 'Discount') }}
           {!! Form::text('discount',$datas->discount,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('discount'))
        <p style="color:#F55D7A">{{ $errors->first('discount') }}</p>
        @endif
        </div>
      </div>





         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('address', 'Address') }}
            {{ Form::textarea('address',$datas->message, ['class' => 'form-control']) }}

            @if ($errors->has('address'))
            <p style="color:#F55D7A">{{ $errors->first('address') }}</p>
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
  @section('cropjs')
<script src="{{ asset('/assets/js/cropper/croppervehicle.js') }}"></script>
@endsection
  