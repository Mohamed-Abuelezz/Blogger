<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Auth </title>

    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="shortcut icon" href="{{ asset('Dashboard_Assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('Dashboard_Assets/images/favicon.png') }}" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="fw-light">Sign in to continue.</h6>

                            <form action="{{ route('AuthPost') }}" method="post">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="inputEmail" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <div id="validationServerEmailFeedback" class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="inputPassword" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <div id="validationPasswordFeedback" class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                                @if (\Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ \Session::get('error') }}
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('Dashboard_Assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/template.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/settings.js') }}"></script>

</body>

</html>
