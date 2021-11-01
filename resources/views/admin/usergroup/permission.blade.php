@extends('admin.dashboard')
@section('content')




<style type="text/css">
.dataTables_filter,.dataTables_info,.dataTables_length,.pagination{display:none}
</style>

<div class="row gutters">
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div class="card">
         <div class="card-header">User Permission</div>
         <div class="card-body table-responsive">

           {{ Form::open(['novalidate']) }}


            <table id="basicExample" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th style="width: 10px">Sl.no</th>
                     <th>Module</th>
                     <th style="width: 10px">Enable/Disable</th>
                  </tr>
               </thead>
               <tbody>
                  @if($data)
                  @php $i=1;@endphp
                  @foreach($data as $value)
                  
                  <tr class="text-center">
                     <td >{{$i}}</td>
                     <td>{{$value['name']}}</td>
                     <td>
                    
                       <input type="checkbox" name="menu_id[]" value="{{$value['id']}}"   @foreach ($val as $vals)   @if($vals==$value['id'])checked @endif  @endforeach >
                     </td>
                    



                  </tr>
                  @php $i++;@endphp
                  @endforeach
                  @endif
               </tbody>
            </table>
              <input type="submit"  class="btn btn-primary">
             {{ Form::close() }}
            
         </div>
      </div>
   </div>
</div>
@endsection

