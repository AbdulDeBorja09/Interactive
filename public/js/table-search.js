const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", function () {
    const filter = searchInput.value.toUpperCase();
    const table = document.querySelector(".table");
    const rows = table.getElementsByTagName("tr");

    let found = false;
    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        let rowMatch = false;
        for (let j = 0; j < cells.length; j++) {
            if (
                cells[j] &&
                cells[j].textContent.toUpperCase().includes(filter)
            ) {
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

    const message = document.getElementById("noResultsMessage");
    if (message) {
        message.remove();
    }

    if (!found) {
        const noResultsMessage = document.createElement("tr");
        noResultsMessage.id = "noResultsMessage";
        noResultsMessage.innerHTML = `
                <td colspan="5" class="text-center text-danger">No results found</td>
            `;
        table.querySelector("tbody").appendChild(noResultsMessage);
    }
});
