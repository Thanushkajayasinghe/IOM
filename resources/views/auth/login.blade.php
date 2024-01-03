<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Thanushka Jayasinghe"/>
    <meta name="keywords" content="Thanushka Jayasinghe, IOM"/>
    <meta name="author" content="Thanushka Jayasinghe"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/vnd.microsoft.icon"/>

    <title>IOM | Login</title>

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/sweetalert/sweetalert.min.css') }}" rel="stylesheet">

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background: url('{{asset('images/banner1.jpg')}}');">
        <div class="wrap-login100">
            {{--<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">--}}
            {{--{{ csrf_field() }}--}}

            <div class="row p-b-10">
                <div class="col"><img src="{{asset('images/IOM-Logo.jpg')}}"
                                      style="width: auto;height: 100px;margin-left: auto;margin-right: auto;display: block;">
                </div>
            </div>

            <span class="login100-form-title p-b-65">IOM Login</span>

            <div class="wrap-input100">
                <input class="input100" id="usernameid" type="text" name="email">
                <span class="focus-input100" data-placeholder="Username"></span>
            </div>

            <div class="wrap-input100 validate-input">
                <input class="input100" id="passwordid" type="password" name="password">
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button type="submit" id="btnlogin" value=" {{ __('Login') }}" class="login100-form-btn">
                        Login
                    </button>
                </div>
            </div>

            <div class="text-center p-t-115">
						<span class="txt1">
						 <p>Copyright &COPY; - {{ date("Y") }} IOM | Design by <a href="http://www.sciencelandit.com/"
                                                                                  target="_blank"
                                                                                  style="color: #db4343;">SLIT</a>
						</span>
            </div>
            {{--</form>--}}
        </div>
    </div>
</div>

<!-- Scripts -->

<script src="{{ asset('js/main/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('jsPages/Login.js') }}" type="text/javascript"></script>


    <script>
        var path = "{{url('/home')}}"
        var CoTabPath = "{{url('/CounsellingTab')}}"
    </script>


</body>
</html>
