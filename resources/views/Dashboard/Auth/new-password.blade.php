<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from dompet.dexignlab.com/xhtml/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Dec 2022 06:43:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard" />
    <meta name="author" content="DexignZone" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template" />
    <meta property="og:title" content="Dompet : Payment Admin Template" />
    <meta property="og:description" content="Dompet : Payment Admin Template" />
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Dompet : Payment Admin Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index-2.html"><img src="{{asset('images/logo-full.png')}}" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">New Password</h4>

                                    <form action="{{url('new-password-submit')}}" method="POST">
                                        @csrf
                                        <input type="text" name="email" value="{{$email}}">
                                        <input type="text" name="token" value="{{$token}}">
                                        <div class="mb-3">
                                            <label><strong>New Passowrd</strong></label>
                                            <input type="password" name="password" class="form-control" value="hello@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label><strong>Confirm Passowrd</strong></label>
                                            <input type="password" name="cpassword" class="form-control" value="hello@example.com">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/dlabnav-init.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
</body>

<!-- Mirrored from dompet.dexignlab.com/xhtml/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Dec 2022 06:43:38 GMT -->

</html>