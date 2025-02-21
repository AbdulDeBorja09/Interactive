let activeInput = null;

document.getElementById("start-search").addEventListener("focus", function () {
    activeInput = "start";
});

document.getElementById("end-search").addEventListener("focus", function () {
    activeInput = "end";
});

document.getElementById("start-search").addEventListener("input", function () {
    filterResults(this.value);
    if (this.value === "") {
        document.getElementById("start-hidden").value = "";
    }
    filterResults(this.value);
});

document.getElementById("end-search").addEventListener("input", function () {
    if (this.value === "") {
        document.getElementById("end-hidden").value = "";
    }
    filterResults(this.value);
});
document.querySelectorAll(".select-btn").forEach((button) => {
    button.addEventListener("click", function () {
        let box = this.closest(".box");
        let roomName = box.querySelector("h1").innerText;
        let roomId = box.getAttribute("data-room-id");

        if (activeInput === "start") {
            document.getElementById("start-search").value = roomName;
            document.getElementById("start-hidden").value = roomId;
            BlinkStart(roomId);
        } else if (activeInput === "end") {
            document.getElementById("end-search").value = roomName;
            document.getElementById("end-hidden").value = roomId;
            BlinkEnd(roomId);
        }
    });
});

function BlinkStart(roomId) {
    const rooms = document.querySelectorAll(".room");
    rooms.forEach((room) => {
        room.classList.remove("blink-point");
        room.classList.remove("start-point");
    });
    const startRoom = document.getElementById(roomId);
    if (startRoom) {
        startRoom.classList.add("start-point");
    }
}

function BlinkEnd(roomId) {
    const rooms = document.querySelectorAll(".room");
    rooms.forEach((room) => {
        room.classList.remove("blink-point");
        room.classList.remove("end-point");
    });
    const endRoom = document.getElementById(roomId);
    if (endRoom) {
        endRoom.classList.add("end-point");
    }
}

function filterResults(query) {
    query = query.toLowerCase();
    let resultsFound = false;

    document.querySelectorAll(".box").forEach((box) => {
        let roomName = box.getAttribute("data-room-name");
        let roomDesc = box.getAttribute("data-room-desc");
        let roomID = box.getAttribute("data-room-id");

        if (
            roomName.includes(query) ||
            roomDesc.includes(query) ||
            roomID.includes(query)
        ) {
            box.style.display = "block";
            resultsFound = true;
        } else {
            box.style.display = "none";
        }
    });

    if (resultsFound < 1) {
        document.getElementById("noresult").style.display = "block";
    } else {
        document.getElementById("noresult").style.display = "none";
    }
}

function clearInputs(inputType) {
    if (inputType === "start") {
        document.getElementById("start-search").value = "";
        document.getElementById("start-hidden").value = "";
    } else if (inputType === "end") {
        document.getElementById("end-search").value = "";
        document.getElementById("end-hidden").value = "";
    }
}
