"use strict";

function showRoomInfo(roomId) {
  var swapButton = document.getElementById("swapButton");
  swapButton.disabled = true;
  swapButton.innerText = "Fetching...";
  fetch("/get-room-info/".concat(roomId)).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (data.success) {
      document.getElementById("newRoomId").value = data.room.id;
      document.getElementById("newroomdisplay").value = data.room.location + " (" + data.room.id.substring(5).toUpperCase() + ")";
      document.getElementById("newroomname").value = data.room.name;
    } else {
      alert("Room information not found.");
    }
  })["catch"](function (error) {
    return console.error("Error fetching room info:", error);
  })["finally"](function () {
    // Re-enable the swap button
    swapButton.disabled = false;
    swapButton.innerText = "Swap Room";
  });
}