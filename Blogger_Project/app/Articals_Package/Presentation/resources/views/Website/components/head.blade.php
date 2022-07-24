<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_token" content="{{ csrf_token() }}" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


@if ($screen == 1)
    <link href="{{ asset('Website_Assets/css/auth.css') }}" rel="stylesheet">
    <title>Blogger</title>
@elseif($screen == 2)

<link href="{{ asset('Website_Assets/index.css') }}" rel="stylesheet">

<title>Blogger</title>


@else
    <link href="{{ asset('Website_Assets/css/blogDetails.css') }}" rel="stylesheet">
    <title>Blogger</title>
@endif
