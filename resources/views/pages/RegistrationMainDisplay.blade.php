<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="description" content="Thanushka Jayasinghe">
    <meta name="keywords" content="Thanushka Jayasinghe, IOM">
    <meta name="author" content="Thanushka Jayasinghe">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/vnd.microsoft.icon"/>
    <title>IOM | Registration Main Display</title>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrapTh" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap_limitlessDefault.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/Select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .ww {
            padding-top: 1%;
            padding-bottom: 1%;
            border-bottom: 2px solid #bcb9b9;
        }

        .aaa {
            display: inline-block;
            vertical-align: middle;
        }
    </style>

</head>
<body style="background: linear-gradient(to right, #ededed, #d7e6a5, #b8cb74);">

<div class="content" style="position: absolute;top: -5px;right: 0;bottom: 0;width: 100%;">
    <div class="cardx">
        <div class="row justify-content-center">
            <div class="col-md-11" style="padding: 0px 0 0px;">

                <div class="row">
                    <div class="col-12 row" style="border-bottom: 2px solid #bcb9b9;">
                        <div class="col-md-6">
                            <h1 style="font-size: 3rem;"><span class="badge badge-primary"
                                                               style="padding: 14px; border-radius: 35px;">REGISTRATION CENTER</span>
                            </h1>
                        </div>
                        <div class="col-md-6 text-center">
                            <h1 style="font-size: 3rem;"><span class="badge badge-info"
                                                               style="padding: 14px; border-radius: 35px;">TOKEN NO</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center" id="Diplay">
                    <div class="col-12 row ww align-items-center">
                        <div class="col-md-6 eachDiv" attr-group="2">
                            <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span class="aaa">Registration Counter 1</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" id="Token_1"><h2>Not
                                Operating</h2></div>
                    </div>
                    <div class="col-12 row ww align-items-center">
                        <div class="col-md-6 eachDiv" attr-group="3">
                            <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span class="aaa">Registration Counter 2</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" id="Token_1"><h2>Not
                                Operating</h2></div>
                    </div>
                    <div class="col-12 row ww align-items-center">
                        <div class="col-md-6 eachDiv" attr-group="4">
                            <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span class="aaa">Registration Counter 3</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" id="Token_1"><h2>Not
                                Operating</h2></div>
                    </div>
                    <div class="col-12 row ww align-items-center">
                        <div class="col-md-6 eachDiv" attr-group="5">
                            <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span class="aaa">Registration Counter 4</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" id="Token_1"><h2>Not
                                Operating</h2></div>
                    </div>
                    <div class="col-12 row ww align-items-center">
                        <div class="col-md-6 eachDiv" attr-group="6">
                            <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span class="aaa">Registration Counter 5</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" id="Token_1"><h2>Not
                                Operating</h2></div>
                    </div>
                    <div class="col-12 row ww align-items-center">
                        <div class="col-md-6 eachDiv" attr-group="7">
                            <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span class="aaa">Registration Counter 6</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" id="Token_1"><h2>Not
                                Operating</h2></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS files --}}
<script src="{{asset('js/main/jquery.min.js')}}" type="text/javascript"></script>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script src="{{asset('jsPages/RegistrationMainDisplay.js')}}" type="text/javascript"></script>
<script>
    var path = '{{url('/plugins/ding-dong.mp3')}}'
    window.addEventListener("load",function() {
    setTimeout(function(){
        // This hides the address bar:
        window.scrollTo(0, 1);
    }, 0);
});
</script>

</body>
</html>
