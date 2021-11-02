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
								Head
							</p>
							<h1>{{$data['headcount']}}</h1>
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

    <!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col">
        <a href="#" class="block-140">
            <div class="icon">
                <i class="fa fa-users fa-fw"></i>
            </div>
            <h1>{{$data['usergroupcount']}}</h1>
            <p>Usergroup</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col">
        <a href="#" class="block-140">
            <div class="icon">
                <i class="fa fa-user fa-fw"></i>
            </div>
            <h1>{{$data['usercount']}}</h1>
            <p>Users</p>
        </a>
    </div>

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col">
        <a href="#" class="block-140">
            <div class="icon">
                <i class="fa fa-weixin fa-fw"></i>
            </div>
            <h1>{{$data['headcount']}}</h1>
            <p>Head</p>
        </a>
    </div> -->
</div>




						
               

@endsection