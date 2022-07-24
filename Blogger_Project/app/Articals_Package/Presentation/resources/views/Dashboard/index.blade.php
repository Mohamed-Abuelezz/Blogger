<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Dashboard </title>
    
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('Dashboard_Assets/css/vertical-layout-light/style.css') }}">

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

                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Total Visitors</h4>
                                    <h4 class="card-body">{{ App\Articals_Package\Data\Models\Visitors::count() }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Total Articals</h4>
                                    <h4 class="card-body">{{ App\Articals_Package\Data\Models\Artical::count() }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Admins</h4>
                                    <h4 class="card-body">{{ App\Articals_Package\Data\Models\Admin::count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">WebSite Views Chart</h4>
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col">

                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h4 class="card-title card-title-dash">Activities</h4>
                                        <p class="mb-0">{{ App\Articals_Package\Data\Models\Artical::count() }}</p>
                                    </div>
                                    <ul class="bullet-line-list">
                                        @foreach ($last5ArticalsPublished as $item)
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div><span class="text-primary">{{ $item->admin->name }}</span>
                                                        Published an
                                                        artical</div>
                                                    <p>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>

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
        var lastVisitors = {!! json_encode($lastVisitors) !!}
        console.log(lastVisitors);
        var datesKeys = Object.keys(lastVisitors);
        var views = [];

        for (var i = 0; i < datesKeys.length; i++) {
            views.push(lastVisitors[datesKeys[i]].length);
        }


        console.log(datesKeys);
        console.log(views);
    </script>



    <script src="{{ asset('Dashboard_Assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/template.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/settings.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('Dashboard_Assets/js/jquery.cookie.js') }}" type="text/javascript"></script>

    <script src="{{ asset('Dashboard_Assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
