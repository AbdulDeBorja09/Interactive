function showRoomInfo(roomId) {
    let swapButton = document.getElementById("swapButton");
    swapButton.disabled = true;
    swapButton.innerText = "Fetching...";

    fetch(`/get-room-info/${roomId}`)
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById("newRoomId").value = data.room.id;
                document.getElementById("newroomdisplay").value =
                    data.room.location +
                    " (" +
                    data.room.id.substring(5).toUpperCase() +
                    ")";
                document.getElementById("newroomname").value = data.room.name;
            } else {
                alert("Room information not found.");
            }
        })
        .catch((error) => console.error("Error fetching room info:", error))
        .finally(() => {
            // Re-enable the swap button
            swapButton.disabled = false;
            swapButton.innerText = "Swap Room";
        });
}
