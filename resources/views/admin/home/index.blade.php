@extends('admin.dashboard')
@section('content')

<div class="row">
	<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8">
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
	<div class="col-xl-3 col-lg-3 col-md-8 col-sm-8">
		<div class="card" style="border-top:0px solid">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="clock-wrapper">
							<div class="clock-base">
								<div class="clock-dial">
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
								<div class="clock-indicator"></div>
							</div>
								<div class="clock-hour"></div>
								<div class="clock-minute"></div>
								<div class="clock-second"></div>
								<div class="clock-center"></div>
							</div>
						</div>
					</div>
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

			


				<!-- Repeat -->
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
			
			</ul>
		</div>
	</div>
</div>

 
</div>

<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
			<div class="card" style="border-top:0px solid">
				<div class="card-header">
					Sales this Month
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12">
							<div id="chartContainer1" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
			<div class="card" style="border-top:0px solid">
				<div class="card-header">
					Contacts Statuses
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12">
							<div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




						
               

@endsection