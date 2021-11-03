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
         <div class="card-header">Purchase entry List <a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/purchasereturn/create/')}}'>Add new</a></div>
         <div class="card-body table-responsive">
            <table id="basicExample" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th style="width:50px">Sl.no</th>
                     <th>Party</th>
                     <th>Invoice Date</th>
                     <th>Invoice No</th>
                     <th>Amount</th>
                     <th>Created date</th>
                     <th>Created by</th>
                   
                     <th style="width:50px">Edit</th>
                     <th style="width:50px">Delete</th>
                  </tr>
               </thead>
               <tbody>
                  @if($data)
                  @php $i=1;
                  @endphp
                  @foreach($data as $value)
                  <tr class="text-center">
                     <td >{{$i}}</td>
                     <td>{{$value->partynamename}}</td>
                     <td>{{$value->inv_date}}</td>
                     <td>{{$value->inv_no}}</td>
                     <td>{{$value->amount}}</td>
                     <td>{{date("d/m/Y H:m:s a", strtotime($value->created_at)) }}</td>
                     <td>{{$value->user}}</td>
                

                     


                    

                     <td><a href="create/{{$value->id}}" data-toggle="tooltip" title="Click here to edit"><i class="fa fa-edit fa-2x"></a></td>
                        <input type="hidden" value="{{$value->id}}" class="delval">
                     <td><a href="delete/{{$value->id}}" data-toggle="tooltip" title="Click here to Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash fa-2x"></a></td>
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