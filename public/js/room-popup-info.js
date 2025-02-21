function showRoomInfo(roomId) {
    closePopup();
    document.getElementById("room-popup").style.display = "block";
    fetch(`/GetInfo/${roomId}`)
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById("popup-title").innerText =
                    data.room.room_name;
                document.getElementById("popup-content").innerText =
                    data.room.room_desc;

                let popStart = document.getElementById("pop-start");
                let popEnd = document.getElementById("pop-end");

                popStart.disabled = false;
                popEnd.disabled = false;

                popStart.onclick = function () {
                    closePopup();
                    document.getElementById("start-search").value =
                        data.room.room_name;
                    document.getElementById("start-hidden").value = roomId;
                    BlinkStart(roomId);
                    checkAndDrawRoute();
                };

                popEnd.onclick = function () {
                    closePopup();
                    document.getElementById("end-search").value =
                        data.room.room_name;
                    document.getElementById("end-hidden").value = roomId;
                    BlinkEnd(roomId);
                    checkAndDrawRoute();
                };
            } else {
                document.getElementById("popup-title").innerText =
                    "No Info Found";
                document.getElementById("popup-content").innerText =
                    "No info found for this room.";
            }
        })
        .catch((error) => console.error("Error fetching room data:", error));
}

function checkAndDrawRoute() {
    const startRoomId = document.getElementById("start-hidden").value;
    const endRoomId = document.getElementById("end-hidden").value;

    if (startRoomId && endRoomId) {
        drawRoute();
    }
}
function closePopup() {
    let popup = document.getElementById("room-popup");
    if (popup.style.display === "block") {
        let popStart = document.getElementById("pop-start");
        let popEnd = document.getElementById("pop-end");

        popStart.disabled = true;
        popEnd.disabled = true;

        document.getElementById("popup-title").innerText = "Fetching Info";
        document.getElementById("popup-content").innerText = "Loading...";

        popup.style.display = "none";
    }
}
