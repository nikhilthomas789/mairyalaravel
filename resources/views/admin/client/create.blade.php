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
 <div class="card">
   <div class="card-header">Add Client <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/client/list/')}}'>List all</a></div>
   <div class="card-body">

      {{ Form::open(['novalidate','enctype'=>'multipart/form-data']) }}
      <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="form-group">
               {{ Form::label('name', 'Client Name') }}


               {{ Form::text('name',$datas->name,[ 'class'=>'form-control','required','autocomplete="off"'])}}


               @if ($errors->has('name'))
            <p style="color:#F55D7A">{{ $errors->first('name') }}</p>
            @endif
            </div>
         </div>

  
            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('website', 'Website') }}
                  {!! Form::text('website',$datas->website,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
                 @if ($errors->has('website'))
               <p style="color:#F55D7A">{{ $errors->first('website') }}</p>
               @endif
               </div>
            </div>


              <div class="col-md-6 col-sm-6">
        <div class="form-group">
           {{ Form::label('package', 'Package') }}

               <select  class="form-control" name="package" {{ (isset($id)) ? 'disabled' : '' }} id="package">
                  <option value="">Select Package</option>
                  @foreach ($package as $item)
                  <option value="{{$item->id}}" {{ old('package') == $item->id ? "selected" : "" }} {{$datas->package_id==$item->id?'selected':''}}>{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 


           @if ($errors->has('package'))
        <p style="color:#F55D7A">{{ $errors->first('package') }}</p>
        @endif
        </div>
      </div>


              <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('keyword_count', 'No of Keywords') }}
                  {!! Form::text('keyword_count',$datas->keyword_count,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
                 @if ($errors->has('keyword_count'))
               <p style="color:#F55D7A">{{ $errors->first('keyword_count') }}</p>
               @endif
               </div>
            </div>



            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('usersname', 'Username') }}
                  {!! Form::text('usersname',$datas->usersname,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
                 @if ($errors->has('usersname'))
               <p style="color:#F55D7A">{{ $errors->first('usersname') }}</p>
               @endif
               </div>
            </div>

            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('pass', 'Password') }}
                  {!! Form::text('pass',$datas->pass,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
                 @if ($errors->has('pass'))
               <p style="color:#F55D7A">{{ $errors->first('pass') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('seoemail', 'SEO Email') }}
                  {!! Form::text('seoemail',$datas->seo_email,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
                 @if ($errors->has('seoemail'))
               <p style="color:#F55D7A">{{ $errors->first('seoemail') }}</p>
               @endif
               </div>
            </div>

            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('seopassword', 'SEO Email Password') }}
                  {!! Form::text('seopassword',$datas->seo_pass,[ 'class'=>'form-control','required','autocomplete="off"']);!!}
                 @if ($errors->has('seopassword'))
               <p style="color:#F55D7A">{{ $errors->first('seopassword') }}</p>
               @endif
               </div>
            </div>

            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('phone', 'Phone') }}
                  {!! Form::text('phone',$datas->phone,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('phone'))
               <p style="color:#F55D7A">{{ $errors->first('phone') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('email', 'Email') }}
                  {!! Form::text('email',$datas->email,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('email'))
               <p style="color:#F55D7A">{{ $errors->first('email') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-4 col-sm-12">
               <div class="form-group">
                  {{ Form::label('fblink', 'Facebook Link') }}
                  {!! Form::text('fblink',$datas->fblink,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('fblink'))
               <p style="color:#F55D7A">{{ $errors->first('fblink') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-4 col-sm-12">
               <div class="form-group">
                  {{ Form::label('instalink', 'Instagram Link') }}
                  {!! Form::text('instalink',$datas->instalink,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('instalink'))
               <p style="color:#F55D7A">{{ $errors->first('instalink') }}</p>
               @endif
               </div>
            </div>



            <div class="col-md-4 col-sm-12">
               <div class="form-group">
                  {{ Form::label('twitterlink', 'Twitter Link') }}
                  {!! Form::text('twitterlink',$datas->twitterlink,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('twitterlink'))
               <p style="color:#F55D7A">{{ $errors->first('twitterlink') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-4 col-sm-12">
               <div class="form-group">
                  {{ Form::label('linkedinlink', 'Linkedin Link') }}
                  {!! Form::text('linkedinlink',$datas->linkedinlink,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('linkedinlink'))
               <p style="color:#F55D7A">{{ $errors->first('linkedinlink') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-4 col-sm-12">
               <div class="form-group">
                  {{ Form::label('blogspotlink', 'Youtube Link') }}
                  {!! Form::text('blogspotlink',$datas->blogspotlink,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('blogspotlink'))
               <p style="color:#F55D7A">{{ $errors->first('blogspotlink') }}</p>
               @endif
               </div>
            </div>


            <div class="col-md-4 col-sm-12">
               <div class="form-group">
                  {{ Form::label('pinterestlink', 'Pinterest Link') }}
                  {!! Form::text('pinterestlink',$datas->pinterestlink,[ 'class'=>'form-control','autocomplete="off"']);!!}
                 @if ($errors->has('pinterestlink'))
               <p style="color:#F55D7A">{{ $errors->first('pinterestlink') }}</p>
               @endif
               </div>
            </div>




             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('address', 'Address') }}
               {{ Form::textarea('address',$datas->address, ['size' => '15x2','class'=>'form-control','maxlength'=>125]) }}

               @if ($errors->has('address'))
               <p style="color:#F55D7A">{{ $errors->first('address') }}</p>
               @endif
               
               </div>
            </div>


             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                  {{ Form::label('short_desc', 'Short Description') }}
               {{ Form::textarea('short_desc',$datas->short_desc, ['size' => '15x2','class'=>'form-control','maxlength'=>125]) }}

               @if ($errors->has('short_desc'))
               <p style="color:#F55D7A">{{ $errors->first('short_desc') }}</p>
               @endif
               
               </div>
            </div>



            <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('desc1', 'Description 1') }}
            {{ Form::textarea('desc1',$datas->desc1, ['class' => 'ckeditor','id' => 'ckeditor']) }}

            @if ($errors->has('desc1'))
            <p style="color:#F55D7A">{{ $errors->first('desc1') }}</p>
            @endif
            
            </div>
         </div>




         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('desc2', 'Description 2') }}
            {{ Form::textarea('desc2',$datas->desc2, ['class' => 'ckeditor','id' => 'ckeditor']) }}

            @if ($errors->has('desc2'))
            <p style="color:#F55D7A">{{ $errors->first('desc2') }}</p>
            @endif
            
            </div>
         </div>


         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('desc3', 'Description 3') }}
            {{ Form::textarea('desc3',$datas->desc3, ['class' => 'ckeditor','id' => 'ckeditor']) }}

            @if ($errors->has('desc3'))
            <p style="color:#F55D7A">{{ $errors->first('desc3') }}</p>
            @endif
            
            </div>
         </div>


         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('desc4', 'Description 3') }}
            {{ Form::textarea('desc4',$datas->desc4, ['class' => 'ckeditor','id' => 'ckeditor']) }}

            @if ($errors->has('desc4'))
            <p style="color:#F55D7A">{{ $errors->first('desc4') }}</p>
            @endif
            
            </div>
         </div>


         <div class="col-md-12 col-sm-12">
            <div class="form-group">
               {{ Form::label('desc5', 'Description 4') }}
            {{ Form::textarea('desc5',$datas->desc5, ['class' => 'ckeditor','id' => 'ckeditor']) }}

            @if ($errors->has('desc5'))
            <p style="color:#F55D7A">{{ $errors->first('desc5') }}</p>
            @endif
            
            </div>
         </div>







         <div class="col-md-12 col-sm-12">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
         </div>
      </div>
      {{ Form::close() }}
   </div>
</div>


  </div>

  @endsection


