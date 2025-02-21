"use strict";

var searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", function () {
  var filter = searchInput.value.toUpperCase();
  var table = document.querySelector(".table");
  var rows = table.getElementsByTagName("tr");
  var found = false;

  for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var rowMatch = false;

    for (var j = 0; j < cells.length; j++) {
      if (cells[j] && cells[j].textContent.toUpperCase().includes(filter)) {
        rowMatch = true;
        break;
      }
    }

    if (rowMatch) {
      rows[i].style.display = "";
      found = true;
    } else {
      rows[i].style.display = "none";
    }
  }

  var message = document.getElementById("noResultsMessage");

  if (message) {
    message.remove();
  }

  if (!found) {
    var noResultsMessage = document.createElement("tr");
    noResultsMessage.id = "noResultsMessage";
    noResultsMessage.innerHTML = "\n                <td colspan=\"5\" class=\"text-center text-danger\">No results found</td>\n            ";
    table.querySelector("tbody").appendChild(noResultsMessage);
  }
});