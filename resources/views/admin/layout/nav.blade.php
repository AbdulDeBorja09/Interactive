<nav class="navbar  fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        @auth
        <ul class="n" style="margin-right: 50px">
            <li class="logout nav-item dropdown" style="list-style: none">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        @endauth

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">

                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <div class="nav-image text-center">
                    <img src="{{asset('image/logo.png')}}" alt="">
                </div>
                <form class="nav-search" role="search">
                    <img src="{{asset('image/search.svg')}}" alt="">
                    <input class=" me-2" type="search" placeholder="Search And Find" aria-label="Search ">
                </form>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Lower Ground Floor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ground Floor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Second Floor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Third Floor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fourth Floor</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>