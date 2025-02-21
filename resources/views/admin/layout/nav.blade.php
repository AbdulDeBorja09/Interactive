<nav id="top-nav">
    <div class="navbar d-flex ">
        <div class="container">
            {{-- <div>
                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button> --}}
                <a href="{{url('/Admin/Dashboard')}}"> <img src="{{asset('/image/Navlogo.png')}}" loading="lazy"
                        alt="NavLogo" class="desktoplogo" />
                    <img src="{{asset('/image/logo.png')}}" loading="lazy" alt="NavLogo" class="mobilelogo" /></a>

                {{--
            </div> --}}


            @auth
            <ul>
                <li class="logout nav-item dropdown" style="list-style: none">
                    <a id="navbarDropdown" class="Authname nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{route('dashboard')}}">
                                All Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('lower-ground') ? 'active' : '' }}"
                                href="{{route('lower-ground')}}">Lower
                                Ground Floor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('ground-floor') ? 'active' : '' }}"
                                href="{{route('ground-floor')}}">Ground
                                Floor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('second-floor') ? 'active' : '' }}"
                                href="{{route('second-floor')}}">Second
                                Floor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('third-floor') ? 'active' : '' }}"
                                href="{{route('third-floor')}}">Third
                                Floor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('fourth-floor') ? 'active' : '' }}"
                                href="{{route('fourth-floor')}}">Fourth
                                Floor</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="yellow-line"></div>
</nav>