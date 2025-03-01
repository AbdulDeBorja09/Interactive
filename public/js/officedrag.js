document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("roomlistbox");
    const dragger = document.getElementById("dragger");

    const icon = document.getElementById("icon-rotate");

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
