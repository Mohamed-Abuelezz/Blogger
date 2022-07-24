<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}" />

    <title> Dashboard </title>

    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/myPackages/toastr-master/build/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Dashboard_Assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">


    <link rel="shortcut icon" href="{{ asset('Dashboard_Assets/images/favicon.png') }}" />

    <style>
        .select2-selection {
            height: auto !important;
            width: 100%;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 15px;
            right: 1px;
            width: 20px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">


        @include('Dashboard.components.navbar')

        <div class="container-fluid page-body-wrapper">

            @include('Dashboard.components.settingpanel')




            @include('Dashboard.components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">


                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Artical</h4>

                                <form action="{{ route('articals.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label for="titleInput">Title</label>
                                        <input type="text" name="title"
                                            class="form-control  @error('title') is-invalid @enderror" id="titleInput"
                                            value="{{ old('title') }}" placeholder="Name">
                                        @if ($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="bodyInput">Body</label>
                                        <br>
                                        <textarea class="form-control form-control-lg @error('body') is-invalid @enderror" id="bodyInput" rows="4"
                                            name="body">{{ old('body') }}</textarea>
                                        @if ($errors->has('body'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('body') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Image [Optional]</label>
                                        <input type="file" name="image"
                                            class="file-upload-default  @error('image') is-invalid @enderror">


                                        <div class="input-group col-xs-12">
                                            <input type="text" name="image" class="form-control file-upload-info"
                                                disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                        @if ($errors->has('image'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('image') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="js-categories w-100 " name="category">
                                            @foreach ($allCategories as $item)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>





                                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>



                </div>

                @include('Dashboard.components.footer')

            </div>
        </div>
    </div>

    <script>
        var APP_URL = {!! json_encode(url('/dashboard/')) !!}
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('Dashboard_Assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/template.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/settings.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/todolist.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/vendors/select2/select2.min.js') }}"></script>

    <script src="{{ asset('Dashboard_Assets/myPackages/toastr-master/build/toastr.min.js') }}"></script>

    <script src="{{ asset('Dashboard_Assets/js/pages/articals.js') }}"></script>

</body>

</html>
