<!doctype html>
<html lang="en">

<head>
    @include('Website.components.head' ,['screen' => 3])

</head>

<body>


    @include('Website.components.nav')



    <div class="container">



        <section class="content" style="min-height:60vh ;margin-top: 100px">

            <h1>{{ $artical->title }}</h1>

            @if ($artical->image != null)
                <div class="blog-img w-100 shadow"
                    style=" height: 25vh;overflow: hidden;background-image: url({{ asset('storage/' . $artical->image) }});background-attachment: fixed;  background-repeat: no-repeat;  background-position: center;
background-size: cover;
            ">
                </div>
            @endif

            <div class="container  m-2">

                <div class="row">
                    <div class="col-12 col-md-9">
                        <p class="text-muted">{{ $artical->body }}

                        </p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card ">
                            <div class="card-body">

                                <div class="container-fluid">

                                    <div class="row">

                                        <div class="col ">
                                            <p class="m-0 text-capitalize fw-bold">{{ $artical->admin->name }}</p>
                                            <span class="m-0 text-muted"><small>
                                                    {{ Carbon\Carbon::parse($artical->created_at)->diffForHumans() }}</small></span>
                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>
                    </div>
                </div>

            </div>





        </section>


        <section class="comments" style="background-color: #eee;">
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card">


                            <div class="card-body commentss " style="height: 400px;overflow: scroll;">

                                @foreach ($artical->comments->reverse() as $item)
                                    @include('Website.components.commentItem')
                                @endforeach


                            </div>


                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src=" {{ asset('storage/' . auth()->user()->image) }}" alt="avatar"
                                        width="40" height="40" />
                                    <div class="form-outline w-100">
                                        <textarea class="form-control" id="textAreaComment" rows="4" style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample">Message</label>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="button" id="btnSubmit" class="btn btn-primary btn-sm"
                                        data-artical="{{ $artical->id }}">Comment</button>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>



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
    <script src="{{ asset('Website_Assets/js/blogDetails.js') }}"></script>


</body>

</html>
