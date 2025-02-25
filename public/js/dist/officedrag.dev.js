"use strict";

document.addEventListener("DOMContentLoaded", function () {
  var sidebar = document.getElementById("roomlistbox");
  var dragger = document.getElementById("dragger");
  dragger.addEventListener("click", function () {
    if (sidebar.classList.contains("open")) {
      sidebar.classList.remove("open");
    } else {
      sidebar.classList.add("open");
    }
  });
});