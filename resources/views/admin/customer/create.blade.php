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
     <div class="card-header">Add Customer <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/customer/list/')}}'>List all</a></div>
     <div class="card-body">

        {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}

       
    <div class="row"> 

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
           {{ Form::label('mobile', 'Mobile') }}
           {!! Form::text('namobileme',$datas->mobile,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('mobile'))
        <p style="color:#F55D7A">{{ $errors->first('mobile') }}</p>
        @endif
        </div>
      </div>  

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('place', 'Place') }}
           {!! Form::text('place',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('place'))
        <p style="color:#F55D7A">{{ $errors->first('place') }}</p>
        @endif
        </div>
      </div>  

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('required_language', 'Required language') }}
           <br>
           {!! Form::text('required_language',$datas->required_language,['data-role'=>'tagsinput', 'class'=>'form-control','required']);!!}
          @if ($errors->has('required_language'))
        <p style="color:#F55D7A">{{ $errors->first('required_language') }}</p>
        @endif
        </div>
      </div> 



         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('requirement', 'Requirement') }}
            <select  class="form-control" name="requirement" {{ (isset($id)) ? 'disabled' : '' }}>
                  <option value="">Select Requirement</option>
                  @foreach ($requirement as $item)
                  <option value="{{$item->id}}" {{ old('model') == $item->id ? "selected" : "" }} {{$datas->requirement_type_id==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 

          @if ($errors->has('requirement'))
        <p style="color:#F55D7A">{{ $errors->first('requirement') }}</p>
        @endif
        </div>
      </div>



      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('requirement_type', 'Requirement type') }}
           <select  class="form-control" name="requirement_type">
                  <option value="">Select Requirement type</option>
                  <option {{ old('requirement_type') == 'SD' ? "selected" : "" }} value="SD" {{ $datas->requirement_type == 'SD' ? 'selected' : '' }}>SD</option>
                   <option value="GT" {{ old('requirement_type') == 'GT' ? "selected" : "" }} {{ $datas->requirement_type == 'GT' ? 'selected' : '' }}>GT</option>
           </select> 

          @if ($errors->has('requirement_type'))
        <p style="color:#F55D7A">{{ $errors->first('requirement_type') }}</p>
        @endif
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('required_date', 'Required date') }}
           {!! Form::text('required_date',$datas->required_date,[ 'class'=>'form-control flatpickr','required']);!!}
          @if ($errors->has('required_date'))
        <p style="color:#F55D7A">{{ $errors->first('required_date') }}</p>
        @endif
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('rate_quoted', 'Rate quoted') }}
           {!! Form::text('rate_quoted',$datas->rate_quoted,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('rate_quoted'))
        <p style="color:#F55D7A">{{ $errors->first('rate_quoted') }}</p>
        @endif
        </div>
      </div>



      <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('family_members', 'Details of other family members') }}
            {{ Form::textarea('family_members',$datas->message, ['class' => 'form-control']) }}

            @if ($errors->has('family_members'))
            <p style="color:#F55D7A">{{ $errors->first('family_members') }}</p>
            @endif
            
            </div>
         </div>



  
         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('summary_requirement', 'Summary of requirement') }}
            {{ Form::textarea('summary_requirement',$datas->message, ['class' => 'form-control']) }}

            @if ($errors->has('summary_requirement'))
            <p style="color:#F55D7A">{{ $errors->first('summary_requirement') }}</p>
            @endif
            
            </div>
         </div>
             


          <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('followup_date', 'Followup date') }}
           {!! Form::text('followup_date',$datas->followup_date,[ 'class'=>'form-control flatpickr','required']);!!}
          @if ($errors->has('followup_date'))
        <p style="color:#F55D7A">{{ $errors->first('followup_date') }}</p>
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
  