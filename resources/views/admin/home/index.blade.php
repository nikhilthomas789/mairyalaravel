@extends('admin.dashboard')
@section('content')

<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="welcome-card">
			<div class="left">
				<h1>
					Welcome <span>{{Auth::user()->name}}</span>
					<p>
					A visual display of all of your data
					</p>
				</h1>
			</div>
			<div class="right">
				<div class="img-box">
					<img src="{{ asset('/assets/img/dash-welcome.svg') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="main-card">
			<ul>
				<li>
					<a href="#">
						<div class="left">
							<p class="name">
								Usergroup
							</p>
							<h1>{{$data['usergroupcount']}}</h1>
						</div>
						<div class="right">
							<div class="icon">
								<i class="fa fa-users fa-fw"></i>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="left">
							<p class="name">
								Users
							</p>
							<h1>{{$data['usercount']}}</h1>
						</div>
						<div class="right">
							<div class="icon">
								<i class="fa fa-user fa-fw"></i>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="left">
							<p class="name">
								Requirements
							</p>
							<h1>{{$data['reqcount']}}</h1>
						</div>
						<div class="right">
							<div class="icon">
								<i class="fa fa-weixin fa-fw"></i>
							</div>
						</div>
					</a>
				</li>

				
			</ul>
		</div>
	</div>

 
</div>




						
               

@endsection