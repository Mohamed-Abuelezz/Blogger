<!doctype html>
<html lang="en">

<head>
    @include('Website.components.head' ,['screen' => 3])

</head>

<body class="p-0">

    @include('Website.components.nav')




    <div class="container">
        <div class="row">

            <div class="col-3 order-2 ">

                <aside>
                    <div class="flowers-wrap " style="padding-top: 100px">
                        <p><strong>Filter by categories :</strong></p>
                        <form>
                            @foreach ($allCategories as $item)
                                <label><input type="checkbox" class=".categories" name="category"
                                        value="{{ $item->id }}" {{ in_array($item->id,  request()->get('ids') != null ? request()->get('ids') : []) ? 'checked' :'' }}         />{{ $item->name }}</label><br>
                            @endforeach


                        </form>

                    </div>
                </aside>

            </div>


            <div class="col-9 Blogitems">

                @include('Website.components.blogItems')


            </div>

        </div>





    </div>




    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ asset('Website_Assets/index.js') }}"></script>

</body>

</html>
