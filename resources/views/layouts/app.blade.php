<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset('css/user.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav>
        <img src="{{asset('../image/logo.png')}}" alt="" />
    </nav>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <section class="floors">
        <ul>
            <li><a href="#" data-floor="4F">4F</a></li>
            <li><a href="#" data-floor="3F">3F</a></li>
            <li><a href="#" data-floor="2F">2F</a></li>
            <li><a href="#" data-floor="GF">GF</a></li>
            <li><a href="#" data-floor="LG">LG</a></li>
        </ul>
    </section>

    <section class="bottom-sheet" id="bottomSheet">
        <div class="header" id="header">
            <span class="drag-handle"></span>
        </div>
        <div class="search">
            <img src="{{ asset('image/search.svg') }}" alt="Start Location" />
            <input type="hidden" name="start">
            <input type="text" id="start-search" placeholder="Start Location (Ex. Room 01)" />
        </div>
        <div class="search">
            <img src="{{ asset('image/search.svg') }}" alt="Destination" />
            <input type="hidden" name="end">
            <input type="text" id="end-search" placeholder="Destination (Ex. Mayor's Office)" />
        </div>
        <div class="content" id="search-results">
            @foreach ($data as $item)
            @php
            $room = substr($item->room_id, 7);
            @endphp
            <div class="box" data-room-name="{{ strtolower($item->room_name) }}"
                data-room-desc="{{ strtolower($item->room_desc) }}" data-room-id="{{ strtolower($item->room_id) }}">
                <h1>{{ $item->room_name }}</h1>
                <p>
                    {{ $item->room_desc }}
                </p>
                <div class="bottom">
                    <div class="flex">
                        <img src="{{ asset('image/loc.svg') }}" alt="location" />
                        <h2>{{ $item->floor }}, {{ $room }}</h2>
                    </div>
                    <button class="select-btn">SELECT</button>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('../js/drag.js')}}"></script>
    <script>
        let activeInput = null;
    
        document.getElementById("start-search").addEventListener("focus", function() {
            activeInput = "start";
        });
        
        document.getElementById("end-search").addEventListener("focus", function() {
            activeInput = "end";
        });
    
        document.getElementById("start-search").addEventListener("input", function() {
            filterResults(this.value);
        });
    
        document.getElementById("end-search").addEventListener("input", function() {
            filterResults(this.value);
        });
    
        function filterResults(query) {
            query = query.toLowerCase();
            document.querySelectorAll(".box").forEach(box => {
                let roomName = box.getAttribute("data-room-name");
                let roomDesc = box.getAttribute("data-room-desc")
                let roomID = box.getAttribute("data-room-id");
                if (roomName.includes(query) || roomDesc.includes(query) || roomID.includes(query)) {
                    box.style.display = "block";
                } else {
                    box.style.display = "none";
                }
            });
        }
    
        document.querySelectorAll(".select-btn").forEach(button => {
            button.addEventListener("click", function() {
                let box = this.closest(".box");
                let roomName = box.querySelector("h1").innerText;
                let roomId = box.getAttribute("data-room-id");
                
                if (activeInput === "start") {
                    document.getElementById("start-search").value = roomName;
                    document.getElementById("start-hidden").value = roomId;
                } else if (activeInput === "end") {
                    document.getElementById("end-search").value = roomName;
                    document.getElementById("end-hidden").value = roomId;
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('ul li a').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
        
                document.querySelectorAll('ul li').forEach(li => {
                    li.classList.remove('active');
                });
        
                this.parentElement.classList.add('active');
                const floor = this.getAttribute('data-floor'); 
                document.querySelectorAll('.floor-svg').forEach(floorSvg => {
                    floorSvg.style.display = 'none';
                });
        

                const selectedFloorSvg = document.getElementById(floor);
                if (selectedFloorSvg) {
                    selectedFloorSvg.style.display = 'block'; 
                }
            });
        });
        
        window.onload = function() {
            document.getElementById('LG').style.display = 'block';
            document.querySelector('ul li a[data-floor="LG"]').parentElement.classList.add('active');
        };
    </script>



</body>

</html>