<section class="bottom-sheet container" id="bottomSheet">
    <div class="header" id="header">
        <span class="drag-handle"></span>
    </div>

    <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="hidden" name="start" id="start-hidden">
        <input type="text" id="start-search" placeholder="Starting point" />
    </div>

    <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="hidden" name="end" id="end-hidden">
        <input type="text" id="end-search" placeholder="Destination" />
    </div>

    <div class="search text-center"><button class="get-direction-btn w-100">Get directions</button></div>

    <div class="content" id="search-results">
        <div class="noresult text-center" id="noresult">
            <img src="{{asset('../image/noresult.svg')}}" alt="">
            <h1>NO RESULT FOUND</h1>
        </div>
        @foreach ($data as $item)
        @php
        $roomID = substr($item->room_id, 5);
        @endphp
        <div class="box " data-room-name="{{ strtolower($item->room_name) }}"
            data-room-desc="{{ strtolower($item->room_desc) }}" data-room-id="{{ strtolower($item->room_id) }}">
            <h1>{{ $item->room_name }} </span></h1>
            <p>
                {{ $item->room_desc }}
            </p>
            <div class="room-info">
                <div class="d-flex">
                    <i class="fa-solid fa-user-tie"></i>
                    <p>Dept. Head: {{ $item->room_head ?? "N/A" }}</p>
                </div>
                <div class="d-flex">
                    <i class="fa-solid fa-phone-volume"></i>
                    <p>Office Contacts: {{ $item->room_contact ?? "N/A" }}</p>
                </div>
                <div class="d-flex">
                    <i class="fa-regular fa-envelope"></i>
                    <p>Email: {{ $item->room_email ?? "N/A" }}</p>

                </div>
            </div>
            <div class="bottom">
                <div class="flex">
                    <i class="fa-solid fa-location-dot"></i>
                    <h2>{{ $item->floor }}, <span style="text-transform: uppercase">({{ $roomID }})</h2>
                </div>
                <button class="select-btn">SELECT</button>
            </div>
        </div>
        @endforeach
    </div>
</section>