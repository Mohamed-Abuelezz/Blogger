<div class="content   " style="padding-top: 100px">



    <div class="container " style="height: 90vh">
        <div class="row g-3">


            @foreach ($allArticals as $item)
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">


                    <div class="card">
                        <img class="card-img"
                            src=" {{ $item->image == null ? asset('Website_Assets/assets/images/NoImageAvailable.jpg') : asset('storage/' . $item->image) }} "
                            alt="Bologna" height="200">
                        <div class="">
                            <a href="#" class="btn btn-light btn-sm">{{ $item->category->name }}</a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">
                                {{ \Illuminate\Support\Str::words($item->title, 4, '....') }}</h6>
                            <small class="text-muted cat">
                                <i class="far fa-clock text-info"></i>
                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </small>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::words($item->body, 15, '....') }}</p>
                            <a href="{{ route('blogDetails', ['id' => $item->id]) }}" class="btn btn-info">Read More</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                            <div class="views">
                                {{ Carbon\Carbon::parse($item->created_at)->format('d F Y H:i') }}
                            </div>



                        </div>
                    </div>
                </div>
            @endforeach






        </div>
    </div>


    {{ $allArticals->withPath('/')->appends(request()->input())->links() }}



</div>
