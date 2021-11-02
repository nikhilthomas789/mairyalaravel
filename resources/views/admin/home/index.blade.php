@extends('admin.dashboard')
@section('content')


<div class="row gutters">
							
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col">
								<a href="#" class="block-140">
									<div class="icon">
										<i class="fa fa-users fa-fw"></i>
									</div>
									<h5>{{$data['usergroupcount']}}</h5>
									<p>Usergroup</p>
								</a>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col">
								<a href="#" class="block-140">
									<div class="icon">
										<i class="fa fa-user fa-fw"></i>
									</div>
									<h5>{{$data['usercount']}}</h5>
									<p>Users</p>
								</a>
							</div>

							
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col">
								<a href="#" class="block-140">
									<div class="icon">
										<i class="fa fa-weixin fa-fw"></i>
									</div>
									<h5>{{$data['headcount']}}</h5>
									<p>Head</p>
								</a>
							</div>
							
							
							

							
						</div>



						
               

@endsection