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
         <div class="card-header">Enquiry List</div>
         <div class="card-body">
            <table id="basicExample" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>Sl.no</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>View</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                  @if($data)
                  @php $i=1;@endphp
                  @foreach($data as $value)

                  <tr class="text-center">
                     <td >{{$i}}</td>
                     <td>{{$value['name']}}</td>
                     <td>{{$value['email']}}</td>
                     <td>{{$value['phone']}}</td>
                      <td><a href="view/{{$value['id']}}" data-toggle="tooltip" title="Click here to View"><i class="fa fa-eye fa-2x"></a></td>
                      

               
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