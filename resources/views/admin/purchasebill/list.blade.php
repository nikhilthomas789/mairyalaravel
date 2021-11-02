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
         <div class="card-header">Ledger<a class="btn btn-outline-primary pull-right btn-sm" href='{{ url('/admin/purchaseentry/create/')}}'>Add new</a></div>

           <div class="card">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="row">
            <div class="col-md-6 col-sm-6">
        <div class="form-group">
           <br>
            <select  class="form-control partyselect" name="party" {{ (isset($id)) ? 'disabled' : '' }} id="partselect">
                  <option value="">Choose a Party</option>
                  @foreach ($creditors as $item)
                  <option value="{{$item->id}}" {{ old('model') == $item->id ? "selected" : "" }} >{{$item->name}}</option>
                    
                  @endforeach
                
               </select> 

        
        </div>


      </div>
     <div class="col-md-6 col-sm-6">

         <a href="{{route('excel')}}" class="btn btn-outline-success exporttoexcel">Export to Excel</a>
          
       </div>
    </div>
 </div>

          </div>
         <div class="card-body table-responsive">
            <table id="basicExample" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>Sl.no</th>
                     <th>Party</th>
                     <th>Head</th>
                     <th>Invoice Date</th>
                     <th>Invoice No</th>
                     <th>Amount</th>
                     <th>Purchase/Purchase Return</th>
                     <th>Check No</th>
                     <th>Check Date</th>
                     <th>Check Amount</th>
                     <th>Account Number</th>
                     <th>Payment type</th>
                     
                     
                     <th>Status</th>
                     <th>Payments</th>

                     <th>Created date</th>
                     <th>Created by</th>

                    
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
                     <td>{{$value->headname}}</td>
                     <td>{{ $value->inv_date ? date("d/m/Y", strtotime($value->inv_date)) : '' }}</td>
                     <td>{{$value->inv_no}}</td>
                     <td>{{$value->amount}}</td>
                     <td>{{ $value->entry_id=="1" ? 'Purchase' : 'Purchase Return' }}</td>
                     <td>{{$value->check_no}}</td>
                     <td>{{ $value->check_date ? date("d/m/Y", strtotime($value->check_date)) : '' }}</td>
                     <td>{{$value->check_amount}}</td>
                     <td>{{$value->acnum}}</td>
                     <td>{{$value->paymenttype}}</td>
                    
                

                      @if($value->status=="1")
                     <td>
                        <a href="{{url('/')}}/admin/purchasebill/status/{{$value->id}}" data-toggle="tooltip" title="Click here to deactivate"><i class="fa fa-check iconactive" aria-hidden="true"></i></a>
                     </td>
                     @else
                     <td>
                        <a href="{{url('/')}}/admin/purchasebill/status/{{$value->id}}" data-toggle="tooltip" title="Click here to activate"><i class="fa fa-check iconinactive" aria-hidden="true"></i></a>
                     </td>

                      @endif


                    

                     <td><a href="{{url('/')}}/admin/purchasebill/create/{{$value->id}}" data-toggle="tooltip" title="Click here to edit"><i class="fa fa-edit fa-2x"></a></td>

                       <td>{{date("d/m/Y H:m:s a", strtotime($value->created_at)) }}</td>
                     <td>{{$value->user}}</td>
                     
                        <input type="hidden" value="{{$value->id}}" class="delval">
                    
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