<section class="bottom-sheet" id="bottomSheet">
    <div class="header" id="header">
        <span class="drag-handle"></span>
    </div>

    <div class="search">
        <img src="{{ asset('image/search.svg') }}" alt="Start Location" />
        <input type="hidden" name="start" id="start-hidden">
        <input type="text" id="start-search" placeholder="Starting point" />
    </div>

    <div class="search">
        <img src="{{ asset('image/search.svg') }}" alt="Destination" />
        <input type="hidden" name="end" id="end-hidden">
        <input type="text" id="end-search" placeholder="Destination" />
    </div>

    <div class="search text-center"><button class="btn btn-success w-100">Get directions</button></div>

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