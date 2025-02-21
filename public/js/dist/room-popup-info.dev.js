"use strict";

function showRoomInfo(roomId) {
  closePopup();
  document.getElementById("room-popup").style.display = "block";
  fetch("/GetInfo/".concat(roomId)).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (data.success) {
      document.getElementById("popup-title").innerText = data.room.room_name;
      document.getElementById("popup-content").innerText = data.room.room_desc;
      var popStart = document.getElementById("pop-start");
      var popEnd = document.getElementById("pop-end");
      popStart.disabled = false;
      popEnd.disabled = false;

      popStart.onclick = function () {
        closePopup();
        document.getElementById("start-search").value = data.room.room_name;
        document.getElementById("start-hidden").value = roomId;
        BlinkStart(roomId);
        checkAndDrawRoute();
      };

      popEnd.onclick = function () {
        closePopup();
        document.getElementById("end-search").value = data.room.room_name;
        document.getElementById("end-hidden").value = roomId;
        BlinkEnd(roomId);
        checkAndDrawRoute();
      };
    } else {
      document.getElementById("popup-title").innerText = "No Info Found";
      document.getElementById("popup-content").innerText = "No info found for this room.";
    }
  })["catch"](function (error) {
    return console.error("Error fetching room data:", error);
  });
}

function checkAndDrawRoute() {
  var startRoomId = document.getElementById("start-hidden").value;
  var endRoomId = document.getElementById("end-hidden").value;

  if (startRoomId && endRoomId) {
    drawRoute();
  }
}

function closePopup() {
  var popup = document.getElementById("room-popup");

  if (popup.style.display === "block") {
    var popStart = document.getElementById("pop-start");
    var popEnd = document.getElementById("pop-end");
    popStart.disabled = true;
    popEnd.disabled = true;
    document.getElementById("popup-title").innerText = "Fetching Info";
    document.getElementById("popup-content").innerText = "Loading...";
    popup.style.display = "none";
  }
}