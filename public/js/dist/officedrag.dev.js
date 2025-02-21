"use strict";

document.addEventListener("DOMContentLoaded", function () {
  var sidebar = document.getElementById("roomlistbox");
  var dragger = document.getElementById("dragger");
  var isDragging = false;
  var startX, startLeft;

  function startDrag(e) {
    isDragging = true;
    startX = e.touches ? e.touches[0].clientX : e.clientX;
    startLeft = sidebar.offsetLeft;
  }

  function moveDrag(e) {
    if (!isDragging) return;
    var currentX = e.touches ? e.touches[0].clientX : e.clientX;
    var deltaX = currentX - startX;

    if (deltaX > 50) {
      sidebar.classList.add("open");
    } else if (deltaX < -50) {
      sidebar.classList.remove("open");
    }
  }

  function stopDrag() {
    isDragging = false;
  } // Mouse Events


  dragger.addEventListener("mousedown", startDrag);
  document.addEventListener("mousemove", moveDrag);
  document.addEventListener("mouseup", stopDrag); // Touch Events (For Mobile)

  dragger.addEventListener("touchstart", startDrag);
  document.addEventListener("touchmove", moveDrag);
  document.addEventListener("touchend", stopDrag);
});