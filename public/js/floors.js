document.querySelectorAll("ul li a").forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();

        document.querySelectorAll("ul li").forEach((li) => {
            li.classList.remove("active");
        });

        this.parentElement.classList.add("active");
        const floor = this.getAttribute("data-floor");

        document.querySelectorAll(".floor-svg").forEach((floorSvg) => {
            floorSvg.style.display = "none";
        });

        const selectedFloorSvg = document.getElementById(floor);
        const floorMap = {
            LG: "Lower Ground",
            GF: "Ground Floor",
            "2F": "Second Floor",
            "3F": "Third Floor",
            "4F": "Fourth Floor",
        };

        if (selectedFloorSvg) {
            selectedFloorSvg.style.display = "block";

            document.getElementById("floor-title").innerText =
                floorMap[floor] || "Unknown Floor";
        }
    });
});

window.onload = function () {
    document.getElementById("LG").style.display = "block";
    document
        .querySelector('ul li a[data-floor="LG"]')
        .parentElement.classList.add("active");
    document.getElementById("floor-title").innerText = "Lower Ground";
};
