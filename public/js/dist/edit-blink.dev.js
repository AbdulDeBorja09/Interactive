"use strict";

document.addEventListener("DOMContentLoaded", function () {
  var roomId = "{{ $item->room_id }}";

  function selectRoomById(roomId) {
    var rooms = document.querySelectorAll(".room");
    rooms.forEach(function (room) {
      if (room.id === roomId) {
        room.classList.add("selected");
      } else {
        room.classList.remove("selected");
      }
    });
  }

  selectRoomById(roomId);
});