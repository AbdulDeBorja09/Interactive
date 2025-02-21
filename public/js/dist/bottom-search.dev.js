"use strict";

var activeInput = null;
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
document.querySelectorAll(".select-btn").forEach(function (button) {
  button.addEventListener("click", function () {
    var box = this.closest(".box");
    var roomName = box.querySelector("h1").innerText;
    var roomId = box.getAttribute("data-room-id");

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
  var rooms = document.querySelectorAll(".room");
  rooms.forEach(function (room) {
    room.classList.remove("blink-point");
    room.classList.remove("start-point");
  });
  var startRoom = document.getElementById(roomId);

  if (startRoom) {
    startRoom.classList.add("start-point");
  }
}

function BlinkEnd(roomId) {
  var rooms = document.querySelectorAll(".room");
  rooms.forEach(function (room) {
    room.classList.remove("blink-point");
    room.classList.remove("end-point");
  });
  var endRoom = document.getElementById(roomId);

  if (endRoom) {
    endRoom.classList.add("end-point");
  }
}

function filterResults(query) {
  query = query.toLowerCase();
  var resultsFound = false;
  document.querySelectorAll(".box").forEach(function (box) {
    var roomName = box.getAttribute("data-room-name");
    var roomDesc = box.getAttribute("data-room-desc");
    var roomID = box.getAttribute("data-room-id");

    if (roomName.includes(query) || roomDesc.includes(query) || roomID.includes(query)) {
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