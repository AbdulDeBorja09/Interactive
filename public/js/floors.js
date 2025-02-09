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
        if (selectedFloorSvg) {
            selectedFloorSvg.style.display = "block";
        }
    });
});

window.onload = function () {
    document.getElementById("LG").style.display = "block";
    document
        .querySelector('ul li a[data-floor="LG"]')
        .parentElement.classList.add("active");
};
