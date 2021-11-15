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
     <div class="card-header">Add staff <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/staff/list/')}}'>List all</a></div>
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
           {{ Form::label('age', 'Age') }}
           {!! Form::text('age',$datas->age,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('age'))
        <p style="color:#F55D7A">{{ $errors->first('age') }}</p>
        @endif
        </div>
      </div>  


         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('mobile', 'Mobile') }}
           {!! Form::text('mobile',$datas->mobile,[ 'class'=>'form-control','required']);!!}
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
           {{ Form::label('district', 'District') }}
           {!! Form::text('district',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('district'))
        <p style="color:#F55D7A">{{ $errors->first('district') }}</p>
        @endif
        </div>
      </div>  



           <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('state', 'State') }}
           {!! Form::text('state',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('state'))
        <p style="color:#F55D7A">{{ $errors->first('state') }}</p>
        @endif
        </div>
      </div>  

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('pincode', 'Pincode') }}
           {!! Form::text('pincode',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('pincode'))
        <p style="color:#F55D7A">{{ $errors->first('pincode') }}</p>
        @endif
        </div>
      </div>  


      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('required_language', 'Language Known') }}

    <select name="required_language[]" class="form-control select-tag" multiple id="framework">
      @foreach($language as $tag)
        <option value="{{$tag->name}}" {{in_array($tag->name, old("required_language") ?: []) ? "selected": ""}} @if($lang!=null)@foreach ($lang as $vals)   @if($vals==$tag->name)selected @endif  @endforeach @endif>{{$tag->name}}</option>
      @endforeach
    </select>


          @if ($errors->has('required_language'))
        <p style="color:#F55D7A">{{ $errors->first('required_language') }}</p>
        @endif
        </div>
      </div>



         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('requirement', 'Able to do') }}
            <select  class="form-control select-tag" name="requirement" {{ (isset($id)) ? 'disabled' : '' }} multiple id="framework">
                  <option value="">Select Requirement</option>
                  @foreach ($requirement as $item)
                  <option value="{{$item->id}}" {{ old('model') == $item->id ? "selected" : "" }} {{$datas->able_to_do==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 

          @if ($errors->has('requirement'))
        <p style="color:#F55D7A">{{ $errors->first('requirement') }}</p>
        @endif
        </div>
      </div>




         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('requirement', 'Experience In') }}
            <select  class="form-control select-tag" name="requirement" {{ (isset($id)) ? 'disabled' : '' }} multiple id="framework">
                  <option value="">Select Requirement</option>
                  @foreach ($requirement as $item)
                  <option value="{{$item->id}}" {{ old('model') == $item->id ? "selected" : "" }} {{$datas->experencein==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 

          @if ($errors->has('requirement'))
        <p style="color:#F55D7A">{{ $errors->first('requirement') }}</p>
        @endif
        </div>
      </div>


         <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('expyear', 'Experience in year') }}
           {!! Form::text('expyear',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('expyear'))
        <p style="color:#F55D7A">{{ $errors->first('expyear') }}</p>
        @endif
        </div>
      </div>  



      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('presentsal', 'Present salary') }}
           {!! Form::text('presentsal',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('presentsal'))
        <p style="color:#F55D7A">{{ $errors->first('presentsal') }}</p>
        @endif
        </div>
      </div>  

      <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('expectedsal', 'Expected salary') }}
           {!! Form::text('expectedsal',$datas->place,[ 'class'=>'form-control','required']);!!}
          @if ($errors->has('expectedsal'))
        <p style="color:#F55D7A">{{ $errors->first('expectedsal') }}</p>
        @endif
        </div>
      </div> 


          <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('dateofjoining', 'Date of Joining') }}
           {!! Form::text('dateofjoining',$datas->dateofjoining,[ 'class'=>'form-control flatpickr','required']);!!}
          @if ($errors->has('dateofjoining'))
        <p style="color:#F55D7A">{{ $errors->first('dateofjoining') }}</p>
        @endif
        </div>
      </div>
 


  
         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('recommendation', 'Recommendation') }}
            {{ Form::textarea('recommendation',$datas->recommendation, ['class' => 'form-control']) }}

            @if ($errors->has('recommendation'))
            <p style="color:#F55D7A">{{ $errors->first('recommendation') }}</p>
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
  