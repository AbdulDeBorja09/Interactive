document.addEventListener("DOMContentLoaded", function () {
    const floorMap = {
        LG: { name: "Lower Ground", file: "1GroundFloor_final.svg" },
        GF: { name: "Ground Floor", file: "2UpperGroundFloor.svg" },
        "2F": { name: "Second Floor", file: "3SecondFloor.svg" },
        "3F": { name: "Third Floor", file: "4ThirdFloor.svg" },
        "4F": { name: "Fourth Floor", file: "5Fourth Floor.svg" },
    };

    function loadSvg(floor) {
        const svgContainer = document.getElementById("svg-container");
        svgContainer.innerHTML = ""; // Clear previous SVG

        if (floorMap[floor]) {
            fetch(`/svg/${floorMap[floor].file}`)
                .then((response) => response.text())
                .then((svgContent) => {
                    svgContainer.innerHTML = svgContent; // Insert SVG

                    // Remove 'display: none' from all elements inside the SVG
                    const svgElement = svgContainer.querySelector("svg");
                    if (svgElement) {
                        svgElement.style.display = "block"; // Make the entire SVG visible

                        // Remove 'display: none' from any hidden elements inside the SVG
                        svgElement
                            .querySelectorAll("[style*='display: none']")
                            .forEach((el) => {
                                el.style.display = "block";
                            });
                    }
                })
                .catch((error) => console.error("Error loading SVG:", error));

            document.getElementById("floor-title").innerText =
                floorMap[floor].name;
        }
    }

    document.querySelectorAll("ul li a").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            document
                .querySelectorAll("ul li")
                .forEach((li) => li.classList.remove("active"));
            this.parentElement.classList.add("active");

            const floor = this.getAttribute("data-floor");
            loadSvg(floor);
        });
    });

    document
        .getElementById("staticBackdrop")
        .addEventListener("shown.bs.modal", function () {
            loadSvg("LG");
        });
});

window.onload = function () {
    document
        .querySelector('ul li a[data-floor="LG"]')
        .parentElement.classList.add("active");
    document.getElementById("floor-title").innerText = "Lower Ground";
};
