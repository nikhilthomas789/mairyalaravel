
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
        <title>YB Fashion- Login</title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        
        <!-- Common CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/fonts/icomoon/icomoon.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}" />

    </head>  

    <body>

    <div class="login-wrap">
        <div class="login-contanier">
            <div class="img-box">
                <img src="{{ asset('/assets/img/logo.png')}}" alt="#" />
            </div>
            <div class="body">
                <form method="POST" action="{{ url('/') }}/" novalidate>
                         @csrf
                        <div >
                            <div class="row no-gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div>
                                        <div class="input-group">
                                             <input id="username" type="text" class="spl-input{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                             <label class="f-label spl-label">Username</label>
                                              @if ($errors->has('username'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input id="password" type="password" class="spl-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            <label class="f-label spl-label">Password</label>
                                             @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="actions clearfix mb-4">
                                              <a href="{{ route('password.request') }}" class="pull-left" style="padding-left:0">Forgot password?</a>
                                        </div>
                                        <div class="input-group">
                                            <!-- <button type="submit" class="btn btn-outline-success btn-block">{{ __('Login') }}</button> -->
                                            <button  class="material-button btn-block b-success">{{ __('Login') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
            
        <!-- <div class="container">
            <div class="login-screen">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <form method="POST" action="{{ url('/') }}/">
                         @csrf
                        <div class="login-container">
                            <div class="row no-gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="login-box">
                                        <a href="#" class="login-logo">
                                            <img src="{{ asset('/assets/img/logo.png')}}" alt="" />
                                        </a>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
                                             <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                                              @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="password"><i class="icon-lock3"></i></span>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                             @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="actions clearfix">
                                              <a href="{{ route('password.request') }}" class="pull-left" style="padding-left:0">Forgot password?</a>
                                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="{{ asset('/assets/js/custom.js') }}"></script>
    </body>
</html>