@extends('admin.dashboard')
@section('content')

  <?php $id=request()->route('id');?>

@if (session()->has('success'))
<div class="alert alert-success messageareainnersuccess" id="responsemessage">
   {{session()->get('success')}}
   {{ Session::forget('success') }}
</div>
<br />
@endif

       <div class="container" id="crop-avatar">

<div class="card">
   <div class="card-header">Add User <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/user/list/')}}'>List all</a></div>
   <div class="card-body">
    
      {{ Form::open(['novalidate','enctype'=>'multipart/form-data','class'=>'grid']) }}
     <div class="row"> 
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
           {{ Form::label('usergroup_id', 'Usergroup') }}

               <select  class="form-control" name="usergroup_id" {{ (isset($id)) ? 'disabled' : '' }}>
                  <option value="">Select Usergroup</option>
                  @foreach ($usergroup as $item)
                  <option value="{{$item->id}}" {{ old('usergroup_id') == $item->id ? "selected" : "" }} {{$datas->usergroup_id==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 


           @if ($errors->has('usergroup_id'))
        <p style="color:#F55D7A">{{ $errors->first('usergroup_id') }}</p>
        @endif
        </div>
      </div>
     
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
           {{ Form::label('name', 'Name') }}
           {!! Form::text('name',$datas->name,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
          @if ($errors->has('name'))
        <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
        @endif
        </div>
      </div>


      <div class="col-md-6 col-sm-12">
         <div class="form-group">
              {{ Form::label('email', 'E-mail') }}
                  {!! Form::email('email',$datas->email,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
          @if ($errors->has('email'))
        <p style="color:#F55D7A">{{ $errors->first('email') }}</p>
        @endif
        </div>
      </div>


      <div class="col-md-6 col-sm-12">
         <div class="form-group">
           {{ Form::label('username', 'Username') }}
           {!! Form::text('username',$datas->username,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
          @if ($errors->has('username'))
        <p style="color:#F55D7A">{{ $errors->first('username') }}</p>
        @endif
        </div>
      </div>


      <div class="col-md-6 col-sm-12">
        <div class="form-group">
              {{ Form::label('password', 'password') }}
                  {!! Form::password('password',[ 'class'=>'form-control','required','autocomplete="off"']);!!}
          @if ($errors->has('password'))
        <p style="color:#F55D7A">{{ $errors->first('password') }}</p>
        @endif
        </div>
      </div>


      <div class="col-md-2 col-sm-12">
         <div class="form-group">
               {{ Form::label('icon', 'Choose an image') }}
             {{ Form::hidden('icon',$datas->icon,['class'=>'form-control-file','required']) }}
        

          <!-- Current avatar -->
    <div class="avatar-view" title="Change the avatar">
     <!--  <img src="img/picture.jpg" alt="Avatar"> -->
      <a href="#" class="btn browseBtn"><i class="fa fa-picture-o btnIcon" aria-hidden="true"></i> Choose file</a>
    </div>

    @if ($errors->has('icon'))
        <p style="color:#F55D7A">{{ $errors->first('icon') }}</p>
        @endif


        </div>
      </div>



 <div class="col-md-4 col-sm-12">
         <div class="form-group">

<?php if(!empty($datas->icon)){?>
<img src="{{ url('/assets/uploads/users').'/'.$datas->icon }}" style="width: 75px" class="imageavailable" id="imageavailable">

<?php } ?>


<img src="{{ url('/assets/uploads/users').'/'.$datas->icon }}" style="width: 65px;display: none;" class="imageavailable">

 </div>
      </div>




  


     

      <div class="col-md-12 col-sm-12" style="float: right;">
         <button type="submit" class="btn btn-primary pull-right">Submit</button>
      </div>
    





      
     
      </div>
      {{ Form::close() }}
   </div>
</div>




    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="{{url('/admin/user/upload')}}" enctype="multipart/form-data" method="post">
            <div class="modal-header">
             
              <h5 class="modal-title" id="avatar-modal-label">Profile picture</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="avatar-wrapper"></div>
                  </div>
                  
                </div>

                <div class="row avatar-btns">
                  
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary avatar-save pull-right">Done</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>


@endsection


@section('cropjs')
<script src="{{ asset('/assets/js/cropper/cropperuser.js') }}"></script>
@endsection
