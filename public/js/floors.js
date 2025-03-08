document.querySelectorAll("ul li a").forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();

        document.querySelectorAll("ul li").forEach((li) => {
            li.classList.remove("active");
        });

        this.parentElement.classList.add("active");
        const floor = this.getAttribute("data-floor");

        document.querySelectorAll(".floor-svg").forEach((floorSvg) => {
            floorSvg.style.display = "none";
        });

        const selectedFloorSvg = document.getElementById(floor);
        const floorMap = {
            LG: "Lower Ground",
            GF: "Ground Floor",
            "2F": "Second Floor",
            "3F": "Third Floor",
            "4F": "Fourth Floor",
        };

        if (selectedFloorSvg) {
            selectedFloorSvg.style.display = "block";

            document.getElementById("floor-title").innerText =
                floorMap[floor] || "Unknown Floor";

            // Send AJAX request to get rooms
            fetch("/GetRooms", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ floor: "Lower Ground" }),
            })
                .then((response) => response.json())
                .then((data) => {
                    const roomList = document.getElementById("room-list");
                    roomList.innerHTML = "";

                    if (data.rooms.length > 0) {
                        data.rooms.forEach((room) => {
                            const roomItem = document.createElement("p");
                            roomItem.classList.add("room-item");
                            roomItem.innerText = room.room_name;
                            roomItem.dataset.BlinkID = room.room_id;
                            roomItem.addEventListener("click", function () {
                                BlinkRoom(this.dataset.BlinkID);
                            });
                            roomList.appendChild(roomItem);
                        });
                    } else {
                        roomList.innerHTML = "<p>No rooms available.</p>";
                    }
                })
                .catch((error) => console.error("Error:", error));
        }
    });
});


window.onload = function () {
    document.getElementById("LG").style.display = "block";
    document
        .querySelector('ul li a[data-floor="LG"]')
        .parentElement.classList.add("active");
    document.getElementById("floor-title").innerText = "Lower Ground";

    fetch("/GetRooms", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ floor: "Lower Ground" }),
    })
        .then((response) => response.json())
        .then((data) => {
            const roomList = document.getElementById("room-list");
            roomList.innerHTML = "";

            if (data.rooms.length > 0) {
                data.rooms.forEach((room) => {
                    const roomItem = document.createElement("p");
                    roomItem.classList.add("room-item");
                    roomItem.innerText = room.room_name;
                    roomItem.dataset.BlinkID = room.room_id;
                    roomItem.addEventListener("click", function () {
                        BlinkRoom(this.dataset.BlinkID);
                    });
                    roomList.appendChild(roomItem);
                });
            } else {
                roomList.innerHTML = "<p>No rooms available.</p>";
            }
        })
        .catch((error) => console.error("Error:", error));
    function BlinkRoom(BlinkID) {
        const sidebar = document.getElementById("roomlistbox");
        sidebar.classList.remove("open");
        var rooms = document.querySelectorAll(".room");
        rooms.forEach(function (room) {
            room.classList.remove("blink-point");
        });

        var startRoom = document.getElementById(BlinkID);

        if (startRoom) {
            startRoom.classList.add("blink-point");
        }
    }
};
