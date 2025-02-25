document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("roomlistbox");
    const dragger = document.getElementById("dragger");

    dragger.addEventListener("click", function () {
        if (sidebar.classList.contains("open")) {
            sidebar.classList.remove("open");
        } else {
            sidebar.classList.add("open");
        }
    });
});
