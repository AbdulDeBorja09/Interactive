"use strict";

document.addEventListener("DOMContentLoaded", function () {
  var sidebar = document.getElementById("roomlistbox");
  var dragger = document.getElementById("dragger");
  var icon = document.getElementById("icon-rotate");
  dragger.addEventListener("click", function () {
    if (sidebar.classList.contains("open")) {
      sidebar.classList.remove("open");
      icon.classList.remove("rotate");
    } else {
      sidebar.classList.add("open");
      icon.classList.add("rotate");
    }
  });
});