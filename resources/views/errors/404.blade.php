<!DOCTYPE html>
<html>
<head>
	<title>404</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
</head>
<body id="fournotfour">
	@section('content')
	 <div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
		  <div class="page-error-container animated slideInUpTiny animation-duration-3">
                    <div class="page-error-content">
                        <div class="error-code mb-4 animated zoomInDown">
                        	<img src="{{asset('asset/images/404.jpg')}}" alt="404">
                        </div>
                        <h2 class="text-center fw-regular title bounceIn animation-delay-10 animated">
                            Oops, an error has occurred. Page not found!
                        </h2>
                        <p class="text-center zoomIn animation-delay-20 animated">
                            <a class="btn btn-primary" href="{{url('/')}}">Go to Home</a>
                        </p>
                    </div>
                </div>

		
       </div>
    </div>
</body>
</html>