<section>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('Dashboard_Assets/images/favicon.png') }}" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
                Blogger
            </a>

            <div>
                <span>Hello {{ auth()->user()->name }} !</span>
                {{-- <img src="https://engineering.unl.edu/images/staff/Kayla-Person.jpg" class="rounded-circle" width="50" height="50" alt=""> --}}
            </div>
        </div>

    </nav>

</section>
