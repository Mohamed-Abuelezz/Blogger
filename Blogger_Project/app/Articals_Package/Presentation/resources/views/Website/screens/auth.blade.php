<!doctype html>
<html lang="en">

<head>
    @include('Website.components.head' ,['screen' => 1])

</head>

<body>

    <div class="container">

        @if (\Session::has('success'))
            <div class="alert alert-success">

                <div class="alert alert-success" role="alert">
                    {!! \Session::get('success') !!} </div>

            </div>
        @endif

        @if (\Session::has('error'))
            <div class="alert alert-danger">

                <div class="alert alert-danger" role="alert">
                    {!! \Session::get('error') !!} </div>

            </div>
        @endif


        <section class="content" id="form" style="min-height:60vh ;">

            <div id="content">


                <div class="login-box">
                    <div class="lb-header">
                        <a href="#" class="active" id="login-box-link">Login</a>
                        <a href="#" id="signup-box-link">Sign Up</a>
                    </div>

                    <form class="email-login" action="{{ route('postLogin') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="u-form-group">
                            <input type="email" placeholder="Email" name="email" />
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="u-form-group">
                            <input type="password" placeholder="Password" name="password" />

                            @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="u-form-group">
                            <button>Log in</button>
                        </div>

                    </form>

                    <form class="email-signup" action="{{ route('postRegister') }}" method="post"
                        enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-edit  ">
                                    <input type='file' id="imageUpload" class="" name="image" />
                                    <label for="imageUpload"> <i class="fas fa-cloud-upload-alt"></i></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview"
                                        style="background-image: url({{ asset('Website_Assets/assets/images/userImageDefault.jpg') }});">
                                    </div>
                                </div>

                            </div>
                        </div>

                        @if ($errors->has('image'))
                            <div class="text-danger">
                                {{ $errors->first('image') }}
                            </div>
                        @endif

                        <div class="u-form-group">
                            <input type="text form-control " placeholder="Name" name="name" />
                            @if ($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                        </div>
                        <div class="u-form-group">
                            <input type="email" placeholder="Email" name="email" />
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="u-form-group">
                            <input type="password" placeholder="Password" name="password" />
                            @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="u-form-group">
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                            @if ($errors->has('password_confirmation'))
                                <div class="text-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                        <div class="u-form-group">
                            <button>Sign Up</button>
                        </div>
                    </form>

                </div>


            </div>



        </section>






    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('Website_Assets/js/auth.js') }}"></script>

</body>

</html>
