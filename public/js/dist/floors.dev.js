"use strict";

document.querySelectorAll("ul li a").forEach(function (button) {
  button.addEventListener("click", function (event) {
    event.preventDefault();
    document.querySelectorAll("ul li").forEach(function (li) {
      li.classList.remove("active");
    });
    this.parentElement.classList.add("active");
    var floor = this.getAttribute("data-floor");
    document.querySelectorAll(".floor-svg").forEach(function (floorSvg) {
      floorSvg.style.display = "none";
    });
    var selectedFloorSvg = document.getElementById(floor);
    var floorMap = {
      LG: "Lower Ground",
      GF: "Ground Floor",
      "2F": "Second Floor",
      "3F": "Third Floor",
      "4F": "Fourth Floor"
    };

    if (selectedFloorSvg) {
      selectedFloorSvg.style.display = "block";
      document.getElementById("floor-title").innerText = floorMap[floor] || "Unknown Floor"; // Send AJAX request to get rooms

      fetch("/GetRooms", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content") // Ensure you have a CSRF token for Laravel

        },
        body: JSON.stringify({
          floor: floorMap[floor]
        })
      }).then(function (response) {
        return response.json();
      }).then(function (data) {
        var roomList = document.getElementById("room-list");
        roomList.innerHTML = "";

        if (data.rooms.length > 0) {
          data.rooms.forEach(function (room) {
            var roomItem = document.createElement("p");
            roomItem.classList.add("room-item");
            roomItem.innerText = room.room_name;
            roomList.appendChild(roomItem);
          });
        } else {
          roomList.innerHTML = "<p>No rooms available.</p>";
        }
      })["catch"](function (error) {
        return console.error("Error:", error);
      });
    }
  });
}); // On page load, display Lower Ground by default

window.onload = function () {
  document.getElementById("LG").style.display = "block";
  document.querySelector('ul li a[data-floor="LG"]').parentElement.classList.add("active");
  document.getElementById("floor-title").innerText = "Lower Ground"; // Fetch and display rooms for default floor

  fetch("/GetRooms", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    },
    body: JSON.stringify({
      floor: "Lower Ground"
    })
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    var roomList = document.getElementById("room-list");
    roomList.innerHTML = "";

    if (data.rooms.length > 0) {
      data.rooms.forEach(function (room) {
        var roomItem = document.createElement("p");
        roomItem.classList.add("room-item");
        roomItem.innerText = room.room_name;
        roomList.appendChild(roomItem);
      });
    } else {
      roomList.innerHTML = "<p>No rooms available.</p>";
    }
  })["catch"](function (error) {
    return console.error("Error:", error);
  });
};

document.addEventListener("DOMContentLoaded", function () {
  var slider = document.getElementById("room-list");
  var isDown = false;
  var startX;
  var scrollLeft;

  function startDrag(e) {
    isDown = true;
    slider.classList.add("active");
    startX = e.touches ? e.touches[0].pageX - slider.offsetLeft : e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  }

  function stopDrag() {
    isDown = false;
    slider.classList.remove("active");
  }

  function moveDrag(e) {
    if (!isDown) return;
    e.preventDefault();
    var x = e.touches ? e.touches[0].pageX - slider.offsetLeft : e.pageX - slider.offsetLeft;
    var walk = (x - startX) * 2; // Adjust speed by changing multiplier

    slider.scrollLeft = scrollLeft - walk;
  } // Mouse Events


  slider.addEventListener("mousedown", startDrag);
  slider.addEventListener("mouseleave", stopDrag);
  slider.addEventListener("mouseup", stopDrag);
  slider.addEventListener("mousemove", moveDrag); // Touch Events (For Mobile)

  slider.addEventListener("touchstart", startDrag);
  slider.addEventListener("touchend", stopDrag);
  slider.addEventListener("touchmove", moveDrag);
});