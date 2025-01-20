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
            <li class=""><a href="">4F</a></li>
            <li class=""><a href="">3F</a></li>
            <li class=""><a href="">2F</a></li>
            <li class=""><a href="">GF</a></li>
            <li class=""><a href="">LG</a></li>
        </ul>
    </section>

    <section class="bottom-sheet" id="bottomSheet">
        <input type="text" id="newText" placeholder="Enter new text" />
        <button onclick="updateSvgText()">Update Text</button>

        <div class="header" id="header">
            <span class="drag-handle"></span>
        </div>
        <div class="search">
            <img src="{{asset('../image/search.svg')}}" alt="search" />
            <input type="text" name="" id="" placeholder="Search" />
        </div>
        <div class="content">
            <div class="box">
                <h1>City Engineering and Infrastracture Development Department</h1>
                <p>
                    Assit the city Mayor and the Sangguniang Panglungsod in promoting
                    genaral progress through the implementation of different development
                    infrastracture projects.
                </p>
                <div class="bottom">
                    <div class="flex">
                        <img src="{{asset('../image/loc.svg')}}" alt="location" />
                        <h2>Right Wing, 2F14</h2>
                    </div>
                    <button>Directions</button>
                </div>
            </div>
            <div class="box">
                <h1>City Accounting & Internal Control Office</h1>
                <p>
                    This office takes charge of the accounting and internal audit
                    services of the local government unit.
                </p>
                <div class="bottom">
                    <div class="flex">
                        <img src="{{asset('../image/loc.svg')}}" alt="location" />
                        <h2>Right Wing, 2F14</h2>
                    </div>
                    <button>Directions</button>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('../js/drag.js')}}"></script>
    <script>
        function updateSvgText() {
            // Get the new text from the input field
            const newText = document.getElementById('newText').value;
            
            // Get the text element by its ID
            const textElement = document.getElementById('text116-5-4-6-4-1-8-8-5-3');
            
            // Get the <tspan> element inside the text element
            const tspanElement = textElement.querySelector('tspan');
            
            // Update the text content of the <tspan> element
            if (tspanElement) {
                tspanElement.textContent = newText;
            } else {
                console.error('No <tspan> element found inside the <text> element.');
            }
        }
    </script>
</body>

</html>