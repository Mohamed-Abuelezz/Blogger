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


    <link rel="shortcut icon" href="{{ asset('Dashboard_Assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">


        @include('Dashboard.components.navbar')

        <div class="container-fluid page-body-wrapper">

            @include('Dashboard.components.settingpanel')




            @include('Dashboard.components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">


                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Categories Table</h4>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Id
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                                <th>
                                                    Created At
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allCategories as $item)
                                                <tr data-id="{{ $item->id }}">

                                                    <td>
                                                        {{ $item->id }}
                                                    </td>
                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            onclick="removeCategory({{ $item->id }})"
                                                            class="btn btn-danger btn-icon-text">
                                                            <i class="ti-trash  btn-icon-prepend"></i>
                                                            Delete
                                                        </button>

                                                    </td>

                                                    <td>
                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
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
    <script src="{{ asset('Dashboard_Assets/myPackages/toastr-master/build/toastr.min.js') }}"></script>

    <script src="{{ asset('Dashboard_Assets/js/pages/categories.js') }}"></script>

</body>

</html>
