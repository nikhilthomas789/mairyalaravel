@extends('admin.dashboard')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success messageareainnersuccess" id="responsemessage">
   {{session()->get('success')}}
   {{ Session::forget('success') }}
</div>
<br />
@endif

@if (session()->has('danger'))
<div class="alert alert-danger messageareainnerdanger" id="responsemessage">
   {{session()->get('danger')}}
   {{ Session::forget('danger') }}
</div>
<br />
@endif


<div class="row gutters">
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div class="card">
         <div class="card-header">User List<a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/user/create/')}}'>Add new</a></div>
         <div class="card-body table-responsive">
            <table id="basicExample" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>Sl.no</th>
                     <th>Usergroup</th>
                     <th>Name</th>
                     <th>Status</th>
                     <th>Online status</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                  @if($data)
                  @php $i=1;@endphp
                  @foreach($data as $value)
      
                  <tr class="text-center">
                     <td >{{$i}}</td>
                      <td>{{$value->usergroup->name}}</td>
                     <td>{{$value['name']}}</td>
                      @if($value['status']=="1")
                     <td>
                        <a href="status/{{$value['id']}}" data-toggle="tooltip" title="Click here to deactivate"><i class="fa fa-check iconactive" aria-hidden="true"></i></a>
                     </td>
                     @else
                     <td>
                        <a href="status/{{$value['id']}}" data-toggle="tooltip" title="Click here to activate"><i class="fa fa-check iconinactive" aria-hidden="true"></i></a>
                     </td>

                      @endif


                      <td>
                         @if($value->isOnline())
                             <i class="fa fa-check iconstatusonline" aria-hidden="true"></i>
                            @else
                           <i class="fa fa-check iconstatusoffline" aria-hidden="true"></i>
                           @endif
                      </td>

                     <td><a href="create/{{$value['id']}}" data-toggle="tooltip" title="Click here to edit"><i class="fa fa-edit fa-2x"></a></td>
                        <input type="hidden" value="{{$value['id']}}" class="delval">
                     <td><a href="delete/{{$value['id']}}" data-toggle="tooltip" title="Click here to Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash fa-2x"></a></td>
                  </tr>
                  @php $i++;@endphp
                  @endforeach
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection