let activeInput = null;
document.getElementById("start-search").addEventListener("focus", function () {
    activeInput = "start";
});

document.getElementById("end-search").addEventListener("focus", function () {
    activeInput = "end";
});

document.getElementById("start-search").addEventListener("input", function () {
    filterResults(this.value);
});

document.getElementById("end-search").addEventListener("input", function () {
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
        } else if (activeInput === "end") {
            document.getElementById("end-search").value = roomName;
            document.getElementById("end-hidden").value = roomId;
        }
    });
});

function filterResults(query) {
    query = query.toLowerCase();
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
        } else {
            box.style.display = "none";
        }
    });
}
