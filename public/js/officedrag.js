document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("roomlistbox");
    const dragger = document.getElementById("dragger");

    let isDragging = false;
    let startX, startLeft;

    function startDrag(e) {
        isDragging = true;
        startX = e.touches ? e.touches[0].clientX : e.clientX;
        startLeft = sidebar.offsetLeft;
    }

    function moveDrag(e) {
        if (!isDragging) return;

        const currentX = e.touches ? e.touches[0].clientX : e.clientX;
        const deltaX = currentX - startX;

        if (deltaX > 50) {
            sidebar.classList.add("open"); 
        } else if (deltaX < -50) {
            sidebar.classList.remove("open");
        }
    }

    function stopDrag() {
        isDragging = false;
    }

    // Mouse Events
    dragger.addEventListener("mousedown", startDrag);
    document.addEventListener("mousemove", moveDrag);
    document.addEventListener("mouseup", stopDrag);

    // Touch Events (For Mobile)
    dragger.addEventListener("touchstart", startDrag);
    document.addEventListener("touchmove", moveDrag);
    document.addEventListener("touchend", stopDrag);
});
