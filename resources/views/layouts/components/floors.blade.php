<section class="bottom-sheet" id="bottomSheet">
    <div class="header" id="header">
        <span class="drag-handle"></span>
    </div>
    <div class="search">
        <img src="{{ asset('image/search.svg') }}" alt="Start Location" />
        <input type="hidden" name="start" id="start-hidden">
        <input type="text" id="start-search" placeholder="Start Location (Ex. Room 01)" />
    </div>
    <div class="search">
        <img src="{{ asset('image/search.svg') }}" alt="Destination" />
        <input type="hidden" name="end" id="end-hidden">
        <input type="text" id="end-search" placeholder="Destination (Ex. Mayor's Office)" />
    </div>
    <button class="btn">NAVIGATE</button>
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