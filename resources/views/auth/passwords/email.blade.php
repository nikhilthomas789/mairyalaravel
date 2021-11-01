<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Unify Admin Panel" />
        <meta name="keywords" content="Login, Unify Login, Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
        <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="{{url('/')}}/img/favicon.ico" />
        <title>YB Fashion - Login</title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        
        <!-- Common CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/fonts/icomoon/icomoon.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}" />

    </head>  

    <body class="login-bg">
            
        <div class="container">
            <div class="login-screen">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                   

                      <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                       
                        <div class="login-container">
                            <div class="row no-gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="login-box">
                                        <a href="#" class="login-logo">
                                            <img src="{{ asset('/assets/img/logo.png')}}" alt="" />
                                        </a>
                                        
                                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                                <a href="{{url('/')}}/admin/login"class="btn btn-primary">
                                    Back to Login
                                </a>
                          
                        </div>

                        

                         @if (session('status'))
                        <div class="alert alert-success messagearea" id="msg1" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                                        
                                    
                                       {{--  <div class="or"></div>
                                        <div class="mt-4">
                                            <a href="signup.html" class="additional-link">Don't have an Account? <span>Create Now</span></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="main-footer no-bdr fixed-btm">
            <div class="container">
               SEO WORK MANAGEMENT APPLICATION
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
$('#msg1').delay(6000).slideUp('600'); 
</script>


    </body>
</html>

