// (function () {
//     // Select all SVG elements inside the container.
//     const svgElements = document.querySelectorAll("#svg-container svg");

//     // Transform state: translation (offset) and scale.
//     let offsetX = 0,
//         offsetY = 0,
//         scale = 1;
//     let isDragging = false;
//     let startX, startY;

//     // For pinch zooming
//     let initialPinchDistance = null;
//     let initialScale = scale;
//     let initialOffsetX = offsetX,
//         initialOffsetY = offsetY;

//     // Update the transform for each SVG element.
//     function updateSVGTransform() {
//         svgElements.forEach((svg) => {
//             svg.style.transform = `translate(${offsetX}px, ${offsetY}px) scale(${scale})`;
//         });
//     }

//     // Use the container as the event target.
//     const container = document.getElementById("svg-container");

//     // ----------------------
//     // Mouse Events (Desktop)
//     // ----------------------
//     container.addEventListener("mousedown", (e) => {
//         isDragging = true;
//         startX = e.clientX;
//         startY = e.clientY;
//     });

//     container.addEventListener("mousemove", (e) => {
//         if (!isDragging) return;
//         const dx = e.clientX - startX;
//         const dy = e.clientY - startY;
//         offsetX += dx;
//         offsetY += dy;
//         startX = e.clientX;
//         startY = e.clientY;
//         updateSVGTransform();
//     });

//     container.addEventListener("mouseup", () => {
//         isDragging = false;
//     });

//     container.addEventListener("mouseleave", () => {
//         isDragging = false;
//     });

//     // Zooming with the mouse wheel
//     container.addEventListener("wheel", (e) => {
//         e.preventDefault(); // Prevent page scrolling

//         const rect = container.getBoundingClientRect();
//         // Get pointer coordinates relative to the container
//         const pointerX = e.clientX - rect.left;
//         const pointerY = e.clientY - rect.top;

//         // Choose zoom factor: wheel up to zoom in, down to zoom out.
//         const zoomFactor = e.deltaY < 0 ? 1.1 : 0.9;
//         const newScale = scale * zoomFactor;

//         // Adjust offsets so that the pointer stays fixed during zoom.
//         offsetX = pointerX - (newScale / scale) * (pointerX - offsetX);
//         offsetY = pointerY - (newScale / scale) * (pointerY - offsetY);
//         scale = newScale;
//         updateSVGTransform();
//     });

//     // ----------------------
//     // Touch Events (Mobile)
//     // ----------------------
//     container.addEventListener("touchstart", (e) => {
//         if (e.touches.length === 1) {
//             // Single-finger touch for dragging.
//             isDragging = true;
//             startX = e.touches[0].clientX;
//             startY = e.touches[0].clientY;
//         } else if (e.touches.length === 2) {
//             // Two-finger touch for pinch zoom.
//             isDragging = false;
//             initialPinchDistance = getDistance(e.touches[0], e.touches[1]);
//             initialScale = scale;
//             initialOffsetX = offsetX;
//             initialOffsetY = offsetY;
//         }
//     });

//     container.addEventListener("touchmove", (e) => {
//         e.preventDefault(); // Prevent native scrolling and zooming

//         if (e.touches.length === 1 && isDragging) {
//             const dx = e.touches[0].clientX - startX;
//             const dy = e.touches[0].clientY - startY;
//             offsetX += dx;
//             offsetY += dy;
//             startX = e.touches[0].clientX;
//             startY = e.touches[0].clientY;
//             updateSVGTransform();
//         } else if (e.touches.length === 2) {
//             const currentDistance = getDistance(e.touches[0], e.touches[1]);
//             if (!initialPinchDistance) return;
//             const pinchScale = currentDistance / initialPinchDistance;
//             const newScale = initialScale * pinchScale;

//             // Calculate the midpoint (pinch center) relative to the container.
//             const rect = container.getBoundingClientRect();
//             const centerX =
//                 (e.touches[0].clientX + e.touches[1].clientX) / 2 - rect.left;
//             const centerY =
//                 (e.touches[0].clientY + e.touches[1].clientY) / 2 - rect.top;

//             offsetX =
//                 centerX -
//                 (newScale / initialScale) * (centerX - initialOffsetX);
//             offsetY =
//                 centerY -
//                 (newScale / initialScale) * (centerY - initialOffsetY);
//             scale = newScale;
//             updateSVGTransform();
//         }
//     });

//     container.addEventListener("touchend", (e) => {
//         if (e.touches.length < 2) {
//             initialPinchDistance = null;
//         }
//         if (e.touches.length === 0) {
//             isDragging = false;
//         }
//     });

//     // Helper function: calculate the distance between two touch points.
//     function getDistance(touch1, touch2) {
//         const dx = touch2.clientX - touch1.clientX;
//         const dy = touch2.clientY - touch1.clientY;
//         return Math.hypot(dx, dy);
//     }

//     // Initialize the transform on all SVG elements.
//     updateSVGTransform();
// })();
